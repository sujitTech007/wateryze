<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wateryze | Admin dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">
<main class="container py-5">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <span class="badge text-bg-dark mb-2">Administrator</span>
            <h1 class="h2 mb-1">Account &amp; platform overview</h1>
            <p class="text-muted mb-0">Manage Wateryze customer accounts. Administrator credentials are stored separately.</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.users.index') }}" class="btn btn-primary"><i class="fas fa-users me-2"></i>Manage accounts</a>
            <form method="POST" action="{{ route('admin.logout') }}">@csrf<button class="btn btn-outline-secondary" type="submit">Log out</button></form>
        </div>
    </div>
    @if (session('status'))<div class="alert alert-success">{{ session('status') }}</div>@endif
    <div class="row g-3 mb-4">
        @foreach ([['Users', $userCount, 'fa-user'], ['Admins', $adminCount, 'fa-user-shield'], ['Sites', $siteCount, 'fa-location-dot'], ['Water readings', $readingCount, 'fa-tint'], ['Chemical records', $chemicalUsageCount, 'fa-flask']] as [$label, $count, $icon])
            <div class="col-sm-6 col-lg"><div class="card h-100 border-0 shadow-sm"><div class="card-body"><span class="text-muted d-block">{{ $label }}</span><span class="h3"><i class="fas {{ $icon }} me-2 text-primary"></i>{{ $count }}</span></div></div></div>
        @endforeach
    </div>
    <section class="card border-0 shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center"><h2 class="h5 mb-0">Recently created users</h2><a href="{{ route('admin.users.index') }}">View all users</a></div>
        <div class="table-responsive"><table class="table align-middle mb-0"><thead><tr><th>Name</th><th>Email</th><th>Joined</th><th></th></tr></thead><tbody>
            @forelse ($recentUsers as $account)
                <tr><td>{{ trim(($account->first_name ?? '').' '.($account->last_name ?? '')) ?: $account->name }}</td><td>{{ $account->email }}</td><td>{{ $account->created_at->format('M j, Y') }}</td><td><a class="btn btn-sm btn-outline-primary" href="{{ route('admin.users.edit', $account) }}" aria-label="Edit customer" title="Edit"><i class="fas fa-pen" aria-hidden="true"></i></a></td></tr>
            @empty
                <tr><td colspan="4" class="text-center text-muted py-4">No users have been created.</td></tr>
            @endforelse
        </tbody></table></div>
    </section>
</main>
</body>
</html>
