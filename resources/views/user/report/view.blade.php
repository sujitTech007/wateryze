@include('user.include.header')

<main class="content-area">
    @include('user.partials.dashboard-feedback')

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h1 class="h3 mb-1">Water-quality report</h1>
            <p class="text-muted mb-0">Measurement details and account-configured assessment.</p>
        </div>
        <a href="{{ route('user.reports.index') }}" class="btn btn-outline-secondary">Back to reports</a>
    </div>

    @if ($report)
        <section class="card" aria-labelledby="report-site">
            <div class="card-header bg-white d-flex flex-wrap justify-content-between gap-2">
                <strong id="report-site">{{ $report->site->name }}</strong>
                <span>{{ $report->recorded_at->format('M j, Y g:i A') }}</span>
            </div>
            <div class="card-body">
                <p>Assessment: <strong>{{ $report->complianceStatus($thresholds) }}</strong></p>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            @foreach ([
                                'pH' => ['ph', ''],
                                'TDS' => ['tds', 'ppm'],
                                'Turbidity' => ['turbidity', 'NTU'],
                                'ORP' => ['orp', 'mV'],
                                'COD' => ['cod', 'mg/L'],
                                'BOD' => ['bod', 'mg/L'],
                                'Discharge flow' => ['discharge_flow', 'm³/day'],
                                'Temperature' => ['temperature', '°C'],
                            ] as $label => [$field, $unit])
                                <tr>
                                    <th scope="row">{{ $label }}</th>
                                    <td>{{ $report->{$field} ?? 'Not recorded' }}{{ $report->{$field} === null ? '' : ' '.$unit }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if ($report->notes)
                    <p><strong>Notes:</strong> {{ $report->notes }}</p>
                @endif
            </div>
        </section>
    @else
        <div class="alert alert-info">
            No readings have been recorded.
            <a href="{{ route('user.water-monitoring.apis.create') }}">Connect a sensor API</a> to import the first reading.
        </div>
    @endif
</main>

@include('user.include.footer')
