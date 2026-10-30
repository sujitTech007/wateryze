@include('admin.include.header')

<div class="content-area">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h1 class="page-title mb-1">{{ $module['title'] }}</h1>
            <p class="text-muted mb-0">Manage stored {{ strtolower($module['title']) }} records.</p>
        </div>
        @if ($module['key'] !== 'subscriptions')
            <a class="btn btn-primary" href="{{ route($module['route'].'.create') }}">Create {{ strtolower($module['singular']) }}</a>
        @endif
    </div>

    @if (session('status'))<div class="alert alert-success">{{ session('status') }}</div>@endif
    @if ($errors->any())<div class="alert alert-danger">{{ $errors->first() }}</div>@endif

    <form method="GET" class="card card-body mb-4">
        <div class="input-group">
            <input class="form-control" type="search" name="search" value="{{ request('search') }}" aria-label="Search {{ strtolower($module['title']) }}" placeholder="Search records">
            <button class="btn btn-primary" type="submit">Search</button>
            @if (request()->filled('search'))<a class="btn btn-outline-secondary" href="{{ url()->current() }}">Clear</a>@endif
        </div>
    </form>

    <section class="card table-card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead><tr class="table-header-blue">@foreach ($module['columns'] as $column)<th>{{ collect($module['fields'])->firstWhere('name', $column)['label'] ?? \Illuminate\Support\Str::headline($column) }}</th>@endforeach<th>Actions</th></tr></thead>
                <tbody>
                    @forelse ($records as $record)
                        <tr>
                            @foreach ($module['columns'] as $column)
                                @php
                                    $value = match ($column) {
                                        'user_id' => $record->user?->email ?? 'Customer removed',
                                        'subscription_plan_id' => $record->plan?->name ?? 'Plan removed',
                                        'subscription_id' => $record->subscription?->id ? '#'.$record->subscription->id : '—',
                                        default => data_get($record, $column),
                                    };
                                    if ($value instanceof \Carbon\CarbonInterface) {
                                        $value = $value->format(in_array($column, ['delivery_date', 'invoice_date', 'due_date', 'start_date', 'end_date', 'renewal_date', 'hire_date', 'date_of_birth'], true) ? 'M j, Y' : 'M j, Y H:i');
                                    } elseif (is_array($value)) {
                                        $value = implode(', ', $value);
                                    } elseif (is_bool($value)) {
                                        $value = $value ? 'Yes' : 'No';
                                    }
                                    if ($column === 'features') {
                                        $value = count($record->features ?? []);
                                        $value .= $value === 1 ? ' feature' : ' features';
                                    }
                                @endphp
                                <td>{{ $value ?? '—' }}</td>
                            @endforeach
                            <td class="text-nowrap">
                                <a class="btn btn-sm btn-outline-info" href="{{ route($module['route'].'.show', $record) }}" aria-label="View {{ strtolower($module['singular']) }}" title="View">
                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                </a>
                                <a class="btn btn-sm btn-outline-primary" href="{{ route($module['route'].'.edit', $record) }}" aria-label="Edit {{ strtolower($module['singular']) }}" title="Edit">
                                    <i class="fas fa-pen" aria-hidden="true"></i>
                                </a>
                                <form class="d-inline" method="POST" action="{{ route($module['route'].'.destroy', $record) }}" data-confirm="Delete this {{ strtolower($module['singular']) }}?" data-confirm-title="Are you sure you want to delete this {{ strtolower($module['singular']) }}?">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" type="submit" aria-label="Delete {{ strtolower($module['singular']) }}" title="Delete">
                                        <i class="fas fa-trash-can" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td class="text-center text-muted py-4" colspan="{{ count($module['columns']) + 1 }}">No {{ strtolower($module['title']) }} records found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-body">{{ $records->links() }}</div>
    </section>
</div>

@include('admin.include.footer')
