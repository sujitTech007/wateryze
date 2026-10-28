@include('admin.include.header')


<div class="content-area">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h1 class="page-title mb-1">Customer accounts</h1>
            <p class="text-muted mb-0">Manage customer accounts. Administrator accounts are kept separately.</p>
        </div>
        <a class="btn btn-primary" href="{{ route('admin.users.create') }}">Create customer</a>
    </div>

    @if (session('status'))
        <div class="alert alert-success" role="status">{{ session('status') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form method="GET" action="{{ route('admin.users.index') }}" class="card card-body mb-4">
        <div class="input-group">
            <input class="form-control" type="search" name="search" value="{{ request('search') }}" placeholder="Search name, email, phone, or company" aria-label="Search customer accounts">
            <button class="btn btn-primary" type="submit">Search</button>
            @if (request()->filled('search'))
                <a class="btn btn-outline-secondary" href="{{ route('admin.users.index') }}">Clear</a>
            @endif
        </div>
    </form>

    <section class="card table-card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr class="table-header-blue">
                        <th>Customer</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Company</th>
                        <th>Sites</th>
                        <th>Readings</th>
                        <th>Joined</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ trim(($user->first_name ?? '').' '.($user->last_name ?? '')) ?: $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone ? trim(($user->country_code ?? '').' '.$user->phone) : '—' }}</td>
                            <td>{{ $user->company ?: '—' }}</td>
                            <td>{{ $user->sites_count }}</td>
                            <td>{{ $user->water_readings_count }}</td>
                            <td>{{ $user->created_at?->format('M j, Y') ?? '—' }}</td>
                            <td class="text-nowrap">
                                <a class="btn btn-sm btn-outline-info" href="{{ route('admin.users.show', $user) }}">View</a>
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.users.edit', $user) }}">Edit</a>
                                <form class="d-inline" method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Delete this customer account and its associated data?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center text-muted py-4" colspan="8">
                                {{ request()->filled('search') ? 'No matching customer accounts found.' : 'No customer accounts have been created.' }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-body">{{ $users->links() }}</div>
    </section>
</div>

@include('admin.include.footer')
