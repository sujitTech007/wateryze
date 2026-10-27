@include('admin.include.header')

<div class="content-area">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h1 class="page-title mb-1">{{ $title }}</h1>
            <p class="text-muted mb-0">{{ $description }}</p>
        </div>
    </div>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="GET" class="card card-body mb-4">
        <div class="input-group">
            <input class="form-control" type="search" name="search" value="{{ request('search') }}" aria-label="Search records" placeholder="Search by site, customer, or record name">
            <button class="btn btn-primary" type="submit">Search</button>
            @if (request()->filled('search'))
                <a class="btn btn-outline-secondary" href="{{ url()->current() }}">Clear</a>
            @endif
        </div>
    </form>

    <section class="card table-card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr class="table-header-blue">
                        @foreach ($columns as $column)
                            <th>{{ $column }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rows as $row)
                        <tr>
                            @foreach ($row as $value)
                                <td>{{ $value }}</td>
                            @endforeach
                        </tr>
                    @empty
                        <tr><td class="text-center text-muted py-4" colspan="{{ count($columns) }}">No records found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-body">{{ $records->links() }}</div>
    </section>
</div>

@include('admin.include.footer')
