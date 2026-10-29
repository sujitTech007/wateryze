@include('user.include.header')

<main class="content-area">
    @include('user.partials.dashboard-feedback')

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div><h1 class="h3 mb-1">{{ $site->name }}</h1><p class="text-muted mb-0">{{ $site->site_code ?: 'Site details' }}</p></div>
        <div class="d-flex gap-2">
            <a class="btn btn-outline-secondary" href="{{ route('user.site-locations') }}">Back to sites</a>
            <a class="btn btn-primary" href="{{ route('user.site-locations.edit', $site) }}">Edit site</a>
        </div>
    </div>

    <section class="card mb-4" aria-labelledby="site-details-heading">
        <div class="card-header bg-white"><h2 id="site-details-heading" class="h5 mb-0">Location and facility details</h2></div>
        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-sm-4">Facility type</dt><dd class="col-sm-8">{{ $site->facility_type ?: 'Not specified' }}</dd>
                <dt class="col-sm-4">Address</dt><dd class="col-sm-8">{{ $site->address }}, {{ $site->city }}, {{ $site->province }} {{ $site->postal_code }} {{ $site->country }}</dd>
                <dt class="col-sm-4">Treatment type</dt><dd class="col-sm-8">{{ $site->treatment_type ?: 'Not specified' }}</dd>
                <dt class="col-sm-4">Treatment capacity</dt><dd class="col-sm-8">{{ $site->capacity ? $site->capacity.' m³/day' : 'Not specified' }}</dd>
                <dt class="col-sm-4">Coordinates</dt><dd class="col-sm-8">{{ $site->latitude ?? '—' }}, {{ $site->longitude ?? '—' }}</dd>
                <dt class="col-sm-4">Water readings</dt>
                <dd class="col-sm-8">
                    @if ($hasWaterMonitoringAccess)
                        {{ $site->water_readings_count }}
                    @else
                        <a href="{{ route('user.subscription') }}">Available with Premium</a>
                    @endif
                </dd>
                <dt class="col-sm-4">Chemical records</dt><dd class="col-sm-8">{{ $site->chemical_usages_count }}</dd>
                <dt class="col-sm-4">Reminders</dt><dd class="col-sm-8">{{ $site->reminders_count }}</dd>
            </dl>
        </div>
    </section>

    <div class="row g-4">
        @if ($hasWaterMonitoringAccess)
        <section class="col-lg-4">
            <div class="card h-100">
                <div class="card-header bg-white"><h2 class="h6 mb-0">Recent readings</h2></div>
                <ul class="list-group list-group-flush">
                    @forelse ($site->waterReadings as $reading)
                        <li class="list-group-item">{{ $reading->recorded_at->format('M j, Y g:i A') }} · pH {{ $reading->ph ?? '—' }}</li>
                    @empty
                        <li class="list-group-item text-muted">No readings yet.</li>
                    @endforelse
                </ul>
            </div>
        </section>
        @endif
        <section class="col-lg-4">
            <div class="card h-100">
                <div class="card-header bg-white"><h2 class="h6 mb-0">Recent chemical usage</h2></div>
                <ul class="list-group list-group-flush">
                    @forelse ($site->chemicalUsages as $usage)
                        <li class="list-group-item">{{ $usage->usage_date->format('M j, Y') }} · {{ $usage->chemical_name }}</li>
                    @empty
                        <li class="list-group-item text-muted">No chemical usage recorded.</li>
                    @endforelse
                </ul>
            </div>
        </section>
        <section class="col-lg-4">
            <div class="card h-100">
                <div class="card-header bg-white"><h2 class="h6 mb-0">Recent reminders</h2></div>
                <ul class="list-group list-group-flush">
                    @forelse ($site->reminders as $reminder)
                        <li class="list-group-item">{{ $reminder->due_at->format('M j, Y g:i A') }} · {{ $reminder->title }}</li>
                    @empty
                        <li class="list-group-item text-muted">No reminders assigned.</li>
                    @endforelse
                </ul>
            </div>
        </section>
    </div>

    <form class="mt-4" action="{{ route('user.site-locations.destroy', $site) }}" method="POST"
        onsubmit="return confirm('Delete this site, its readings, and chemical entries? Reminders linked to it will remain without a site.')">
        @csrf
        @method('DELETE')
        <button class="btn btn-outline-danger" type="submit">Delete site</button>
    </form>
</main>

@include('user.include.footer')
