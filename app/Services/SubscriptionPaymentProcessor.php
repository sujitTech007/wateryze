<?php

namespace App\Services;

use App\Models\Invoice;
use App\Models\PaymentAttempt;
use App\Models\StripeEvent;
use App\Models\Subscription;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

        return DB::transaction(function () use ($attempt, $checkout, $subscriptionId): ?Subscription {
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
            ]);

            return $subscription;
        });
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
        $taxCents = (int) ($stripeInvoice['tax'] ?? max(0, $totalCents - $subtotalCents));
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

        DB::transaction(function () use (
            $subscription,
            $stripeInvoice,
            $subtotalCents,
            $totalCents,
            $taxCents,
            $paidAt,
            $invoiceId,
            $invoiceNumber,
            $periodEnd
        ): void {
            $locked = Subscription::query()->lockForUpdate()->findOrFail($subscription->id);
            if ($periodEnd->toDateString() >= now()->toDateString() && $locked->status !== 'cancelled') {
                $locked->update([
                    'status' => 'active',
                    'end_date' => $periodEnd->toDateString(),
                    'renewal_date' => $periodEnd->toDateString(),
                ]);
            }

            $customer = $subscription->user;
            Invoice::query()->updateOrCreate(
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
        });
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
