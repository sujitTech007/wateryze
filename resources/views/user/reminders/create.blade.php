@include('user.include.header')

<main class="content-area">
    @include('user.partials.dashboard-feedback')

    <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
        <div><h1 class="h3 mb-1">Create reminder</h1><p class="text-muted mb-0">Schedule a maintenance or compliance task.</p></div>
        <a href="{{ route('user.schedule') }}" class="btn btn-outline-secondary">Back to reminders</a>
    </div>

    @if ($sites->isEmpty())
        <div class="alert alert-info">Create a site before assigning a reminder. <a href="{{ route('user.site-locations.create') }}">Add a site</a>.</div>
    @endif

    <form action="{{ route('user.schedule.store') }}" method="POST" class="card card-body row g-3">
        @csrf
        @include('user.partials.reminder-fields', ['reminder' => null])
        <div class="col-12 d-flex gap-2">
            <button type="submit" class="btn btn-primary">Schedule reminder</button>
            <a class="btn btn-outline-secondary" href="{{ route('user.schedule') }}">Cancel</a>
        </div>
    </form>
</main>

@include('user.include.footer')
