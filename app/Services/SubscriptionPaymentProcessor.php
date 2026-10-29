<?php

namespace App\Services;

use App\Mail\SubscriptionPaymentReceipt;
use App\Models\Invoice;
use App\Models\PaymentAttempt;
use App\Models\StripeEvent;
use App\Models\Subscription;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class SubscriptionPaymentProcessor
{
    public function fulfillCheckout(array $checkout): ?Subscription
    {
        $metadata = $checkout['metadata'] ?? [];
        $attemptId = filter_var($metadata['payment_attempt_id'] ?? null, FILTER_VALIDATE_INT);
        if ($attemptId === false || $attemptId === null) {
            throw new StripePaymentException('Checkout session has no valid payment reference.');
        }

        $attempt = PaymentAttempt::query()->findOrFail($attemptId);
        if (($checkout['payment_status'] ?? null) !== 'paid') {
            return null;
        }

        $subscriptionId = $checkout['subscription'] ?? null;
        if (
            ($checkout['mode'] ?? null) !== 'subscription'
            || ! is_string($checkout['id'] ?? null)
            || ! str_starts_with($checkout['id'], 'cs_')
            || ! is_string($subscriptionId)
            || ! str_starts_with($subscriptionId, 'sub_')
            || (int) ($metadata['user_id'] ?? 0) !== $attempt->user_id
            || (int) ($metadata['plan_id'] ?? 0) !== $attempt->subscription_plan_id
            || (int) ($checkout['client_reference_id'] ?? 0) !== $attempt->user_id
            || strtolower((string) ($checkout['currency'] ?? '')) !== strtolower($attempt->currency)
            || (int) ($checkout['amount_subtotal'] ?? -1) !== $attempt->amount_cents
            || ($attempt->stripe_checkout_session_id !== null && $attempt->stripe_checkout_session_id !== $checkout['id'])
        ) {
            Log::critical('Paid Stripe checkout did not match its stored payment attempt.', [
                'payment_attempt_id' => $attempt->id,
                'stripe_checkout_session_id' => $checkout['id'] ?? null,
            ]);
            throw new StripePaymentException('The completed payment did not match the selected subscription plan.');
        }

        $subtotalCents = (int) $checkout['amount_subtotal'];
        if (! is_numeric($checkout['amount_total'] ?? null)) {
            throw new StripePaymentException('Stripe did not return the total charged for this payment.');
        }

        $totalCents = (int) $checkout['amount_total'];
        $reportedTaxCents = (int) ($checkout['total_details']['amount_tax'] ?? 0);
        if ($totalCents !== $subtotalCents || $reportedTaxCents !== 0) {
            throw new StripePaymentException('Stripe returned an unexpected total. Tax is not enabled for this checkout.');
        }

        $subscription = DB::transaction(function () use ($attempt, $checkout, $subscriptionId, $totalCents): ?Subscription {
            $lockedAttempt = PaymentAttempt::query()->lockForUpdate()->findOrFail($attempt->id);
            if ($lockedAttempt->status === 'paid') {
                return $lockedAttempt->subscription;
            }
            if ($lockedAttempt->status !== 'pending') {
                return null;
            }

            $snapshot = $lockedAttempt->plan_snapshot;
            $start = CarbonImmutable::now();
            $renewal = $this->nextRenewal($start, $lockedAttempt->billing_cycle);
            $subscription = Subscription::query()->create([
                'payment_attempt_id' => $lockedAttempt->id,
                'stripe_subscription_id' => $subscriptionId,
                'water_monitoring_enabled' => (bool) ($snapshot['water_monitoring_enabled'] ?? false),
                'features' => $snapshot['features'] ?? [],
                'user_id' => $lockedAttempt->user_id,
                'subscription_plan_id' => $lockedAttempt->subscription_plan_id,
                'billing_cycle' => $lockedAttempt->billing_cycle,
                'amount' => number_format($lockedAttempt->amount_cents / 100, 2, '.', ''),
                'start_date' => $start->toDateString(),
                'end_date' => $renewal->toDateString(),
                'renewal_date' => $renewal->toDateString(),
                'status' => 'active',
                'auto_renew' => true,
                'payment_method' => 'stripe',
            ]);

            $lockedAttempt->update([
                'stripe_checkout_session_id' => $checkout['id'],
                'stripe_subscription_id' => $subscriptionId,
                'status' => 'paid',
                'paid_at' => now(),
                'tax_amount_cents' => 0,
                'total_amount_cents' => $totalCents,
            ]);

            return $subscription;
        });

        if ($subscription !== null) {
            DB::afterCommit(fn () => $this->sendPaymentReceipt($attempt->id));
        }

        return $subscription;
    }

    private function sendPaymentReceipt(int $attemptId): void
    {
        $attempt = DB::transaction(function () use ($attemptId): ?PaymentAttempt {
            $lockedAttempt = PaymentAttempt::query()
                ->with(['user', 'subscription.plan'])
                ->lockForUpdate()
                ->findOrFail($attemptId);

            if ($lockedAttempt->status !== 'paid' || $lockedAttempt->receipt_status === 'sent') {
                return null;
            }

            if (
                $lockedAttempt->receipt_status === 'sending'
                && $lockedAttempt->receipt_started_at?->isAfter(now()->subMinutes(5))
            ) {
                return null;
            }

            $lockedAttempt->update([
                'receipt_status' => 'sending',
                'receipt_started_at' => now(),
            ]);

            return $lockedAttempt->fresh(['user', 'subscription.plan']);
        });

        if ($attempt === null || $attempt->subscription === null) {
            return;
        }

        try {
            Mail::to($attempt->user->email)->send(new SubscriptionPaymentReceipt(
                customer: $attempt->user,
                subscription: $attempt->subscription,
                paymentReference: $attempt->stripe_checkout_session_id,
                currency: $attempt->currency,
                paidAt: $attempt->paid_at,
                totalCents: $attempt->total_amount_cents,
            ));
        } catch (TransportExceptionInterface $exception) {
            $attempt->update(['receipt_status' => 'failed']);
            Log::error('Subscription payment receipt email could not be delivered.', [
                'payment_attempt_id' => $attempt->id,
                'user_id' => $attempt->user_id,
                'reason' => $exception->getMessage(),
            ]);

            return;
        }

        $attempt->update([
            'receipt_status' => 'sent',
            'receipt_started_at' => null,
            'receipt_sent_at' => now(),
        ]);
    }

    public function handleWebhook(array $event): void
    {
        DB::transaction(function () use ($event): void {
            if (StripeEvent::query()->where('stripe_event_id', $event['id'])->exists()) {
                return;
            }

            $object = $event['data']['object'];
            switch ($event['type']) {
                case 'checkout.session.completed':
                case 'checkout.session.async_payment_succeeded':
                    $this->fulfillCheckout($object);
                    break;
                case 'checkout.session.expired':
                    $this->expireAttempt($object);
                    break;
                case 'checkout.session.async_payment_failed':
                    $this->failAttempt($object);
                    break;
                case 'invoice.paid':
                    $this->recordPaidInvoice($object);
                    break;
                case 'invoice.payment_failed':
                    $this->markInvoiceFailed($object);
                    break;
                case 'customer.subscription.created':
                case 'customer.subscription.updated':
                    $this->syncStripeSubscription($object);
                    break;
                case 'customer.subscription.deleted':
                    $this->syncStripeSubscription($object, deleted: true);
                    break;
            }

            StripeEvent::query()->create([
                'stripe_event_id' => $event['id'],
                'event_type' => $event['type'],
                'handled_at' => now(),
            ]);
        });
    }

    private function expireAttempt(array $checkout): void
    {
        $attemptId = filter_var($checkout['metadata']['payment_attempt_id'] ?? null, FILTER_VALIDATE_INT);
        if ($attemptId === false || $attemptId === null) {
            return;
        }

        PaymentAttempt::query()
            ->whereKey($attemptId)
            ->where('status', 'pending')
            ->update(['status' => 'expired']);
    }

    private function failAttempt(array $checkout): void
    {
        $attemptId = filter_var($checkout['metadata']['payment_attempt_id'] ?? null, FILTER_VALIDATE_INT);
        if ($attemptId === false || $attemptId === null) {
            return;
        }

        PaymentAttempt::query()
            ->whereKey($attemptId)
            ->where('status', 'pending')
            ->update(['status' => 'failed']);
    }

    private function recordPaidInvoice(array $stripeInvoice): void
    {
        $stripeSubscriptionId = $stripeInvoice['subscription']
            ?? $stripeInvoice['parent']['subscription_details']['subscription']
            ?? null;
        if (! is_string($stripeSubscriptionId)) {
            return;
        }

        $subscription = Subscription::query()
            ->with(['user', 'plan'])
            ->where('stripe_subscription_id', $stripeSubscriptionId)
            ->first();
        if ($subscription === null) {
            return;
        }

        $subtotalCents = (int) ($stripeInvoice['subtotal'] ?? $stripeInvoice['amount_paid'] ?? 0);
        $totalCents = (int) ($stripeInvoice['total'] ?? $stripeInvoice['amount_paid'] ?? $subtotalCents);
        $taxCents = 0;
        $totalCents = $subtotalCents;
        $paidAt = isset($stripeInvoice['status_transitions']['paid_at'])
            ? CarbonImmutable::createFromTimestamp((int) $stripeInvoice['status_transitions']['paid_at'])
            : now();
        $invoiceId = $stripeInvoice['id'] ?? null;
        if (! is_string($invoiceId)) {
            return;
        }
        $invoiceNumber = (string) ($stripeInvoice['number'] ?? $invoiceId);
        if (strlen($invoiceNumber) > 50) {
            $invoiceNumber = substr($invoiceId, 0, 50);
        }
        $periodEnd = $this->invoicePeriodEnd($stripeInvoice) ?? $paidAt;

        $invoice = DB::transaction(function () use (
            $subscription,
            $stripeInvoice,
            $subtotalCents,
            $totalCents,
            $taxCents,
            $paidAt,
            $invoiceId,
            $invoiceNumber,
            $periodEnd
        ): Invoice {
            $locked = Subscription::query()->lockForUpdate()->findOrFail($subscription->id);
            if ($periodEnd->toDateString() >= now()->toDateString() && $locked->status !== 'cancelled') {
                $locked->update([
                    'status' => 'active',
                    'end_date' => $periodEnd->toDateString(),
                    'renewal_date' => $periodEnd->toDateString(),
                ]);
            }

            $customer = $subscription->user;
            $invoice = Invoice::query()->updateOrCreate(
                ['invoice_number' => $invoiceNumber],
                [
                    'user_id' => $subscription->user_id,
                    'subscription_id' => $subscription->id,
                    'invoice_date' => isset($stripeInvoice['created'])
                        ? CarbonImmutable::createFromTimestamp((int) $stripeInvoice['created'])->toDateString()
                        : $paidAt->toDateString(),
                    'due_date' => isset($stripeInvoice['due_date'])
                        ? CarbonImmutable::createFromTimestamp((int) $stripeInvoice['due_date'])->toDateString()
                        : $paidAt->toDateString(),
                    'amount' => number_format($subtotalCents / 100, 2, '.', ''),
                    'tax_amount' => number_format($taxCents / 100, 2, '.', ''),
                    'total' => number_format($totalCents / 100, 2, '.', ''),
                    'status' => 'paid',
                    'billing_email' => $stripeInvoice['customer_email'] ?? $customer->email,
                    'phone' => $customer->full_phone,
                    'billing_address' => $customer->address,
                    'city' => $customer->city,
                    'province' => $customer->province,
                    'postal_code' => $customer->postal_code,
                    'notes' => 'Stripe invoice '.$invoiceId.' for '.$subscription->plan?->name,
                    'paid_at' => $paidAt,
                ],
            );

            return $invoice;
        });

        if (($stripeInvoice['billing_reason'] ?? null) === 'subscription_cycle') {
            $currency = strtoupper((string) ($stripeInvoice['currency'] ?? 'CAD'));
            DB::afterCommit(fn () => $this->sendInvoiceReceipt($invoice->id, $invoiceId, $currency));
        }
    }

    private function sendInvoiceReceipt(int $invoiceId, string $paymentReference, string $currency): void
    {
        $invoice = DB::transaction(function () use ($invoiceId): ?Invoice {
            $lockedInvoice = Invoice::query()
                ->with(['user', 'subscription.plan'])
                ->lockForUpdate()
                ->findOrFail($invoiceId);

            if ($lockedInvoice->status !== 'paid' || $lockedInvoice->receipt_status === 'sent') {
                return null;
            }

            if (
                $lockedInvoice->receipt_status === 'sending'
                && $lockedInvoice->receipt_started_at?->isAfter(now()->subMinutes(5))
            ) {
                return null;
            }

            $lockedInvoice->update([
                'receipt_status' => 'sending',
                'receipt_started_at' => now(),
            ]);

            return $lockedInvoice->fresh(['user', 'subscription.plan']);
        });

        if ($invoice === null || $invoice->subscription === null) {
            return;
        }

        try {
            Mail::to($invoice->user->email)->send(new SubscriptionPaymentReceipt(
                customer: $invoice->user,
                subscription: $invoice->subscription,
                paymentReference: $paymentReference,
                currency: preg_match('/^[A-Z]{3}$/', $currency) ? $currency : 'CAD',
                paidAt: $invoice->paid_at ?? now(),
                totalCents: (int) round((float) $invoice->total * 100),
            ));
        } catch (TransportExceptionInterface $exception) {
            $invoice->update(['receipt_status' => 'failed']);
            Log::error('Subscription renewal receipt email could not be delivered.', [
                'invoice_id' => $invoice->id,
                'user_id' => $invoice->user_id,
                'reason' => $exception->getMessage(),
            ]);

            return;
        }

        $invoice->update([
            'receipt_status' => 'sent',
            'receipt_started_at' => null,
            'receipt_sent_at' => now(),
        ]);
    }

    private function markInvoiceFailed(array $stripeInvoice): void
    {
        $stripeSubscriptionId = $stripeInvoice['subscription']
            ?? $stripeInvoice['parent']['subscription_details']['subscription']
            ?? null;
        if (is_string($stripeSubscriptionId)) {
            Subscription::query()
                ->where('stripe_subscription_id', $stripeSubscriptionId)
                ->where('status', 'active')
                ->update(['status' => 'past_due']);
        }
    }

    private function syncStripeSubscription(array $stripeSubscription, bool $deleted = false): void
    {
        $stripeId = $stripeSubscription['id'] ?? null;
        if (! is_string($stripeId)) {
            return;
        }

        $status = $deleted ? 'cancelled' : match ($stripeSubscription['status'] ?? '') {
            'active', 'trialing' => 'active',
            'past_due', 'unpaid' => 'past_due',
            'canceled' => 'cancelled',
            'paused' => 'paused',
            default => 'pending',
        };
        $periodEnd = $stripeSubscription['current_period_end'] ?? null;
        $endDate = is_numeric($periodEnd)
            ? CarbonImmutable::createFromTimestamp((int) $periodEnd)->toDateString()
            : null;
        $autoRenew = ! $deleted
            && ($stripeSubscription['status'] ?? '') !== 'canceled'
            && ! (bool) ($stripeSubscription['cancel_at_period_end'] ?? false);

        Subscription::query()->where('stripe_subscription_id', $stripeId)->update([
            'status' => $status,
            'auto_renew' => $autoRenew,
            'end_date' => $endDate,
            'renewal_date' => $endDate,
        ]);
    }

    private function invoicePeriodEnd(array $invoice): ?CarbonImmutable
    {
        $periodEnd = $invoice['lines']['data'][0]['period']['end']
            ?? $invoice['period_end']
            ?? null;

        return is_numeric($periodEnd)
            ? CarbonImmutable::createFromTimestamp((int) $periodEnd)
            : null;
    }

    private function nextRenewal(CarbonImmutable $start, string $billingCycle): CarbonImmutable
    {
        return match ($billingCycle) {
            'monthly' => $start->addMonthNoOverflow(),
            'quarterly' => $start->addMonthsNoOverflow(3),
            'yearly' => $start->addYearNoOverflow(),
            default => throw new StripePaymentException('This subscription billing cycle is not supported.'),
        };
    }
}
