@include('user.include.header')

<main class="content-area">
    @include('user.partials.dashboard-feedback')

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h1 class="h3 mb-1">Water reading</h1>
            <p class="text-muted mb-0">{{ $reading->recorded_at->format('M j, Y g:i A') }} · {{ $reading->site->name }}</p>
        </div>
        <div class="d-flex gap-2">
            <a class="btn btn-outline-secondary" href="{{ route('user.water-monitoring') }}">Back to readings</a>
        </div>
    </div>

    <div class="alert {{ $reading->complianceStatus($thresholds) === 'Needs attention' ? 'alert-warning' : 'alert-info' }}">
        Assessment: <strong>{{ $reading->complianceStatus($thresholds) }}</strong>.
        This assessment compares recorded values with your configured account limits and is not regulatory certification.
        @if ($reading->complianceIssues($thresholds) !== [])
            <div class="mt-1">Outside configured limits: {{ implode(', ', $reading->complianceIssues($thresholds)) }}.</div>
        @endif
    </div>

    <section class="card" aria-labelledby="reading-details-heading">
        <div class="card-header bg-white"><h2 id="reading-details-heading" class="h5 mb-0">Measured values</h2></div>
        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-sm-4">Site</dt><dd class="col-sm-8">{{ $reading->site->name }}</dd>
                <dt class="col-sm-4">Recorded at</dt><dd class="col-sm-8">{{ $reading->recorded_at->format('M j, Y g:i A') }}</dd>
                <dt class="col-sm-4">pH</dt><dd class="col-sm-8">{{ $reading->ph ?? '—' }}</dd>
                <dt class="col-sm-4">TDS</dt><dd class="col-sm-8">{{ $reading->tds === null ? '—' : $reading->tds.' ppm' }}</dd>
                <dt class="col-sm-4">Turbidity</dt><dd class="col-sm-8">{{ $reading->turbidity === null ? '—' : $reading->turbidity.' NTU' }}</dd>
                <dt class="col-sm-4">ORP</dt><dd class="col-sm-8">{{ $reading->orp === null ? '—' : $reading->orp.' mV' }}</dd>
                <dt class="col-sm-4">COD</dt><dd class="col-sm-8">{{ $reading->cod === null ? '—' : $reading->cod.' mg/L' }}</dd>
                <dt class="col-sm-4">BOD</dt><dd class="col-sm-8">{{ $reading->bod === null ? '—' : $reading->bod.' mg/L' }}</dd>
                <dt class="col-sm-4">Discharge flow</dt><dd class="col-sm-8">{{ $reading->discharge_flow === null ? '—' : $reading->discharge_flow.' m³/day' }}</dd>
                <dt class="col-sm-4">Temperature</dt><dd class="col-sm-8">{{ $reading->temperature === null ? '—' : $reading->temperature.' °C' }}</dd>
                <dt class="col-sm-4">Notes</dt><dd class="col-sm-8">{{ $reading->notes ?: 'No notes provided.' }}</dd>
            </dl>
        </div>
    </section>

    <form class="mt-4" action="{{ route('user.water-monitoring.destroy', $reading) }}" method="POST" data-confirm="Delete this water reading?" data-confirm-title="Are you sure you want to delete this water reading?">
        @csrf
        @method('DELETE')
        <button class="btn btn-outline-danger" type="submit" aria-label="Delete water reading" title="Delete reading">
            <i class="fas fa-trash-can" aria-hidden="true"></i>
        </button>
    </form>
</main>

@include('user.include.footer')
