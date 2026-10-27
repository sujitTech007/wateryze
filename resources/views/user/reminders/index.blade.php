@include('user.include.header')

<main class="content-area">
    @include('user.partials.dashboard-feedback')

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div><h1 class="h3 mb-1">Schedule &amp; reminders</h1><p class="text-muted mb-0">Manage maintenance and compliance tasks.</p></div>
        <a class="btn btn-primary" href="{{ route('user.schedule.create') }}"><i class="fas fa-plus me-2" aria-hidden="true"></i>Add reminder</a>
    </div>

    <div class="row g-3 mb-4">
        @foreach ([['Upcoming', $upcomingCount], ['Overdue', $overdueCount], ['Completed', $completedCount]] as [$label, $count])
            <div class="col-md-4"><div class="card card-body"><span class="text-muted">{{ $label }}</span><strong class="fs-3">{{ $count }}</strong></div></div>
        @endforeach
    </div>

    <form method="GET" action="{{ route('user.schedule') }}" class="d-flex flex-wrap gap-2 mb-3">
        <label class="visually-hidden" for="reminder-status">Filter by status</label>
        <select id="reminder-status" class="form-select w-auto" name="status">
            <option value="">All statuses</option>
            @foreach (['scheduled', 'completed', 'cancelled'] as $status)
                <option value="{{ $status }}" @selected(request('status') === $status)>{{ ucfirst($status) }}</option>
            @endforeach
        </select>
        <button class="btn btn-outline-primary" type="submit">Filter</button>
        @if (request()->filled('status'))
            <a class="btn btn-outline-secondary" href="{{ route('user.schedule') }}">Clear</a>
        @endif
    </form>

    <section class="card" aria-labelledby="reminders-heading">
        <div class="card-header bg-white"><h2 id="reminders-heading" class="h5 mb-0">Your reminders</h2></div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead><tr><th scope="col">Task</th><th scope="col">Site</th><th scope="col">Due</th><th scope="col">Status</th><th scope="col">Actions</th></tr></thead>
                <tbody>
                    @forelse ($reminders as $reminder)
                        <tr>
                            <td>{{ $reminder->title }}</td>
                            <td>{{ $reminder->site?->name ?? 'All sites' }}</td>
                            <td>{{ $reminder->due_at->format('M j, Y g:i A') }}</td>
                            <td>{{ ucfirst($reminder->status) }}</td>
                            <td class="text-nowrap">
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('user.schedule.view', $reminder) }}">View</a>
                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('user.schedule.edit', $reminder) }}">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted py-5">No reminders match this filter. <a href="{{ route('user.schedule.create') }}">Create a reminder</a>.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($reminders->hasPages())
            <div class="card-body">{{ $reminders->links() }}</div>
        @endif
    </section>
</main>

@include('user.include.footer')
