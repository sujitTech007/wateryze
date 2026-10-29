<?php

namespace Tests\Feature;

use App\Mail\SubscriptionPaymentFailure;
use App\Mail\SubscriptionPaymentReceipt;
use App\Models\PaymentAttempt;
use App\Models\SubscriptionPlan;
use App\Models\User;
use App\Services\SubscriptionPaymentProcessor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
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
            'services.stripe.webhook_secret' => null,
        ]);
        Mail::fake();
    }

    public function test_checkout_creates_only_a_pending_attempt_without_adding_tax(): void
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
        Mail::assertNotSent(SubscriptionPaymentFailure::class);

        Http::assertSent(fn ($request) => $request->url() === 'https://api.stripe.com/v1/checkout/sessions'
            && $request['mode'] === 'subscription'
            && ! isset($request['automatic_tax[enabled]'])
            && $request['payment_method_types[0]'] === 'card'
            && ! isset($request['billing_address_collection'])
            && ! isset($request['customer_update[address]'])
            && $request['line_items[0][quantity]'] === '1'
            && ! isset($request['line_items[0][price_data][tax_behavior]'])
            && $request['line_items[0][price_data][currency]'] === 'cad'
            && $request['line_items[0][price_data][unit_amount]'] === '49900');
        Http::assertSent(fn ($request) => $request['cancel_url'] === route(
            'user.subscription.cancelled',
            ['attempt_id' => $attempt->id],
        ));
    }

    public function test_cancelled_checkout_sends_one_failure_email_only_for_the_owning_user(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $plan = SubscriptionPlan::query()->where('name', 'Premium')->firstOrFail();
        $attempt = $this->createAttempt($user, $plan, 'cs_test_cancelled');

        $this->actingAs($otherUser)
            ->get(route('user.subscription.cancelled', ['attempt_id' => $attempt->id]))
            ->assertRedirect(route('user.subscription'));

        $this->assertDatabaseHas('payment_attempts', [
            'id' => $attempt->id,
            'status' => 'pending',
        ]);
        Mail::assertNothingOutgoing();

        $this->actingAs($user)
            ->get(route('user.subscription.cancelled', ['attempt_id' => $attempt->id]))
            ->assertRedirect(route('user.subscription'));

        $this->assertDatabaseHas('payment_attempts', [
            'id' => $attempt->id,
            'status' => 'cancelled',
            'failure_email_status' => 'sent',
        ]);
        $this->assertDatabaseCount('subscriptions', 0);
        $this->assertFalse($user->fresh()->hasWaterMonitoringAccess());
        Mail::assertSent(SubscriptionPaymentFailure::class, 1);

        $this->actingAs($user)
            ->get(route('user.subscription.cancelled', ['attempt_id' => $attempt->id]));

        Mail::assertSent(SubscriptionPaymentFailure::class, 1);
    }

    public function test_stripe_checkout_error_is_shown_clearly_and_attempt_is_marked_failed(): void
    {
        $user = User::factory()->create();
        $plan = SubscriptionPlan::query()->where('name', 'Premium')->firstOrFail();
        Http::fake([
            'https://api.stripe.com/v1/checkout/sessions' => Http::response([
                'error' => [
                    'type' => 'invalid_request_error',
                    'code' => 'parameter_unknown',
                    'param' => 'customer_update[address]',
                    'message' => 'The customer update setting cannot be used for this Checkout Session.',
                ],
            ], 400),
        ]);

        $this->actingAs($user)
            ->from(route('user.subscription'))
            ->post(route('user.subscription.checkout', $plan))
            ->assertRedirect(route('user.subscription'))
            ->assertSessionHasErrors([
                'payment' => 'Stripe could not start checkout: Stripe returned HTTP 400 (parameter_unknown): The customer update setting cannot be used for this Checkout Session.',
            ]);

        $this->assertDatabaseHas('payment_attempts', [
            'user_id' => $user->id,
            'status' => 'failed',
            'failure_email_status' => 'sent',
        ]);
        $this->assertDatabaseCount('subscriptions', 0);
        Mail::assertSent(SubscriptionPaymentFailure::class, function (SubscriptionPaymentFailure $mail) use ($user): bool {
            $content = $mail->render();

            return $mail->hasTo($user->email)
                && $mail->planName === 'Premium'
                && $mail->amountCents === 49900
                && str_contains($content, 'Payment not completed')
                && str_contains($content, 'has not been activated');
        });
    }

    public function test_ambiguous_stripe_connection_failure_does_not_send_a_failure_email(): void
    {
        $user = User::factory()->create();
        $plan = SubscriptionPlan::query()->where('name', 'Premium')->firstOrFail();
        Http::fake([
            'https://api.stripe.com/v1/checkout/sessions' => fn () => throw new ConnectionException('Connection timed out.'),
        ]);

        $this->actingAs($user)
            ->from(route('user.subscription'))
            ->post(route('user.subscription.checkout', $plan))
            ->assertRedirect(route('user.subscription'))
            ->assertSessionHasErrors('payment');

        $this->assertDatabaseHas('payment_attempts', [
            'user_id' => $user->id,
            'status' => 'failed',
            'failure_email_status' => 'pending',
        ]);
        $this->assertDatabaseCount('subscriptions', 0);
        Mail::assertNotSent(SubscriptionPaymentFailure::class);
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
            'tax_amount_cents' => 0,
            'total_amount_cents' => 49900,
            'receipt_status' => 'sent',
        ]);
        $this->assertTrue($user->fresh()->hasWaterMonitoringAccess());
        Mail::assertSent(SubscriptionPaymentReceipt::class, function (SubscriptionPaymentReceipt $mail) use ($user): bool {
            $content = $mail->render();

            return $mail->hasTo($user->email)
                && $mail->totalCents === 49900
                && str_contains($content, 'Payment confirmed')
                && str_contains($content, 'Total paid')
                && ! str_contains($content, 'Tax')
                && str_contains($content, 'IoT sensor access');
        });
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

    public function test_checkout_payment_processing_is_idempotent_without_a_webhook_endpoint(): void
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
        $event = json_decode($payload, true, flags: JSON_THROW_ON_ERROR);

        app(SubscriptionPaymentProcessor::class)->handleWebhook($event);
        app(SubscriptionPaymentProcessor::class)->handleWebhook($event);

        $this->assertDatabaseCount('subscriptions', 1);
        $this->assertDatabaseCount('stripe_events', 1);
        $this->assertTrue($user->fresh()->hasWaterMonitoringAccess());
        Mail::assertSent(SubscriptionPaymentReceipt::class, 1);
    }

    public function test_webhook_endpoint_is_disabled_for_now(): void
    {
        $this->post('/stripe/webhook')->assertNotFound();

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
                    'billing_reason' => 'subscription_cycle',
                    'subscription' => $subscription->stripe_subscription_id,
                    'subtotal' => 49900,
                    'tax' => 0,
                    'total' => 49900,
                    'currency' => 'cad',
                    'customer_email' => $user->email,
                    'status_transitions' => ['paid_at' => now()->timestamp],
                    'lines' => ['data' => [['period' => ['end' => $periodEnd]]]],
                ],
            ],
        ], JSON_THROW_ON_ERROR);
        app(SubscriptionPaymentProcessor::class)->handleWebhook(
            json_decode($payload, true, flags: JSON_THROW_ON_ERROR),
        );

        $this->assertDatabaseHas('invoices', [
            'invoice_number' => 'INV-TEST-1',
            'user_id' => $user->id,
            'subscription_id' => $subscription->id,
            'amount' => '499.00',
            'tax_amount' => '0.00',
            'total' => '499.00',
            'status' => 'paid',
            'receipt_status' => 'sent',
        ]);
        $this->assertSame('active', $subscription->fresh()->status);
        $this->assertSame(
            now()->addMonthNoOverflow()->toDateString(),
            $subscription->fresh()->renewal_date->toDateString(),
        );
        Mail::assertSent(SubscriptionPaymentReceipt::class, function (SubscriptionPaymentReceipt $mail): bool {
            return $mail->paymentReference === 'in_test_paid'
                && $mail->totalCents === 49900
                && $mail->currency === 'CAD';
        });
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
            'amount_total' => (int) round((float) $plan->amount * 100),
            'total_details' => ['amount_tax' => 0],
            'metadata' => [
                'payment_attempt_id' => (string) $user->paymentAttempts()->value('id'),
                'user_id' => (string) $user->id,
                'plan_id' => (string) $plan->id,
            ],
        ];
    }
}
