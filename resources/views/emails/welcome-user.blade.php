<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Wateryze</title>
</head>
<body style="margin:0;background:#f3f6fa;color:#233044;font-family:Arial,Helvetica,sans-serif;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="padding:32px 12px;background:#f3f6fa;">
        <tr><td align="center">
            <table role="presentation" width="600" cellspacing="0" cellpadding="0" style="max-width:600px;background:#fff;border-radius:12px;overflow:hidden;">
                <tr>
                    <td style="padding:34px 38px;background:#073b66;color:#fff;">
                        <div style="font-size:13px;font-weight:bold;letter-spacing:1.6px;">WATERYZE</div>
                        <h1 style="margin:20px 0 8px;font-size:28px;line-height:1.25;">Welcome aboard, {{ $customer->first_name ?: $customer->name }}!</h1>
                        <p style="margin:0;color:#d9e8f5;font-size:16px;line-height:1.5;">Your account is ready. Let’s make water management simpler.</p>
                    </td>
                </tr>
                <tr>
                    <td style="padding:34px 38px;">
                        <p style="margin:0 0 18px;font-size:16px;line-height:1.65;">Thank you for joining Wateryze. Your personal dashboard brings your water operations, site information, reminders, and account details together in one place.</p>
                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="margin:24px 0;background:#f5f9fc;border-radius:8px;">
                            <tr><td style="padding:20px 22px;">
                                <h2 style="margin:0 0 12px;color:#073b66;font-size:17px;">Get started</h2>
                                <p style="margin:0 0 9px;line-height:1.55;">&#8226; Add your treatment sites and facility details.</p>
                                <p style="margin:0 0 9px;line-height:1.55;">&#8226; Record chemical usage and set helpful reminders.</p>
                                <p style="margin:0;line-height:1.55;">&#8226; Explore subscription options to unlock sensor-powered water monitoring.</p>
                            </td></tr>
                        </table>
                        <p style="margin:26px 0;text-align:center;">
                            <a href="{{ route('user.dashboard') }}" style="display:inline-block;padding:13px 24px;border-radius:6px;background:#0876b9;color:#fff;text-decoration:none;font-weight:bold;">Open your dashboard</a>
                        </p>
                        <p style="margin:0;font-size:14px;line-height:1.6;">If you have questions, reply to this email and our team will be glad to help.</p>
                        <p style="margin:22px 0 0;line-height:1.6;">Warm regards,<br><strong>The Wateryze Team</strong></p>
                    </td>
                </tr>
                <tr><td style="padding:18px 38px;background:#f8fafc;color:#718096;font-size:12px;line-height:1.5;">This welcome message was sent to {{ $customer->email }} because a Wateryze account was created using this email address.</td></tr>
            </table>
        </td></tr>
    </table>
</body>
</html>
