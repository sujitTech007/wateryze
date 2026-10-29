<?php

namespace App\Services;

use App\Models\PaymentAttempt;
use Illuminate\Support\Facades\Http;

class StripeCheckoutService
{
    private const API_URL = 'https://api.stripe.com/v1';

    public function isConfigured(): bool
    {
        return filled(config('services.stripe.secret'))
            && filled(config('services.stripe.webhook_secret'));
    }

    public function createCheckoutSession(PaymentAttempt $attempt): array
    {
        $snapshot = $attempt->plan_snapshot;
        $cycle = $this->recurringInterval($attempt->billing_cycle);
        $metadata = [
            'payment_attempt_id' => (string) $attempt->id,
            'user_id' => (string) $attempt->user_id,
            'plan_id' => (string) $attempt->subscription_plan_id,
        ];

        $parameters = [
            'mode' => 'subscription',
            'success_url' => route('user.subscription.success').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('user.subscription.cancelled'),
            'expires_at' => (string) $attempt->expires_at->timestamp,
            'customer_email' => $attempt->user->email,
            'client_reference_id' => (string) $attempt->user_id,
            'billing_address_collection' => 'required',
            'automatic_tax[enabled]' => 'true',
            'customer_update[address]' => 'auto',
            'line_items[0][price_data][currency]' => strtolower($attempt->currency),
            'line_items[0][price_data][unit_amount]' => (string) $attempt->amount_cents,
            'line_items[0][price_data][product_data][name]' => $snapshot['name'],
            'line_items[0][price_data][product_data][description]' => $snapshot['description'] ?: $snapshot['name'],
            'line_items[0][price_data][tax_behavior]' => 'exclusive',
            'line_items[0][price_data][recurring][interval]' => $cycle['interval'],
            'metadata[payment_attempt_id]' => $metadata['payment_attempt_id'],
            'metadata[user_id]' => $metadata['user_id'],
            'metadata[plan_id]' => $metadata['plan_id'],
            'subscription_data[metadata][payment_attempt_id]' => $metadata['payment_attempt_id'],
            'subscription_data[metadata][user_id]' => $metadata['user_id'],
            'subscription_data[metadata][plan_id]' => $metadata['plan_id'],
        ];

        if ($cycle['interval_count'] > 1) {
            $parameters['line_items[0][price_data][recurring][interval_count]'] = (string) $cycle['interval_count'];
        }

        $session = $this->request('POST', '/checkout/sessions', $parameters, 'wateryze-checkout-'.$attempt->id);
        if (
            ! isset($session['id'], $session['url'])
            || ! is_string($session['id'])
            || ! is_string($session['url'])
            || ! str_starts_with($session['id'], 'cs_')
            || parse_url($session['url'], PHP_URL_SCHEME) !== 'https'
            || parse_url($session['url'], PHP_URL_HOST) !== 'checkout.stripe.com'
        ) {
            throw new StripePaymentException('Stripe returned an invalid checkout session.');
        }

        return $session;
    }

    public function retrieveCheckoutSession(string $sessionId): array
    {
        if (! preg_match('/^cs_[A-Za-z0-9_]+$/', $sessionId)) {
            throw new StripePaymentException('The checkout session reference is invalid.');
        }

        return $this->request('GET', '/checkout/sessions/'.rawurlencode($sessionId));
    }

    public function cancelSubscriptionAtPeriodEnd(string $stripeSubscriptionId): array
    {
        if (! preg_match('/^sub_[A-Za-z0-9_]+$/', $stripeSubscriptionId)) {
            throw new StripePaymentException('The Stripe subscription reference is invalid.');
        }

        return $this->request(
            'POST',
            '/subscriptions/'.rawurlencode($stripeSubscriptionId),
            ['cancel_at_period_end' => 'true'],
            'wateryze-cancel-'.$stripeSubscriptionId,
        );
    }

    public function verifyWebhook(string $payload, ?string $signatureHeader): array
    {
        $secret = config('services.stripe.webhook_secret');
        if (! filled($secret)) {
            throw new StripePaymentException('Stripe webhook verification is not configured.');
        }

        abort_unless(is_string($signatureHeader), 400, 'Missing Stripe signature.');

        $timestamp = null;
        $signatures = [];
        foreach (explode(',', $signatureHeader) as $component) {
            [$key, $value] = array_pad(explode('=', trim($component), 2), 2, null);
            if ($key === 't' && is_string($value) && ctype_digit($value)) {
                $timestamp = (int) $value;
            } elseif ($key === 'v1' && is_string($value)) {
                $signatures[] = $value;
            }
        }

        abort_unless(
            $timestamp !== null
                && abs(time() - $timestamp) <= 300
                && $signatures !== [],
            400,
            'Invalid Stripe signature.',
        );

        $expected = hash_hmac('sha256', $timestamp.'.'.$payload, $secret);
        $valid = false;
        foreach ($signatures as $signature) {
            $valid = hash_equals($expected, $signature) || $valid;
        }

        abort_unless($valid, 400, 'Invalid Stripe signature.');

        $event = json_decode($payload, true);
        abort_unless(
            is_array($event)
                && is_string($event['id'] ?? null)
                && is_string($event['type'] ?? null)
                && is_array($event['data']['object'] ?? null),
            400,
            'Malformed Stripe event.',
        );

        return $event;
    }

    private function request(string $method, string $path, array $parameters = [], ?string $idempotencyKey = null): array
    {
        $secret = config('services.stripe.secret');
        if (! filled($secret)) {
            throw new StripePaymentException('Stripe payments are not configured. Please contact support.');
        }

        $request = Http::acceptJson()
            ->withToken($secret)
            ->timeout(20);

        if ($idempotencyKey !== null) {
            $request = $request->withHeaders(['Idempotency-Key' => $idempotencyKey]);
        }

        $response = $method === 'GET'
            ? $request->get(self::API_URL.$path, $parameters)
            : $request->asForm()->post(self::API_URL.$path, $parameters);

        if (! $response->successful()) {
            throw new StripePaymentException('Stripe could not complete the payment request (HTTP '.$response->status().').');
        }

        $data = $response->json();
        if (! is_array($data)) {
            throw new StripePaymentException('Stripe returned an unreadable payment response.');
        }

        return $data;
    }

    private function recurringInterval(string $billingCycle): array
    {
        return match ($billingCycle) {
            'monthly' => ['interval' => 'month', 'interval_count' => 1],
            'quarterly' => ['interval' => 'month', 'interval_count' => 3],
            'yearly' => ['interval' => 'year', 'interval_count' => 1],
            default => throw new StripePaymentException('This subscription billing cycle is not supported.'),
        };
    }
}
