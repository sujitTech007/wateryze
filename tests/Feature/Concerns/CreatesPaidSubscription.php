<?php

namespace Tests\Feature\Concerns;

use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use App\Models\User;

trait CreatesPaidSubscription
{
    protected function createPaidSubscription(User $user, bool $waterMonitoring = true): Subscription
    {
        $plan = SubscriptionPlan::query()
            ->where('water_monitoring_enabled', $waterMonitoring)
            ->firstOrFail();
        $paidAt = now();
        $attempt = $user->paymentAttempts()->create([
            'subscription_plan_id' => $plan->id,
            'amount_cents' => (int) round((float) $plan->amount * 100),
            'currency' => 'CAD',
            'billing_cycle' => $plan->billing_cycle,
            'plan_snapshot' => [
                'name' => $plan->name,
                'description' => $plan->description,
                'features' => $plan->features,
                'water_monitoring_enabled' => $waterMonitoring,
            ],
            'stripe_checkout_session_id' => 'cs_test_'.$user->id,
            'stripe_subscription_id' => 'sub_test_'.$user->id,
            'status' => 'paid',
            'paid_at' => $paidAt,
            'expires_at' => $paidAt->copy()->addHour(),
        ]);

        return $user->subscriptions()->create([
            'payment_attempt_id' => $attempt->id,
            'stripe_subscription_id' => $attempt->stripe_subscription_id,
            'water_monitoring_enabled' => $waterMonitoring,
            'features' => $plan->features,
            'subscription_plan_id' => $plan->id,
            'billing_cycle' => $plan->billing_cycle,
            'amount' => $plan->amount,
            'start_date' => $paidAt->toDateString(),
            'end_date' => $paidAt->copy()->addMonthNoOverflow()->toDateString(),
            'renewal_date' => $paidAt->copy()->addMonthNoOverflow()->toDateString(),
            'status' => 'active',
            'auto_renew' => true,
            'payment_method' => 'stripe',
        ]);
    }
}
