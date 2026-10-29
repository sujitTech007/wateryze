<?php

namespace Tests\Feature;

use App\Models\PaymentAttempt;
use App\Models\SubscriptionPlan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\Feature\Concerns\CreatesPaidSubscription;
use Tests\TestCase;

class SubscriptionPaymentTest extends TestCase
{
    use CreatesPaidSubscription;
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        config([
            'services.stripe.secret' => 'sk_test_local',
            'services.stripe.webhook_secret' => 'whsec_local',
        ]);
    }

    public function test_checkout_creates_only_a_pending_attempt_and_uses_exclusive_automatic_tax(): void
    {
        $user = User::factory()->create();
        $plan = SubscriptionPlan::query()->where('name', 'Premium')->firstOrFail();
        Http::fake([
            'https://api.stripe.com/v1/checkout/sessions' => Http::response([
                'id' => 'cs_test_checkout',
                'url' => 'https://checkout.stripe.com/c/pay/cs_test_checkout',
            ]),
        ]);

        $this->actingAs($user)
            ->post(route('user.subscription.checkout', $plan))
            ->assertRedirect('https://checkout.stripe.com/c/pay/cs_test_checkout');

        $attempt = PaymentAttempt::query()->firstOrFail();
        $this->assertSame('pending', $attempt->status);
        $this->assertSame(49900, $attempt->amount_cents);
        $this->assertSame('CAD', $attempt->currency);
        $this->assertSame('cs_test_checkout', $attempt->stripe_checkout_session_id);
        $this->assertDatabaseCount('subscriptions', 0);
        $this->assertFalse($user->fresh()->hasWaterMonitoringAccess());

        Http::assertSent(fn ($request) => $request->url() === 'https://api.stripe.com/v1/checkout/sessions'
            && $request['mode'] === 'subscription'
            && $request['automatic_tax[enabled]'] === 'true'
            && $request['line_items[0][price_data][tax_behavior]'] === 'exclusive'
            && $request['line_items[0][price_data][currency]'] === 'cad'
            && $request['line_items[0][price_data][unit_amount]'] === '49900');
    }

    public function test_return_from_stripe_activates_only_a_matching_paid_checkout(): void
    {
        $user = User::factory()->create();
        $plan = SubscriptionPlan::query()->where('name', 'Premium')->firstOrFail();
        $this->createAttempt($user, $plan, 'cs_test_paid');
        Http::fake([
            'https://api.stripe.com/v1/checkout/sessions/cs_test_paid' => Http::response(
                $this->checkoutPayload($user, $plan, 'cs_test_paid', 'paid'),
            ),
        ]);

        $this->actingAs($user)
            ->get(route('user.subscription.success', ['session_id' => 'cs_test_paid']))
            ->assertRedirect(route('user.water-monitoring'))
            ->assertSessionHas('status');

        $this->assertDatabaseCount('subscriptions', 1);
        $this->assertDatabaseHas('payment_attempts', [
            'stripe_checkout_session_id' => 'cs_test_paid',
            'stripe_subscription_id' => 'sub_test_paid',
            'status' => 'paid',
        ]);
        $this->assertTrue($user->fresh()->hasWaterMonitoringAccess());
    }

    public function test_unpaid_checkout_return_does_not_create_subscription_or_grant_access(): void
    {
        $user = User::factory()->create();
        $plan = SubscriptionPlan::query()->where('name', 'Premium')->firstOrFail();
        $this->createAttempt($user, $plan, 'cs_test_unpaid');
        Http::fake([
            'https://api.stripe.com/v1/checkout/sessions/cs_test_unpaid' => Http::response(
                $this->checkoutPayload($user, $plan, 'cs_test_unpaid', 'unpaid'),
            ),
        ]);

        $this->actingAs($user)
            ->get(route('user.subscription.success', ['session_id' => 'cs_test_unpaid']))
            ->assertRedirect(route('user.subscription'))
            ->assertSessionHasErrors('payment');

        $this->assertDatabaseCount('subscriptions', 0);
        $this->assertFalse($user->fresh()->hasWaterMonitoringAccess());
    }

    public function test_signed_duplicate_checkout_webhooks_are_idempotent(): void
    {
        $user = User::factory()->create();
        $plan = SubscriptionPlan::query()->where('name', 'Premium')->firstOrFail();
        $this->createAttempt($user, $plan, 'cs_test_webhook');
        $payload = json_encode([
            'id' => 'evt_test_checkout',
            'type' => 'checkout.session.async_payment_succeeded',
            'data' => [
                'object' => $this->checkoutPayload($user, $plan, 'cs_test_webhook', 'paid'),
            ],
        ], JSON_THROW_ON_ERROR);
        $timestamp = time();
        $signature = hash_hmac('sha256', $timestamp.'.'.$payload, 'whsec_local');

        $this->postSignedWebhook($payload, $timestamp, $signature)->assertOk();
        $this->postSignedWebhook($payload, $timestamp, $signature)->assertOk();

        $this->assertDatabaseCount('subscriptions', 1);
        $this->assertDatabaseCount('stripe_events', 1);
        $this->assertTrue($user->fresh()->hasWaterMonitoringAccess());
    }

    public function test_invalid_webhook_signature_is_rejected_without_database_changes(): void
    {
        $payload = json_encode([
            'id' => 'evt_test_invalid',
            'type' => 'checkout.session.completed',
            'data' => ['object' => []],
        ], JSON_THROW_ON_ERROR);

        $this->postSignedWebhook($payload, time(), str_repeat('0', 64))
            ->assertBadRequest();

        $this->assertDatabaseCount('stripe_events', 0);
        $this->assertDatabaseCount('subscriptions', 0);
    }

    public function test_paid_invoice_webhook_saves_tax_totals_and_keeps_renewal_active(): void
    {
        $user = User::factory()->create();
        $subscription = $this->createPaidSubscription($user);
        $periodEnd = now()->addMonthNoOverflow()->timestamp;
        $payload = json_encode([
            'id' => 'evt_test_invoice',
            'type' => 'invoice.paid',
            'data' => [
                'object' => [
                    'id' => 'in_test_paid',
                    'number' => 'INV-TEST-1',
                    'subscription' => $subscription->stripe_subscription_id,
                    'subtotal' => 49900,
                    'tax' => 4990,
                    'total' => 54890,
                    'customer_email' => $user->email,
                    'status_transitions' => ['paid_at' => now()->timestamp],
                    'lines' => ['data' => [['period' => ['end' => $periodEnd]]]],
                ],
            ],
        ], JSON_THROW_ON_ERROR);
        $timestamp = time();
        $signature = hash_hmac('sha256', $timestamp.'.'.$payload, 'whsec_local');

        $this->postSignedWebhook($payload, $timestamp, $signature)->assertOk();

        $this->assertDatabaseHas('invoices', [
            'invoice_number' => 'INV-TEST-1',
            'user_id' => $user->id,
            'subscription_id' => $subscription->id,
            'amount' => '499.00',
            'tax_amount' => '49.90',
            'total' => '548.90',
            'status' => 'paid',
        ]);
        $this->assertSame('active', $subscription->fresh()->status);
        $this->assertSame(
            now()->addMonthNoOverflow()->toDateString(),
            $subscription->fresh()->renewal_date->toDateString(),
        );
    }

    public function test_subscription_cancellation_is_scheduled_only_after_stripe_confirms_it(): void
    {
        $user = User::factory()->create();
        $subscription = $this->createPaidSubscription($user);
        Http::fake([
            'https://api.stripe.com/v1/subscriptions/'.$subscription->stripe_subscription_id => Http::response([
                'id' => $subscription->stripe_subscription_id,
                'cancel_at_period_end' => true,
            ]),
        ]);

        $this->actingAs($user)
            ->post(route('user.subscription.cancel'))
            ->assertRedirect();

        $this->assertFalse($subscription->fresh()->auto_renew);
        Http::assertSent(fn ($request) => $request->url() === 'https://api.stripe.com/v1/subscriptions/'.$subscription->stripe_subscription_id
            && $request['cancel_at_period_end'] === 'true');
    }

    private function createAttempt(User $user, SubscriptionPlan $plan, string $sessionId): PaymentAttempt
    {
        return $user->paymentAttempts()->create([
            'subscription_plan_id' => $plan->id,
            'amount_cents' => (int) round((float) $plan->amount * 100),
            'currency' => 'CAD',
            'billing_cycle' => $plan->billing_cycle,
            'plan_snapshot' => [
                'name' => $plan->name,
                'description' => $plan->description,
                'features' => $plan->features,
                'water_monitoring_enabled' => $plan->water_monitoring_enabled,
            ],
            'stripe_checkout_session_id' => $sessionId,
            'status' => 'pending',
            'expires_at' => now()->addHour(),
        ]);
    }

    private function checkoutPayload(User $user, SubscriptionPlan $plan, string $sessionId, string $paymentStatus): array
    {
        return [
            'id' => $sessionId,
            'mode' => 'subscription',
            'payment_status' => $paymentStatus,
            'subscription' => 'sub_test_paid',
            'client_reference_id' => (string) $user->id,
            'currency' => 'cad',
            'amount_subtotal' => (int) round((float) $plan->amount * 100),
            'metadata' => [
                'payment_attempt_id' => (string) $user->paymentAttempts()->value('id'),
                'user_id' => (string) $user->id,
                'plan_id' => (string) $plan->id,
            ],
        ];
    }

    private function postSignedWebhook(string $payload, int $timestamp, string $signature)
    {
        return $this->call('POST', route('stripe.webhook'), [], [], [], [
            'CONTENT_TYPE' => 'application/json',
            'HTTP_STRIPE_SIGNATURE' => 't='.$timestamp.',v1='.$signature,
        ], $payload);
    }
}
