@include('user.include.header')

<main class="content-area">
    @include('user.partials.dashboard-feedback')

    <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
        <div><h1 class="h3 mb-1">Record chemical use</h1><p class="text-muted mb-0">Save the chemical, quantity, date, and purpose for a site.</p></div>
        <a class="btn btn-outline-secondary" href="{{ route('user.chemical-kits.index') }}">Back to usage</a>
    </div>

    @if ($sites->isEmpty())
        <div class="alert alert-info">Create a site before recording chemical usage. <a href="{{ route('user.site-locations.create') }}">Add a site</a>.</div>
    @else
        <div class="card card-body">
            @include('user.partials.chemical-form', ['usage' => null])
        </div>
    @endif
</main>

@include('user.include.footer')
