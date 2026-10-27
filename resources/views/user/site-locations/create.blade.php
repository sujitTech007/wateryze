@include('user.include.header')

<main class="content-area">
    @include('user.partials.dashboard-feedback')

    <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
        <div><h1 class="h3 mb-1">Add a site</h1><p class="text-muted mb-0">Enter the facility and location details.</p></div>
        <a href="{{ route('user.site-locations') }}" class="btn btn-outline-secondary">Back to sites</a>
    </div>

    <datalist id="saved-addresses">
        @foreach ($addresses as $address)
            <option value="{{ $address->address }}, {{ $address->city }}, {{ $address->province }}, {{ $address->country }}"></option>
        @endforeach
    </datalist>

    <form action="{{ route('user.site-locations.store') }}" method="POST" class="card card-body row g-3">
        @csrf
        @include('user.partials.site-fields', ['site' => null])
        <div class="col-12 d-flex gap-2">
            <button class="btn btn-primary" type="submit">Save site</button>
            <a class="btn btn-outline-secondary" href="{{ route('user.site-locations') }}">Cancel</a>
        </div>
    </form>
</main>

@include('user.include.footer')
