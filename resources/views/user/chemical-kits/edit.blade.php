@include('user.include.header')

<main class="content-area">
    @include('user.partials.dashboard-feedback')

    <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
        <div><h1 class="h3 mb-1">Edit chemical usage</h1><p class="text-muted mb-0">{{ $usage->chemical_name }} · {{ $usage->site->name }}</p></div>
        <a class="btn btn-outline-secondary" href="{{ route('user.chemical-kits.view', $usage) }}">Cancel</a>
    </div>

    @if ($sites->isEmpty())
        <div class="alert alert-info">No sites are available for this usage entry. <a href="{{ route('user.site-locations.create') }}">Add a site</a>.</div>
    @else
        <div class="card card-body">
            @include('user.partials.chemical-form', ['usage' => $usage])
        </div>
    @endif
</main>

@include('user.include.footer')
