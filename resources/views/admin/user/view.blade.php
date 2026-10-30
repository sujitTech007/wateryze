@include('admin.include.header')

<div class="content-area">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <a href="{{ route('admin.users.index') }}" class="text-decoration-none">← Customer accounts</a>
            <h1 class="page-title mt-2 mb-1">{{ trim(($user->first_name ?? '').' '.($user->last_name ?? '')) ?: $user->name }}</h1>
            <p class="text-muted mb-0">Customer account details</p>
        </div>
        <a class="btn btn-primary" href="{{ route('admin.users.edit', $user) }}" aria-label="Edit customer" title="Edit">
            <i class="fas fa-pen" aria-hidden="true"></i>
        </a>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <section class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white"><h2 class="h5 mb-0">Contact information</h2></div>
                <dl class="row g-0 mb-0">
                    @foreach ([
                        'Email' => $user->email,
                        'Phone' => $user->phone ? trim(($user->country_code ?? '').' '.$user->phone) : null,
                        'Company' => $user->company,
                        'Industry' => $user->industry,
                        'Address' => $user->address,
                        'City' => $user->city,
                        'Province / State' => $user->province,
                        'Postal code' => $user->postal_code,
                        'Country' => $user->country,
                    ] as $label => $value)
                        <div class="col-md-6 p-3 border-bottom">
                            <dt class="text-muted small">{{ $label }}</dt>
                            <dd class="mb-0">{{ $value ?: '—' }}</dd>
                        </div>
                    @endforeach
                </dl>
            </section>
        </div>

        <div class="col-lg-4">
            <section class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white"><h2 class="h5 mb-0">Account overview</h2></div>
                <dl class="card-body mb-0">
                    <dt class="text-muted small">Account type</dt>
                    <dd>Customer</dd>
                    <dt class="text-muted small">Joined</dt>
                    <dd>{{ $user->created_at?->format('M j, Y H:i') ?? '—' }}</dd>
                    <dt class="text-muted small">Email verified</dt>
                    <dd>{{ $user->email_verified_at ? $user->email_verified_at->format('M j, Y') : 'Not verified' }}</dd>
                </dl>
            </section>

            <section class="card border-0 shadow-sm">
                <div class="card-header bg-white"><h2 class="h5 mb-0">Customer data</h2></div>
                <dl class="card-body mb-0">
                    <dt class="text-muted small">Sites</dt><dd>{{ $user->sites_count }}</dd>
                    <dt class="text-muted small">Sensor readings</dt><dd>{{ $user->water_readings_count }}</dd>
                    <dt class="text-muted small">Chemical usage records</dt><dd>{{ $user->chemical_usages_count }}</dd>
                    <dt class="text-muted small">Reminders</dt><dd class="mb-0">{{ $user->reminders_count }}</dd>
                </dl>
            </section>
        </div>
    </div>
</div>

@include('admin.include.footer')
