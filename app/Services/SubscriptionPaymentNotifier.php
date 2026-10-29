<?php

namespace App\Services;

use App\Mail\SubscriptionPaymentFailure;
use App\Models\PaymentAttempt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class SubscriptionPaymentNotifier
{
    public function sendFailure(PaymentAttempt $paymentAttempt, string $reason): void
    {
        $attempt = DB::transaction(function () use ($paymentAttempt): ?PaymentAttempt {
            $lockedAttempt = PaymentAttempt::query()
                ->with('user')
                ->lockForUpdate()
                ->findOrFail($paymentAttempt->id);

            if ($lockedAttempt->status === 'paid' || $lockedAttempt->failure_email_sent_at !== null) {
                return null;
            }

            if (
                $lockedAttempt->failure_email_status === 'sending'
                && $lockedAttempt->failure_email_started_at?->isAfter(now()->subMinutes(5))
            ) {
                return null;
            }

            $lockedAttempt->update([
                'failure_email_status' => 'sending',
                'failure_email_started_at' => now(),
            ]);

            return $lockedAttempt->fresh('user');
        });

        if ($attempt === null) {
            return;
        }

        $snapshot = $attempt->plan_snapshot ?? [];
        $planName = is_string($snapshot['name'] ?? null) ? $snapshot['name'] : 'Subscription';

        try {
            Mail::to($attempt->user->email)->send(new SubscriptionPaymentFailure(
                customer: $attempt->user,
                planName: $planName,
                billingCycle: $attempt->billing_cycle,
                currency: $attempt->currency,
                amountCents: $attempt->amount_cents,
                attemptedAt: $attempt->created_at,
                reason: $reason,
                paymentReference: $attempt->stripe_checkout_session_id,
            ));
        } catch (TransportExceptionInterface $exception) {
            $attempt->update(['failure_email_status' => 'failed']);
            Log::error('Subscription payment issue email could not be delivered.', [
                'payment_attempt_id' => $attempt->id,
                'user_id' => $attempt->user_id,
                'reason' => $exception->getMessage(),
            ]);

            return;
        }

        $attempt->update([
            'failure_email_status' => 'sent',
            'failure_email_started_at' => null,
            'failure_email_sent_at' => now(),
        ]);
    }
}
