@include('user.include.header')

<main class="content-area">
    @include('user.partials.dashboard-feedback')

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div><h1 class="h3 mb-1">Chemical usage</h1><p class="text-muted mb-0">Review treatment chemical additions recorded at your sites.</p></div>
        <a class="btn btn-primary" href="{{ route('user.chemical-kits.create') }}"><i class="fas fa-plus me-2" aria-hidden="true"></i>Record chemical use</a>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-6"><div class="card card-body"><span class="text-muted">Chemicals used this month</span><strong class="fs-3">{{ $monthUsageCount }}</strong></div></div>
        <div class="col-md-6"><div class="card card-body"><span class="text-muted">Different chemicals recorded</span><strong class="fs-3">{{ $chemicalCount }}</strong></div></div>
    </div>

    <section class="card" aria-labelledby="chemical-history-heading">
        <div class="card-header bg-white"><h2 id="chemical-history-heading" class="h5 mb-0">Usage history</h2></div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead><tr><th scope="col">Chemical</th><th scope="col">Site</th><th scope="col">Date used</th><th scope="col">Quantity</th><th scope="col">Purpose</th><th scope="col">Actions</th></tr></thead>
                <tbody>
                    @forelse ($usages as $usage)
                        <tr>
                            <td>{{ $usage->chemical_name }}</td>
                            <td>{{ $usage->site->name }}</td>
                            <td>{{ $usage->usage_date->format('M j, Y') }}</td>
                            <td>{{ $usage->quantity }} {{ $usage->unit }}</td>
                            <td>{{ $usage->purpose }}</td>
                            <td class="text-nowrap">
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('user.chemical-kits.view', $usage) }}" aria-label="View chemical usage" title="View">
                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                </a>
                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('user.chemical-kits.edit', $usage) }}" aria-label="Edit chemical usage" title="Edit">
                                    <i class="fas fa-pen" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-muted py-5">No chemical usage recorded yet. <a href="{{ route('user.chemical-kits.create') }}">Record chemical use</a>.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($usages->hasPages())
            <div class="card-body">{{ $usages->links() }}</div>
        @endif
    </section>
</main>

@include('user.include.footer')
