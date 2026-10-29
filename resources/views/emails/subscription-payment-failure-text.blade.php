WATERYZE — PAYMENT NOT COMPLETED

Hello {{ $customer->first_name ?: $customer->name }},

We couldn't complete checkout for your Wateryze {{ $planName }} plan. No subscription access has been added to your account.

CHECKOUT DETAILS
Plan: {{ $planName }}
Billing period: {{ ucfirst($billingCycle) }}
Plan price: {{ strtoupper($currency) }} {{ number_format($amountCents / 100, 2) }}
Billing email: {{ $customer->email }}
Date: {{ $attemptedAt->format('M j, Y H:i') }}
@if ($paymentReference)
Payment reference: {{ $paymentReference }}
@endif

WHAT HAPPENED?
{{ $reason }}

You can try again from your billing page:
{{ route('user.subscription') }}

If your bank shows a pending authorization, please allow your bank time to release it. Contact your bank if it remains after their normal processing period.

If you need help, reply to this email and our team will be happy to assist.

Your account was not granted a paid subscription.
