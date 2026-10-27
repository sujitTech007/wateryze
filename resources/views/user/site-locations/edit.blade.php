@include('user.include.header')

<main class="content-area">
    @include('user.partials.dashboard-feedback')

    <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
        <div><h1 class="h3 mb-1">Edit {{ $site->name }}</h1><p class="text-muted mb-0">Update this facility's details.</p></div>
        <a href="{{ route('user.site-locations.view', $site) }}" class="btn btn-outline-secondary">Cancel</a>
    </div>

    <datalist id="saved-addresses">
        @foreach ($addresses as $address)
            <option value="{{ $address->address }}, {{ $address->city }}, {{ $address->province }}, {{ $address->country }}"></option>
        @endforeach
    </datalist>

    <form action="{{ route('user.site-locations.update', $site) }}" method="POST" class="card card-body row g-3">
        @csrf
        @method('PUT')
        @include('user.partials.site-fields', ['site' => $site])
        <div class="col-12 d-flex gap-2">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <a class="btn btn-outline-secondary" href="{{ route('user.site-locations.view', $site) }}">Cancel</a>
        </div>
    </form>
</main>

@include('user.include.footer')
