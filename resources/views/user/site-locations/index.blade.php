@include('user.include.header')

<main class="content-area">
    @include('user.partials.dashboard-feedback')

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h1 class="h3 mb-1">Sites &amp; locations</h1>
            <p class="text-muted mb-0">Manage treatment facilities and their location details.</p>
        </div>
        <a href="{{ route('user.site-locations.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2" aria-hidden="true"></i>Add site
        </a>
    </div>

    <section class="card" aria-labelledby="sites-heading">
        <div class="card-header bg-white"><h2 id="sites-heading" class="h5 mb-0">Your sites</h2></div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr><th scope="col">Site</th><th scope="col">Location</th><th scope="col">Readings</th><th scope="col">Chemical records</th><th scope="col">Actions</th></tr>
                </thead>
                <tbody>
                    @forelse ($sites as $site)
                        <tr>
                            <td><strong>{{ $site->name }}</strong><div class="small text-muted">{{ $site->site_code ?: 'No site code' }}</div></td>
                            <td>{{ $site->city }}, {{ $site->province }}<div class="small text-muted">{{ $site->country }}</div></td>
                            <td>{{ $site->water_readings_count }}</td>
                            <td>{{ $site->chemical_usages_count }}</td>
                            <td class="text-nowrap">
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('user.site-locations.view', $site) }}">View</a>
                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('user.site-locations.edit', $site) }}">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-5">
                                <h3 class="h6">No sites added yet</h3>
                                <p>Sites are used to organize readings, chemical records, and reminders.</p>
                                <a class="btn btn-primary" href="{{ route('user.site-locations.create') }}">Add your first site</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($sites->hasPages())
            <div class="card-body">{{ $sites->links() }}</div>
        @endif
    </section>
</main>

@include('user.include.footer')
