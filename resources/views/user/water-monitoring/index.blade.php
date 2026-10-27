@include('user.include.header')

<main class="content-area">
    @include('user.partials.dashboard-feedback')

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h1 class="h3 mb-1">Water monitoring</h1>
            <p class="text-muted mb-0">Review readings imported from your connected sensor APIs.</p>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <a class="btn btn-outline-primary" href="{{ route('user.water-monitoring.export', request()->query()) }}">
                <i class="fas fa-download me-2" aria-hidden="true"></i>Export CSV
            </a>
            <a class="btn btn-primary" href="{{ route('user.water-monitoring.apis.create') }}">
                <i class="fas fa-plug me-2" aria-hidden="true"></i>Connect sensor API
            </a>
        </div>
    </div>

    @if ($sites->isEmpty())
        <div class="alert alert-info">
            Add a site before connecting a sensor API.
            <a href="{{ route('user.site-locations.create') }}">Add a site</a>.
        </div>
    @endif

    <section class="card mb-4" aria-labelledby="sensor-apis-heading">
        <div class="card-header bg-white d-flex flex-wrap justify-content-between align-items-center gap-2">
            <h2 id="sensor-apis-heading" class="h5 mb-0">Sensor API connections</h2>
            @if ($sites->isNotEmpty())
                <a class="btn btn-sm btn-outline-primary" href="{{ route('user.water-monitoring.apis.create') }}">Add connection</a>
            @endif
        </div>
        <div class="card-body">
            @forelse ($apiConnections as $connection)
                <article class="border rounded p-3 mb-3">
                    <div class="d-flex flex-wrap justify-content-between gap-3">
                        <div>
                            <h3 class="h6 mb-1">{{ $connection->site->name }}</h3>
                            <p class="text-muted small mb-1">
                                Parameters: {{ collect($connection->parameter_map)->keys()->map(fn ($parameter) => strtoupper(str_replace('_', ' ', $parameter)))->join(', ') }}
                            </p>
                            <p class="text-muted small mb-0">
                                @if ($connection->last_synced_at)
                                    Last fetched {{ $connection->last_synced_at->format('M j, Y g:i A') }}
                                @else
                                    Not fetched yet
                                @endif
                            </p>
                            @if ($connection->last_sync_error)
                                <p class="text-danger small mb-0 mt-2">{{ $connection->last_sync_error }}</p>
                            @endif
                        </div>
                        <div class="d-flex flex-wrap align-items-start gap-2">
                            <form action="{{ route('user.water-monitoring.apis.sync', $connection) }}" method="POST">
                                @csrf
                                <button class="btn btn-sm btn-primary" type="submit">Fetch latest data</button>
                            </form>
                            <a class="btn btn-sm btn-outline-secondary" href="{{ route('user.water-monitoring.apis.edit', $connection) }}">Edit</a>
                            <form action="{{ route('user.water-monitoring.apis.destroy', $connection) }}" method="POST" onsubmit="return confirm('Disconnect this API? Previously imported readings will remain.')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" type="submit">Disconnect</button>
                            </form>
                        </div>
                    </div>
                </article>
            @empty
                <p class="text-muted mb-0">No sensor APIs connected. Connect one to import readings; manual water readings are disabled.</p>
            @endforelse
        </div>
    </section>

    <form method="GET" action="{{ route('user.water-monitoring') }}" class="card card-body row g-3 flex-row align-items-end mb-3">
        <div class="col-md-3">
            <label class="form-label" for="filter_site">Site</label>
            <select class="form-select" id="filter_site" name="site_id">
                <option value="">All sites</option>
                @foreach ($sites as $site)
                    <option value="{{ $site->id }}" @selected((string) request('site_id') === (string) $site->id)>{{ $site->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label" for="filter_from">From</label>
            <input class="form-control" id="filter_from" type="date" name="from" value="{{ request('from') }}">
        </div>
        <div class="col-md-3">
            <label class="form-label" for="filter_to">To</label>
            <input class="form-control" id="filter_to" type="date" name="to" value="{{ request('to') }}">
        </div>
        <div class="col-md-3 d-flex gap-2">
            <button class="btn btn-outline-primary" type="submit">Filter</button>
            <a class="btn btn-outline-secondary" href="{{ route('user.water-monitoring') }}">Clear</a>
        </div>
    </form>

    <section class="card" aria-labelledby="reading-history-heading">
        <div class="card-header bg-white"><h2 id="reading-history-heading" class="h5 mb-0">Reading history</h2></div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr><th scope="col">Recorded</th><th scope="col">Site</th><th scope="col">pH</th><th scope="col">TDS</th><th scope="col">Compliance</th><th scope="col">View</th></tr>
                </thead>
                <tbody>
                    @forelse ($readings as $reading)
                        <tr>
                            <td>{{ $reading->recorded_at->format('M j, Y g:i A') }}</td>
                            <td>{{ $reading->site->name }}</td>
                            <td>{{ $reading->ph ?? '—' }}</td>
                            <td>{{ $reading->tds === null ? '—' : $reading->tds.' ppm' }}</td>
                            <td>{{ $reading->complianceStatus($thresholds) }}</td>
                            <td><a class="btn btn-sm btn-outline-primary" href="{{ route('user.water-monitoring.view', $reading) }}">View</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-5">
                                <h3 class="h6">No readings found</h3>
                                <p>Fetch a sensor reading or adjust the filters.</p>
                                @if ($sites->isNotEmpty())
                                    <a class="btn btn-primary" href="{{ route('user.water-monitoring.apis.create') }}">Connect a sensor API</a>
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($readings->hasPages())
            <div class="card-body">{{ $readings->links() }}</div>
        @endif
    </section>
</main>

@include('user.include.footer')
