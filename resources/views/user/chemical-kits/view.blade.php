@include('user.include.header')

<main class="content-area">
    @include('user.partials.dashboard-feedback')

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div><h1 class="h3 mb-1">{{ $usage->chemical_name }}</h1><p class="text-muted mb-0">Chemical usage details</p></div>
        <div class="d-flex gap-2">
            <a class="btn btn-outline-secondary" href="{{ route('user.chemical-kits.index') }}">Back to usage</a>
            <a class="btn btn-primary" href="{{ route('user.chemical-kits.edit', $usage) }}">Edit usage</a>
        </div>
    </div>

    <section class="card">
        <div class="card-header bg-white"><h2 class="h5 mb-0">Usage information</h2></div>
        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-sm-4">Site</dt><dd class="col-sm-8">{{ $usage->site->name }}</dd>
                <dt class="col-sm-4">Chemical</dt><dd class="col-sm-8">{{ $usage->chemical_name }}</dd>
                <dt class="col-sm-4">Date used</dt><dd class="col-sm-8">{{ $usage->usage_date->format('M j, Y') }}</dd>
                <dt class="col-sm-4">Quantity</dt><dd class="col-sm-8">{{ $usage->quantity }} {{ $usage->unit }}</dd>
                <dt class="col-sm-4">Purpose</dt><dd class="col-sm-8">{{ $usage->purpose }}</dd>
                <dt class="col-sm-4">Notes</dt><dd class="col-sm-8">{{ $usage->notes ?: 'No notes provided.' }}</dd>
            </dl>
        </div>
    </section>

    <form class="mt-4" action="{{ route('user.chemical-kits.destroy', $usage) }}" method="POST" onsubmit="return confirm('Delete this chemical usage record?')">
        @csrf
        @method('DELETE')
        <button class="btn btn-outline-danger" type="submit">Delete usage record</button>
    </form>
</main>

@include('user.include.footer')
