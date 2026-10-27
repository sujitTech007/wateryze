@include('user.include.header')

<main class="content-area">
    @include('user.partials.dashboard-feedback')

    <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
        <div><h1 class="h3 mb-1">Edit reminder</h1><p class="text-muted mb-0">{{ $reminder->title }}</p></div>
        <a href="{{ route('user.schedule.view', $reminder) }}" class="btn btn-outline-secondary">Cancel</a>
    </div>

    <form action="{{ route('user.schedule.update', $reminder) }}" method="POST" class="card card-body row g-3">
        @csrf
        @method('PUT')
        @include('user.partials.reminder-fields', ['reminder' => $reminder])
        <div class="col-12 d-flex gap-2">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <a class="btn btn-outline-secondary" href="{{ route('user.schedule.view', $reminder) }}">Cancel</a>
        </div>
    </form>
</main>

@include('user.include.footer')
