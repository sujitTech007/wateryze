@include('user.include.header')

<main class="content-area">
    @include('user.partials.dashboard-feedback')

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h1 class="h3 mb-1">Water-quality reports</h1>
            <p class="text-muted mb-0">View and export readings received from your sensor APIs.</p>
        </div>
        <a class="btn btn-outline-primary" href="{{ route('user.reports.export') }}">
            <i class="fas fa-download me-2" aria-hidden="true"></i>Export CSV
        </a>
    </div>

    <section class="card" aria-labelledby="reports-heading">
        <h2 id="reports-heading" class="visually-hidden">Saved water-quality reports</h2>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Site</th>
                        <th scope="col">pH</th>
                        <th scope="col">TDS</th>
                        <th scope="col">Turbidity</th>
                        <th scope="col">Assessment</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reports as $report)
                        <tr>
                            <td>{{ $report->recorded_at->format('M j, Y g:i A') }}</td>
                            <td>{{ $report->site->name }}</td>
                            <td>{{ $report->ph ?? '—' }}</td>
                            <td>{{ $report->tds ?? '—' }}</td>
                            <td>{{ $report->turbidity ?? '—' }}</td>
                            <td>{{ $report->complianceStatus($thresholds) }}</td>
                            <td><a class="btn btn-sm btn-outline-primary" href="{{ route('user.reports.view', $report) }}">View</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-muted text-center py-4">
                                Reports are created from sensor readings.
                                <a href="{{ route('user.water-monitoring.apis.create') }}">Connect a sensor API</a>.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($reports->hasPages())
            <div class="card-body">{{ $reports->links() }}</div>
        @endif
    </section>
</main>

@include('user.include.footer')
