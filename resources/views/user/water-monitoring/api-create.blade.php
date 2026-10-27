@include('user.include.header')

<main class="content-area">
    @include('user.partials.dashboard-feedback')

    <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
        <div><h1 class="h3 mb-1">Connect a sensor API</h1><p class="text-muted mb-0">Map the parameters provided by this JSON endpoint. A site can have multiple API connections.</p></div>
        <a class="btn btn-outline-secondary" href="{{ route('user.water-monitoring') }}">Back to monitoring</a>
    </div>

    @if (! $hasSites)
        <div class="alert alert-info">Create a site before connecting its sensor API. <a href="{{ route('user.site-locations.create') }}">Add a site</a>.</div>
    @else
        <div class="alert alert-warning">For safety, only public HTTPS API hosts are supported. Local-network devices, private IP addresses, and redirects are blocked. API responses must be JSON.</div>
        <form action="{{ route('user.water-monitoring.apis.store') }}" method="POST" class="card card-body row g-3">
            @csrf
            @include('user.partials.sensor-api-fields', ['connection' => null])
            <div class="col-12 d-flex gap-2">
                <button class="btn btn-primary" type="submit">Save API connection</button>
                <a class="btn btn-outline-secondary" href="{{ route('user.water-monitoring') }}">Cancel</a>
            </div>
        </form>
    @endif
</main>

@include('user.include.footer')
