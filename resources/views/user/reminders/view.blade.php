@include('user.include.header')

<main class="content-area">
    @include('user.partials.dashboard-feedback')

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div><h1 class="h3 mb-1">{{ $reminder->title }}</h1><p class="text-muted mb-0">Reminder details</p></div>
        <div class="d-flex gap-2">
            <a href="{{ route('user.schedule') }}" class="btn btn-outline-secondary">Back to reminders</a>
            <a href="{{ route('user.schedule.edit', $reminder) }}" class="btn btn-primary" aria-label="Edit reminder" title="Edit">
                <i class="fas fa-pen" aria-hidden="true"></i>
            </a>
        </div>
    </div>

    <section class="card">
        <div class="card-header bg-white"><h2 class="h5 mb-0">Task information</h2></div>
        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-sm-3">Site</dt><dd class="col-sm-9">{{ $reminder->site?->name ?? 'All sites' }}</dd>
                <dt class="col-sm-3">Due date</dt><dd class="col-sm-9">{{ $reminder->due_at->format('M j, Y g:i A') }}</dd>
                <dt class="col-sm-3">Status</dt><dd class="col-sm-9">{{ ucfirst($reminder->status) }}</dd>
                <dt class="col-sm-3">Description</dt><dd class="col-sm-9">{{ $reminder->description ?: 'No description provided.' }}</dd>
                @if ($reminder->completed_at)
                    <dt class="col-sm-3">Completed</dt><dd class="col-sm-9">{{ $reminder->completed_at->format('M j, Y g:i A') }}</dd>
                @endif
            </dl>
        </div>
        @if ($reminder->status === 'scheduled')
            <div class="card-footer bg-white">
                <form action="{{ route('user.schedule.update', $reminder) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="title" value="{{ $reminder->title }}">
                    <input type="hidden" name="description" value="{{ $reminder->description }}">
                    <input type="hidden" name="due_at" value="{{ $reminder->due_at->format('Y-m-d\TH:i') }}">
                    <input type="hidden" name="site_id" value="{{ $reminder->site_id }}">
                    <input type="hidden" name="status" value="completed">
                    <button class="btn btn-outline-success" type="submit">Mark complete</button>
                </form>
            </div>
        @endif
    </section>

    <form class="mt-4" action="{{ route('user.schedule.destroy', $reminder) }}" method="POST"
        data-confirm="Delete this reminder?" data-confirm-title="Are you sure you want to delete this reminder?">
        @csrf
        @method('DELETE')
        <button class="btn btn-outline-danger" type="submit" aria-label="Delete reminder" title="Delete reminder">
            <i class="fas fa-trash-can" aria-hidden="true"></i>
        </button>
    </form>
</main>

@include('user.include.footer')
