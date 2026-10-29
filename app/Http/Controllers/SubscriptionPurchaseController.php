<?php

namespace App\Http\Controllers;

use App\Models\PaymentAttempt;
use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use App\Models\User;
use App\Services\StripeCheckoutService;
use App\Services\StripePaymentException;
use App\Services\SubscriptionPaymentNotifier;
use App\Services\SubscriptionPaymentProcessor;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SubscriptionPurchaseController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();
        $subscriptions = $user->subscriptions()
            ->with('plan')
            ->latest()
            ->get();
        $invoices = $user->loadMissing('subscriptions.invoices')
            ->subscriptions
            ->flatMap(fn (Subscription $subscription) => $subscription->invoices)
            ->sortByDesc('invoice_date')
            ->take(20);

        return view('user.subscription.index', [
            'plans' => SubscriptionPlan::query()->where('status', 'active')->orderBy('amount')->get(),
            'subscriptions' => $subscriptions,
            'invoices' => $invoices,
            'waterMonitoringAccess' => $user->hasWaterMonitoringAccess(),
        ]);
    }

    public function checkout(
        Request $request,
        int $plan,
        StripeCheckoutService $stripe,
        SubscriptionPaymentNotifier $notifier,
    ): RedirectResponse {
        $user = $request->user();
        $subscriptionPlan = SubscriptionPlan::query()
            ->where('status', 'active')
            ->findOrFail($plan);

        if ($user->subscriptions()
            ->whereIn('status', ['active', 'past_due'])
            ->where(fn (Builder $query) => $query->whereNull('end_date')->orWhereDate('end_date', '>=', now()->toDateString()))
            ->exists()) {
            return redirect()->route('user.subscription')
                ->withErrors(['subscription' => 'An active or unpaid subscription already exists. Contact support to change your plan.']);
        }

        if ($user->paymentAttempts()->where('status', 'pending')->where('expires_at', '>', now())->exists()) {
            return redirect()->route('user.subscription')
                ->withErrors(['payment' => 'A checkout session is already pending. Complete it or wait for it to expire before starting another.']);
        }

        if (! $stripe->isConfigured()) {
            return back()->withErrors([
                'payment' => 'Online payments are not configured. Please contact support.',
            ]);
        }

        $amountCents = (int) round((float) $subscriptionPlan->amount * 100);
        if ($amountCents < 1) {
            return back()->withErrors([
                'payment' => 'This plan does not have a payable price. Please contact support.',
            ]);
        }

        $attempt = DB::transaction(function () use ($user, $subscriptionPlan, $amountCents): ?PaymentAttempt {
            $lockedUser = User::query()->lockForUpdate()->findOrFail($user->id);
            $hasSubscription = $lockedUser->subscriptions()
                ->whereIn('status', ['active', 'past_due'])
                ->where(fn (Builder $query) => $query->whereNull('end_date')
                    ->orWhereDate('end_date', '>=', now()->toDateString()))
                ->exists();
            $hasPendingCheckout = $lockedUser->paymentAttempts()
                ->where('status', 'pending')
                ->where('expires_at', '>', now())
                ->exists();

            if ($hasSubscription || $hasPendingCheckout) {
                return null;
            }

            return $lockedUser->paymentAttempts()->create([
                'subscription_plan_id' => $subscriptionPlan->id,
                'amount_cents' => $amountCents,
                'currency' => 'CAD',
                'billing_cycle' => $subscriptionPlan->billing_cycle,
                'plan_snapshot' => [
                    'name' => $subscriptionPlan->name,
                    'description' => $subscriptionPlan->description,
                    'features' => $subscriptionPlan->features ?? [],
                    'water_monitoring_enabled' => $subscriptionPlan->water_monitoring_enabled,
                ],
                'status' => 'pending',
                'expires_at' => now()->addHour(),
            ]);
        });

        if ($attempt === null) {
            return redirect()->route('user.subscription')
                ->withErrors(['payment' => 'An active subscription or checkout session already exists.']);
        }

        try {
            $session = $stripe->createCheckoutSession($attempt->load(['user', 'plan']));
        } catch (StripePaymentException $exception) {
            $attempt->update(['status' => 'failed']);
            $notifier->sendFailure(
                $attempt,
                'We could not create a secure checkout session. Please return to your billing page and try again.',
            );
            Log::warning('Stripe Checkout could not be started.', [
                'payment_attempt_id' => $attempt->id,
                'reason' => $exception->getMessage(),
            ]);

            return back()->withErrors([
                'payment' => 'Stripe could not start checkout: '.$exception->getMessage(),
            ]);
        } catch (ConnectionException $exception) {
            $attempt->update(['status' => 'failed']);
            Log::warning('Could not connect to Stripe Checkout.', [
                'payment_attempt_id' => $attempt->id,
                'reason' => $exception->getMessage(),
            ]);

            return back()->withErrors([
                'payment' => 'We could not connect securely to Stripe. Please try again in a moment.',
            ]);
        }

        DB::transaction(function () use ($attempt, $session): void {
            $lockedAttempt = PaymentAttempt::query()->lockForUpdate()->findOrFail($attempt->id);
            $lockedAttempt->update([
                'stripe_checkout_session_id' => $session['id'],
                'status' => $lockedAttempt->status === 'pending' ? 'pending' : $lockedAttempt->status,
            ]);
        });

        return redirect()->away($session['url']);
    }

    public function success(
        Request $request,
        StripeCheckoutService $stripe,
        SubscriptionPaymentProcessor $processor,
    ): RedirectResponse {
        $validated = $request->validate([
            'session_id' => ['required', 'string', 'max:255', 'regex:/^cs_[A-Za-z0-9_]+$/'],
        ]);
        $attempt = $request->user()->paymentAttempts()
            ->where('stripe_checkout_session_id', $validated['session_id'])
            ->firstOrFail();

        try {
            $checkout = $stripe->retrieveCheckoutSession($validated['session_id']);
            $subscription = $processor->fulfillCheckout($checkout);
        } catch (StripePaymentException|ConnectionException $exception) {
            Log::warning('Stripe Checkout could not be verified on return.', [
                'payment_attempt_id' => $attempt->id,
                'reason' => $exception->getMessage(),
            ]);

            return redirect()->route('user.subscription')->withErrors([
                'payment' => 'We could not verify the payment yet. Your subscription has not been activated. Please refresh later or contact support.',
            ]);
        }

        if ($subscription === null) {
            return redirect()->route('user.subscription')->withErrors([
                'payment' => 'Stripe has not confirmed payment. No subscription was activated.',
            ]);
        }

        if ($subscription->water_monitoring_enabled) {
            return redirect()->route('user.water-monitoring')
                ->with('status', 'Payment confirmed. Your Premium water-monitoring access is active.');
        }

        return redirect()->route('user.subscription')
            ->with('status', 'Payment confirmed. Your subscription is active.');
    }

    public function cancelled(Request $request, SubscriptionPaymentNotifier $notifier): RedirectResponse
    {
        $validated = $request->validate([
            'attempt_id' => ['nullable', 'integer', 'min:1'],
        ]);
        $attemptId = $validated['attempt_id'] ?? null;

        if ($attemptId !== null) {
            $attempt = $request->user()->paymentAttempts()
                ->whereKey($attemptId)
                ->where('status', 'pending')
                ->first();

            if ($attempt !== null) {
                $attempt->update(['status' => 'cancelled']);
                $notifier->sendFailure(
                    $attempt,
                    'Checkout was cancelled before Stripe confirmed payment. You can safely try again from your billing page.',
                );
            }
        }

        return redirect()->route('user.subscription')
            ->with('status', 'Checkout was cancelled. No subscription was created.');
    }

    public function cancel(
        Request $request,
        StripeCheckoutService $stripe,
    ): RedirectResponse {
        $subscription = $request->user()->subscriptions()
            ->where('status', 'active')
            ->whereNotNull('stripe_subscription_id')
            ->latest()
            ->firstOrFail();

        try {
            $stripeSubscription = $stripe->cancelSubscriptionAtPeriodEnd($subscription->stripe_subscription_id);
            if (
                ($stripeSubscription['id'] ?? null) !== $subscription->stripe_subscription_id
                || ($stripeSubscription['cancel_at_period_end'] ?? false) !== true
            ) {
                throw new StripePaymentException('Stripe did not confirm the requested cancellation.');
            }
        } catch (StripePaymentException|ConnectionException $exception) {
            Log::warning('Stripe subscription cancellation could not be scheduled.', [
                'subscription_id' => $subscription->id,
                'reason' => $exception->getMessage(),
            ]);

            return back()->withErrors([
                'subscription' => 'The cancellation request could not be sent to Stripe. Please try again or contact support.',
            ]);
        }

        $subscription->update(['auto_renew' => false]);

        return back()->with('status', 'Cancellation is scheduled at the end of the current billing period.');
    }
}
