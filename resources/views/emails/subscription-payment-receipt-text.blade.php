WATERYZE — PAYMENT CONFIRMED

Hello {{ $customer->first_name ?: $customer->name }},

Stripe confirmed your payment, and your {{ $subscription->plan?->name ?? 'subscription' }} plan is now active.

PAYMENT SUMMARY
Plan: {{ $subscription->plan?->name ?? 'Subscription' }}
Billing period: {{ ucfirst($subscription->billing_cycle) }}
Payment date: {{ $paidAt->format('M j, Y') }}
Billing email: {{ $customer->email }}
Payment method: Stripe
Next billing date: {{ $subscription->renewal_date?->format('M j, Y') ?? 'See your billing page' }}
Total paid: {{ strtoupper($currency) }} {{ number_format($totalCents / 100, 2) }}
Payment reference: {{ $paymentReference }}
Invoice: {{ $invoice->invoice_number }}
Download your invoice: {{ route('user.invoices.download', $invoice) }}
The invoice PDF is attached to this email.

PLAN FEATURES
@forelse ($subscription->features ?? [] as $feature)
- {{ $feature }}
@empty
Your plan features are available in your account.
@endforelse

Your subscription renews automatically unless you cancel before the next billing date. Review billing details at:
{{ route('user.subscription') }}

Questions about this payment? Reply to this email and our team will be happy to help.

This payment was securely processed by Stripe. Please keep this email for your records.
