<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wateryze | Manage accounts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<main class="container py-5">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">← Admin dashboard</a><h1 class="h2 mt-2 mb-1">Manage users</h1><p class="text-muted mb-0">Administrator accounts are stored separately and cannot be changed here.</p></div>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Create user</a>
    </div>
    @if (session('status'))<div class="alert alert-success">{{ session('status') }}</div>@endif
    @if ($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
    <form method="GET" class="mb-3 d-flex gap-2"><input class="form-control" aria-label="Search accounts" name="search" value="{{ request('search') }}" placeholder="Search by name, email, or company"><button class="btn btn-outline-primary" type="submit">Search</button><a class="btn btn-outline-secondary" href="{{ route('admin.users.index') }}">Clear</a></form>
    <section class="card border-0 shadow-sm"><div class="table-responsive"><table class="table table-hover align-middle mb-0"><thead><tr><th>Name</th><th>Email</th><th>Company</th><th>Sites</th><th>Readings</th><th>Joined</th><th>Actions</th></tr></thead><tbody>
        @forelse ($users as $account)
            <tr><td>{{ trim(($account->first_name ?? '').' '.($account->last_name ?? '')) ?: $account->name }}</td><td>{{ $account->email }}</td><td>{{ $account->company ?: '—' }}</td><td>{{ $account->sites_count }}</td><td>{{ $account->water_readings_count }}</td><td>{{ $account->created_at->format('M j, Y') }}</td><td class="text-nowrap"><a class="btn btn-sm btn-outline-primary" href="{{ route('admin.users.edit', $account) }}">Edit</a><form class="d-inline" method="POST" action="{{ route('admin.users.destroy', $account) }}" onsubmit="return confirm('Delete this user and all associated site and dashboard data?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger" type="submit">Delete</button></form></td></tr>
        @empty
            <tr><td colspan="7" class="text-center text-muted py-4">No users found.</td></tr>
        @endforelse
    </tbody></table></div><div class="card-body">{{ $users->links() }}</div></section>
</main>
</body>
</html>
