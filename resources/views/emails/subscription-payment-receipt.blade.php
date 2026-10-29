<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment confirmed</title>
</head>
<body style="margin:0;background:#f3f6fa;color:#233044;font-family:Arial,Helvetica,sans-serif;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="padding:32px 12px;background:#f3f6fa;">
        <tr><td align="center">
            <table role="presentation" width="600" cellspacing="0" cellpadding="0" style="max-width:600px;background:#fff;border-radius:12px;overflow:hidden;">
                <tr>
                    <td style="padding:30px 36px;background:#073b66;color:#fff;">
                        <div style="font-size:13px;font-weight:bold;letter-spacing:1.5px;">WATERYZE</div>
                        <h1 style="margin:18px 0 6px;font-size:26px;">Payment confirmed</h1>
                        <p style="margin:0;color:#d9e8f5;">Your subscription is active.</p>
                    </td>
                </tr>
                <tr>
                    <td style="padding:32px 36px;">
                        <p style="margin:0 0 16px;">Hello {{ $customer->first_name ?: $customer->name }},</p>
                        <p style="margin:0 0 24px;line-height:1.6;">Thank you for choosing Wateryze. Stripe confirmed your payment, and your {{ $subscription->plan?->name ?? 'subscription' }} plan is now active.</p>

                        <h2 style="margin:0 0 12px;font-size:17px;">Payment summary</h2>
                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;font-size:14px;">
                            <tr><td style="padding:9px 0;border-bottom:1px solid #e8edf3;">Plan</td><td align="right" style="padding:9px 0;border-bottom:1px solid #e8edf3;">{{ $subscription->plan?->name ?? 'Subscription' }}</td></tr>
                            <tr><td style="padding:9px 0;border-bottom:1px solid #e8edf3;">Billing period</td><td align="right" style="padding:9px 0;border-bottom:1px solid #e8edf3;">{{ ucfirst($subscription->billing_cycle) }}</td></tr>
                            <tr><td style="padding:9px 0;border-bottom:1px solid #e8edf3;">Payment date</td><td align="right" style="padding:9px 0;border-bottom:1px solid #e8edf3;">{{ $paidAt->format('M j, Y') }}</td></tr>
                            <tr><td style="padding:9px 0;border-bottom:1px solid #e8edf3;">Billing email</td><td align="right" style="padding:9px 0;border-bottom:1px solid #e8edf3;">{{ $customer->email }}</td></tr>
                            <tr><td style="padding:9px 0;border-bottom:1px solid #e8edf3;">Payment method</td><td align="right" style="padding:9px 0;border-bottom:1px solid #e8edf3;">Stripe</td></tr>
                            <tr><td style="padding:9px 0;border-bottom:1px solid #e8edf3;">Next billing date</td><td align="right" style="padding:9px 0;border-bottom:1px solid #e8edf3;">{{ $subscription->renewal_date?->format('M j, Y') ?? 'See your billing page' }}</td></tr>
                            <tr><td style="padding:13px 0;font-weight:bold;font-size:16px;">Total paid</td><td align="right" style="padding:13px 0;font-weight:bold;font-size:16px;">{{ strtoupper($currency) }} {{ number_format($totalCents / 100, 2) }}</td></tr>
                        </table>

                        <p style="margin:20px 0 4px;font-size:13px;color:#627187;">Payment reference</p>
                        <p style="margin:0 0 24px;font-size:13px;overflow-wrap:anywhere;">{{ $paymentReference }}</p>

                        <h2 style="margin:0 0 10px;font-size:17px;">Included with your plan</h2>
                        @if (count($subscription->features ?? []))
                            <ul style="padding-left:20px;margin:0 0 26px;line-height:1.8;">
                                @foreach ($subscription->features as $feature)
                                    <li>{{ $feature }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p style="margin:0 0 26px;">Your plan features are available in your account.</p>
                        @endif

                        <p style="margin:0 0 22px;line-height:1.6;">Your subscription renews automatically unless you cancel before the next billing date. You can review your subscription and payment history from your account.</p>
                        <p style="margin:0 0 26px;">
                            <a href="{{ route('user.subscription') }}" style="display:inline-block;padding:12px 20px;border-radius:6px;background:#0876b9;color:#fff;text-decoration:none;font-weight:bold;">View billing details</a>
                        </p>
                        <p style="margin:0;line-height:1.6;">Questions about this payment? Reply to this email and our team will be happy to help.</p>
                    </td>
                </tr>
                <tr><td style="padding:18px 36px;background:#f8fafc;color:#718096;font-size:12px;">This payment was securely processed by Stripe. Please keep this email for your records.</td></tr>
            </table>
        </td></tr>
    </table>
</body>
</html>
