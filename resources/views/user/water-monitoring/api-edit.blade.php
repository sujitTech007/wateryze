@include('user.include.header')

<main class="content-area">
    @include('user.partials.dashboard-feedback')

    <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
        <div><h1 class="h3 mb-1">Edit sensor API</h1><p class="text-muted mb-0">{{ $connection->site->name }}</p></div>
        <a class="btn btn-outline-secondary" href="{{ route('user.water-monitoring') }}">Back to monitoring</a>
    </div>

    <form action="{{ route('user.water-monitoring.apis.update', $connection) }}" method="POST" class="card card-body row g-3">
        @csrf
        @method('PUT')
        @include('user.partials.sensor-api-fields', ['connection' => $connection])
        <div class="col-12 d-flex gap-2">
            <button class="btn btn-primary" type="submit">Save API settings</button>
            <a class="btn btn-outline-secondary" href="{{ route('user.water-monitoring') }}">Cancel</a>
        </div>
    </form>
</main>

@include('user.include.footer')
