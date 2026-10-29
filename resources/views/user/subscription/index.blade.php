@include('user.include.header')

<main class="content-area">
    @include('user.partials.dashboard-feedback')

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h1 class="h3 mb-1">Billing &amp; subscriptions</h1>
            <p class="text-muted mb-0">Review your plan, payment status, and billing history.</p>
        </div>
        <a class="btn btn-outline-primary" href="{{ route('subscription') }}">View plans</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    @if (! $waterMonitoringAccess)
        <div class="alert alert-info" role="status">
            Water monitoring is a Premium feature and becomes available only after Stripe confirms a successful payment.
            <a href="{{ route('subscription') }}">Compare available plans</a>.
        </div>
    @endif

    <section class="card mb-4">
        <div class="card-header bg-white"><h2 class="h5 mb-0">Your subscriptions</h2></div>
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead><tr><th>Plan</th><th>Price</th><th>Billing cycle</th><th>Status</th><th>Next renewal / end date</th><th>Water monitoring</th><th>Actions</th></tr></thead>
                <tbody>
                    @forelse ($subscriptions as $subscription)
                        <tr>
                            <td>{{ $subscription->plan?->name ?? 'Plan unavailable' }}</td>
                            <td>CAD {{ number_format((float) $subscription->amount, 2) }}</td>
                            <td>{{ ucfirst($subscription->billing_cycle) }}</td>
                            <td><span class="badge {{ $subscription->status === 'active' ? 'bg-success' : 'bg-secondary' }}">{{ ucfirst(str_replace('_', ' ', $subscription->status)) }}</span></td>
                            <td>{{ $subscription->renewal_date?->format('M j, Y') ?? '—' }}</td>
                            <td>{{ $subscription->water_monitoring_enabled ? 'Included' : 'Not included' }}</td>
                            <td>
                                @if ($subscription->status === 'active' && $subscription->stripe_subscription_id)
                                    <form method="POST" action="{{ route('user.subscription.cancel') }}" onsubmit="return confirm('Schedule cancellation at the end of the current billing period?')">
                                        @csrf
                                        <button class="btn btn-sm btn-outline-danger" type="submit">Cancel renewal</button>
                                    </form>
                                @else
                                    —
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td class="text-center text-muted py-4" colspan="7">You do not have a paid subscription yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <section class="card mb-4">
        <div class="card-header bg-white"><h2 class="h5 mb-0">Payment history</h2></div>
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead><tr><th>Invoice</th><th>Date</th><th>Total paid</th><th>Status</th></tr></thead>
                <tbody>
                    @forelse ($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->invoice_number }}</td>
                            <td>{{ $invoice->invoice_date?->format('M j, Y') ?? '—' }}</td>
                            <td>CAD {{ number_format((float) $invoice->total, 2) }}</td>
                            <td>{{ ucfirst($invoice->status) }}</td>
                        </tr>
                    @empty
                        <tr><td class="text-center text-muted py-4" colspan="4">No paid invoices are available yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <section class="card">
        <div class="card-header bg-white"><h2 class="h5 mb-0">Recent checkout attempts</h2></div>
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead><tr><th>Plan</th><th>Amount</th><th>Status</th><th>Started</th></tr></thead>
                <tbody>
                    @forelse (auth()->user()->paymentAttempts()->with('plan')->latest()->limit(10)->get() as $attempt)
                        <tr>
                            <td>{{ $attempt->plan?->name ?? 'Plan unavailable' }}</td>
                            <td>CAD {{ number_format($attempt->amount_cents / 100, 2) }}</td>
                            <td>{{ ucfirst($attempt->status) }}</td>
                            <td>{{ $attempt->created_at->format('M j, Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr><td class="text-center text-muted py-4" colspan="4">No checkout attempts have been made.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</main>

@include('user.include.footer')
