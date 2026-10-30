<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Invoice {{ $invoice->invoice_number }}</title>
    <style>
        @page { margin: 38px 42px; }
        body { margin: 0; color: #233044; font: 12px DejaVu Sans, sans-serif; line-height: 1.5; }
        .header { padding: 22px 24px; background: #073b66; color: #fff; }
        .brand { font-size: 11px; font-weight: bold; letter-spacing: 2px; }
        .title { margin: 12px 0 0; font-size: 26px; }
        .muted { color: #627187; }
        .meta { width: 100%; margin: 25px 0; border-collapse: collapse; }
        .meta td { width: 50%; vertical-align: top; }
        .label { color: #627187; font-size: 10px; text-transform: uppercase; letter-spacing: .6px; }
        .value { margin-top: 3px; font-weight: bold; }
        .items { width: 100%; margin-top: 25px; border-collapse: collapse; }
        .items th { padding: 10px; background: #eef4f8; text-align: left; }
        .items td { padding: 13px 10px; border-bottom: 1px solid #e3eaf0; }
        .right { text-align: right; }
        .total { margin-top: 14px; text-align: right; font-size: 17px; font-weight: bold; color: #073b66; }
        .payment { margin-top: 25px; padding: 13px 15px; background: #f5f9fc; }
        .footer { margin-top: 42px; padding-top: 14px; border-top: 1px solid #e3eaf0; color: #718096; font-size: 10px; }
    </style>
</head>
<body>
    <div class="header">
        <div class="brand">WATERYZE</div>
        <h1 class="title">Payment invoice</h1>
    </div>

    <table class="meta">
        <tr>
            <td>
                <div class="label">Billed to</div>
                <div class="value">{{ $invoice->user?->name }}</div>
                <div>{{ $invoice->billing_email }}</div>
                @if ($invoice->billing_address)<div>{{ $invoice->billing_address }}</div>@endif
                @if ($invoice->city || $invoice->province)<div>{{ collect([$invoice->city, $invoice->province])->filter()->implode(', ') }}</div>@endif
                @if ($invoice->postal_code || $invoice->country)<div>{{ collect([$invoice->postal_code, $invoice->country])->filter()->implode(', ') }}</div>@endif
            </td>
            <td class="right">
                <div class="label">Invoice number</div>
                <div class="value">{{ $invoice->invoice_number }}</div>
                <div style="margin-top:12px" class="label">Invoice date</div>
                <div class="value">{{ $invoice->invoice_date?->format('F j, Y') }}</div>
                <div style="margin-top:12px" class="label">Payment status</div>
                <div class="value">{{ strtoupper($invoice->status) }}</div>
            </td>
        </tr>
    </table>

    <table class="items">
        <thead>
            <tr><th>Description</th><th class="right">Billing period</th><th class="right">Amount</th></tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <strong>{{ $invoice->subscription?->plan?->name ?? 'Wateryze subscription' }}</strong>
                    <div class="muted">Subscription plan</div>
                </td>
                <td class="right">{{ ucfirst($invoice->subscription?->billing_cycle ?? 'subscription') }}</td>
                <td class="right">{{ strtoupper($currency) }} {{ number_format((float) $invoice->amount, 2) }}</td>
            </tr>
        </tbody>
    </table>

    <div class="total">Total paid: {{ strtoupper($currency) }} {{ number_format((float) $invoice->total, 2) }}</div>

    <div class="payment">
        <strong>Payment method:</strong> Stripe<br>
        <strong>Payment date:</strong> {{ $invoice->paid_at?->format('F j, Y') }}<br>
        <strong>Payment reference:</strong> {{ $invoice->paymentAttempt?->stripe_checkout_session_id ?? $invoice->notes }}
    </div>

    <div class="footer">Thank you for choosing Wateryze. This invoice confirms payment for your subscription.</div>
</body>
</html>
