<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment not completed</title>
</head>
<body style="margin:0;background:#f3f6fa;color:#233044;font-family:Arial,Helvetica,sans-serif;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="padding:32px 12px;background:#f3f6fa;">
        <tr><td align="center">
            <table role="presentation" width="600" cellspacing="0" cellpadding="0" style="max-width:600px;background:#fff;border-radius:12px;overflow:hidden;">
                <tr>
                    <td style="padding:30px 36px;background:#073b66;color:#fff;">
                        <div style="font-size:13px;font-weight:bold;letter-spacing:1.5px;">WATERYZE</div>
                        <h1 style="margin:18px 0 6px;font-size:26px;">Payment not completed</h1>
                        <p style="margin:0;color:#d9e8f5;">Your subscription has not been activated.</p>
                    </td>
                </tr>
                <tr>
                    <td style="padding:32px 36px;">
                        <p style="margin:0 0 16px;">Hello {{ $customer->first_name ?: $customer->name }},</p>
                        <p style="margin:0 0 24px;line-height:1.6;">We couldn't complete checkout for your Wateryze {{ $planName }} plan. No subscription access has been added to your account.</p>

                        <h2 style="margin:0 0 12px;font-size:17px;">Checkout details</h2>
                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;font-size:14px;">
                            <tr><td style="padding:9px 0;border-bottom:1px solid #e8edf3;">Plan</td><td align="right" style="padding:9px 0;border-bottom:1px solid #e8edf3;">{{ $planName }}</td></tr>
                            <tr><td style="padding:9px 0;border-bottom:1px solid #e8edf3;">Billing period</td><td align="right" style="padding:9px 0;border-bottom:1px solid #e8edf3;">{{ ucfirst($billingCycle) }}</td></tr>
                            <tr><td style="padding:9px 0;border-bottom:1px solid #e8edf3;">Plan price</td><td align="right" style="padding:9px 0;border-bottom:1px solid #e8edf3;">{{ strtoupper($currency) }} {{ number_format($amountCents / 100, 2) }}</td></tr>
                            <tr><td style="padding:9px 0;border-bottom:1px solid #e8edf3;">Billing email</td><td align="right" style="padding:9px 0;border-bottom:1px solid #e8edf3;">{{ $customer->email }}</td></tr>
                            <tr><td style="padding:9px 0;border-bottom:1px solid #e8edf3;">Date</td><td align="right" style="padding:9px 0;border-bottom:1px solid #e8edf3;">{{ $attemptedAt->format('M j, Y H:i') }}</td></tr>
                            @if ($paymentReference)
                                <tr><td style="padding:9px 0;border-bottom:1px solid #e8edf3;">Payment reference</td><td align="right" style="padding:9px 0;border-bottom:1px solid #e8edf3;overflow-wrap:anywhere;">{{ $paymentReference }}</td></tr>
                            @endif
                        </table>

                        <h2 style="margin:24px 0 10px;font-size:17px;">What happened?</h2>
                        <p style="margin:0 0 20px;line-height:1.6;">{{ $reason }}</p>
                        <p style="margin:0 0 22px;line-height:1.6;">You can try again from your billing page. If your bank shows a pending authorization, please allow your bank time to release it; contact your bank if it remains after their normal processing period.</p>
                        <p style="margin:0 0 26px;">
                            <a href="{{ route('user.subscription') }}" style="display:inline-block;padding:12px 20px;border-radius:6px;background:#0876b9;color:#fff;text-decoration:none;font-weight:bold;">Return to billing</a>
                        </p>
                        <p style="margin:0;line-height:1.6;">If you need help, reply to this email and our team will be happy to assist.</p>
                    </td>
                </tr>
                <tr><td style="padding:18px 36px;background:#f8fafc;color:#718096;font-size:12px;">This message is about your Wateryze checkout attempt. Your account was not granted a paid subscription.</td></tr>
            </table>
        </td></tr>
    </table>
</body>
</html>
