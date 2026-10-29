@include('user.include.header')

<div class="content-area">
    @include('user.partials.dashboard-feedback')

    @if ($page === 'index')
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
            <div>
                <span class="text-muted">Wastewater management</span>
                <h1 class="h3 mb-1">Welcome to your dashboard, {{ auth()->user()->first_name ?: auth()->user()->name }}</h1>
                <p class="text-muted mb-0">A live view of your saved sites, subscription, and upcoming tasks.</p>
            </div>
            @if ($hasWaterMonitoringAccess)
                <a href="{{ route('user.water-monitoring') }}" class="btn btn-primary"><i class="fas fa-wave-square me-2"></i>View sensor readings</a>
            @else
                <a href="{{ route('user.subscription') }}" class="btn btn-primary"><i class="fas fa-credit-card me-2"></i>Choose a plan</a>
            @endif
        </div>

        <div class="alert alert-info">
            @if (! $hasWaterMonitoringAccess)
                <strong>Water monitoring requires a paid Premium subscription.</strong>
                Choose Premium to enable sensor readings, compliance dashboards, and audit reports.
                <a href="{{ route('user.subscription') }}">View plans and billing</a>.
            @elseif ($latestReading)
                Latest reading received for <strong>{{ $latestReading->site->name }}</strong> on
                {{ $latestReading->recorded_at->format('M j, Y g:i A') }}.
                {{ $complianceStatus === 'Needs attention' ? 'Review the flagged water-quality values below.' : 'Readings are imported from configured sensor API connections.' }}
            @else
                <strong>No water readings yet.</strong> Add a site and connect its sensor API to start building your monitoring and compliance history.
            @endif
        </div>

        <div class="row g-3 mb-4">
            @foreach ([
                ['Sites', $siteCount, 'fa-map-marker-alt', 'user.site-locations'],
                ['Water readings', $readingCount, 'fa-tint', $hasWaterMonitoringAccess ? 'user.water-monitoring' : 'user.subscription'],
                ['Chemical entries this month', $chemicalUsageCount, 'fa-flask', 'user.chemical-kits.index'],
                ['Upcoming tasks', $upcomingReminderCount, 'fa-clock', 'user.schedule'],
            ] as [$label, $value, $icon, $routeName])
                <div class="col-sm-6 col-xl-3">
                    <a href="{{ route($routeName) }}" class="card dashboard-summary-card h-100 text-decoration-none">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div><span class="text-muted d-block">{{ $label }}</span><strong class="fs-3 text-dark">{{ $value }}</strong></div>
                            <span class="dashboard-summary-icon"><i class="fas {{ $icon }}" aria-hidden="true"></i></span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        @if ($hasWaterMonitoringAccess && $complianceIssues !== [])
            <div class="alert alert-warning">
                <strong><i class="fas fa-triangle-exclamation me-2"></i>Water quality needs review.</strong>
                Out-of-range parameters in the latest reading: {{ implode(', ', $complianceIssues) }}.
                Limits are account settings, not a substitute for your regulator's requirements.
            </div>
        @endif

        <div class="row g-4">
            @if ($hasWaterMonitoringAccess)
            <section class="col-lg-7">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between align-items-center bg-white">
                        <h2 class="h5 mb-0">Recent water readings</h2>
                        <a href="{{ route('user.water-monitoring') }}">View history</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead><tr><th>Date</th><th>Site</th><th>pH</th><th>TDS</th><th>Compliance</th></tr></thead>
                            <tbody>
                                @forelse ($recentReadings as $reading)
                                    <tr>
                                        <td>{{ $reading->recorded_at->format('M j, Y') }}</td>
                                        <td>{{ $reading->site->name }}</td>
                                        <td>{{ $reading->ph ?? '—' }}</td>
                                        <td>{{ $reading->tds ?? '—' }}</td>
                                        <td>                                        {{ $reading->complianceStatus($thresholds) }}</td>
                                    </tr>
                                @empty
                                    <tr><td colspan="5" class="text-center text-muted py-4">Your saved readings will appear here.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            @else
            <section class="col-lg-7">
                <div class="card card-body h-100">
                    <h2 class="h5">Unlock water monitoring</h2>
                    <p class="text-muted">Sensor readings, compliance summaries, and audit reports are available with Premium.</p>
                    <a class="btn btn-outline-primary align-self-start" href="{{ route('user.subscription') }}">Compare plans</a>
                </div>
            </section>
            @endif
            <section class="col-lg-5">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between align-items-center bg-white">
                        <h2 class="h5 mb-0">Upcoming reminders</h2>
                        <a href="{{ route('user.schedule') }}">Manage</a>
                    </div>
                    <div class="card-body">
                        @forelse ($upcomingReminders as $reminder)
                            <div class="border-bottom py-3">
                                <strong>{{ $reminder->title }}</strong>
                                <div class="small text-muted">{{ $reminder->due_at->format('M j, Y g:i A') }}@if ($reminder->site) · {{ $reminder->site->name }}@endif</div>
                            </div>
                        @empty
                            <p class="text-muted mb-0">You have no upcoming reminders.</p>
                        @endforelse
                    </div>
                </div>
            </section>
        </div>

    @elseif ($page === 'compliance')
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
            <div><h1 class="h3 mb-1">Compliance overview</h1><p class="text-muted mb-0">Compare saved measurements with the alert limits configured in your account.</p></div>
            <a class="btn btn-outline-primary" href="{{ route('user.settings') }}">Configure limits</a>
        </div>
        <div class="alert alert-warning">These dashboard alerts use your configured account thresholds. Confirm applicable standards with your regulator; this page does not certify regulatory compliance.</div>
        <div class="row g-3 mb-4">
            <div class="col-sm-6"><div class="card card-body"><span class="text-muted">Average site score</span><strong class="fs-3">{{ $averageScore === null ? 'Not assessed' : $averageScore.'%' }}</strong></div></div>
            <div class="col-sm-6"><div class="card card-body"><span class="text-muted">Out-of-range measurements</span><strong class="fs-3">{{ $alertCount }}</strong></div></div>
        </div>
        @forelse ($siteChecks as $item)
            <section class="card mb-3">
                <div class="card-header bg-white d-flex justify-content-between gap-3"><strong>{{ $item['site']->name }}</strong><span>{{ $item['score'] === null ? 'No configured readings' : $item['score'].'%' }}</span></div>
                <div class="table-responsive"><table class="table table-hover align-middle mb-0">
                    <thead><tr><th>Parameter</th><th>Reading</th><th>Configured limits</th><th>Status</th></tr></thead>
                    <tbody>
                        @forelse ($item['checks'] as $check)
                            <tr>
                                <td>{{ $check['name'] }}</td>
                                <td>{{ $check['value'] ?? '—' }} {{ $check['unit'] }}</td>
                                <td>
                                    @if (! $check['configured'])
                                        Not configured
                                    @else
                                        {{ $check['min'] !== null ? 'Min '.$check['min'] : '' }}{{ $check['min'] !== null && $check['max'] !== null ? ' · ' : '' }}{{ $check['max'] !== null ? 'Max '.$check['max'] : '' }} {{ $check['unit'] }}
                                    @endif
                                </td>
                                <td>{{ $check['in_range'] === null ? 'Not assessed' : ($check['in_range'] ? 'Within configured range' : 'Outside configured range') }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-muted text-center">No readings have been recorded for this site.</td></tr>
                        @endforelse
                    </tbody>
                </table></div>
            </section>
        @empty
            <div class="card card-body text-center text-muted py-5">Add a <a href="{{ route('user.site-locations') }}">site</a> and save water readings to see your compliance checks.</div>
        @endforelse

    @elseif ($page === 'audit')
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
            <div><h1 class="h3 mb-1">Compliance audit report</h1><p class="text-muted mb-0">An exportable audit trail of your recorded water readings and configured thresholds.</p></div>
            <a class="btn btn-primary" href="{{ route('user.audit-report.export') }}"><i class="fas fa-download me-2"></i>Download audit CSV</a>
        </div>
        <div class="alert alert-info">Current overall score: <strong>{{ $auditScore === null ? 'Not assessed' : $auditScore.'%' }}</strong>. These account-configured comparison results are not a regulatory certification.</div>
        <section class="card"><div class="card-header bg-white"><h2 class="h5 mb-0">Recorded assessments</h2></div>
            <div class="table-responsive"><table class="table table-hover align-middle mb-0">
                <thead><tr><th>Recorded</th><th>Site</th><th>Assessment</th><th>pH</th><th>TDS</th><th>Turbidity</th><th></th></tr></thead>
                <tbody>
                    @forelse ($readings as $reading)
                        <tr><td>{{ $reading->recorded_at->format('M j, Y g:i A') }}</td><td>{{ $reading->site->name }}</td><td>{{ $reading->complianceStatus($thresholds) }}</td><td>{{ $reading->ph ?? '—' }}</td><td>{{ $reading->tds ?? '—' }}</td><td>{{ $reading->turbidity ?? '—' }}</td><td><a href="{{ route('user.reports.view', $reading) }}">Details</a></td></tr>
                    @empty
                        <tr><td colspan="7" class="text-muted text-center py-4">No audit records yet. Connect a sensor API to import readings.</td></tr>
                    @endforelse
                </tbody>
            </table></div>
            <div class="card-body">{{ $readings->links() }}</div>
        </section>

    @elseif ($page === 'notifications')
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4"><div><h1 class="h3 mb-1">Notifications</h1><p class="text-muted mb-0">{{ $unreadCount }} unread · {{ $alertCount }} active alerts</p></div>
            @if ($unreadCount > 0)<form action="{{ route('user.notifications.read-all') }}" method="POST">@csrf @method('PUT')<button class="btn btn-outline-primary" type="submit">Mark all read</button></form>@endif
        </div>
        <form method="GET" class="card card-body row g-3 flex-row align-items-end mb-3">
            <div class="col-md-4"><label class="form-label" for="notification_type">Type</label><select class="form-select" id="notification_type" name="type"><option value="">All notifications</option>@foreach (['alert', 'reminder', 'system'] as $type)<option value="{{ $type }}" @selected(request('type') === $type)>{{ ucfirst($type) }}</option>@endforeach</select></div>
            <div class="col-md-4"><label class="form-label" for="notification_read">Read status</label><select class="form-select" id="notification_read" name="read"><option value="">All</option><option value="no" @selected(request('read') === 'no')>Unread</option><option value="yes" @selected(request('read') === 'yes')>Read</option></select></div>
            <div class="col-md-4 d-flex gap-2"><button class="btn btn-outline-primary">Filter</button><a class="btn btn-outline-secondary" href="{{ route('user.notifications') }}">Clear</a></div>
        </form>
        @forelse ($notifications as $notification)
            <article class="card mb-3 {{ $notification->read_at ? '' : 'border-primary' }}"><div class="card-body d-flex flex-wrap justify-content-between gap-3">
                <div><div><span class="badge text-bg-{{ $notification->type === 'alert' ? 'warning' : ($notification->type === 'reminder' ? 'info' : 'secondary') }}">{{ ucfirst($notification->type) }}</span> <strong>{{ $notification->title }}</strong></div><p class="mb-1 mt-2">{{ $notification->message }}</p><small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small></div>
                <div class="d-flex align-items-center gap-2">
                    @if (! $notification->read_at)<form action="{{ route('user.notifications.read', $notification) }}" method="POST">@csrf @method('PUT')<button class="btn btn-sm btn-outline-primary" type="submit">Mark read</button></form>@else<span class="badge text-bg-light">Read</span>@endif
                    <form action="{{ route('user.notifications.dismiss', $notification) }}" method="POST">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-secondary" type="submit">Dismiss</button></form>
                </div>
            </div></article>
        @empty
            <div class="card card-body text-center text-muted py-5">No notifications match these filters.</div>
        @endforelse
        {{ $notifications->links() }}

    @elseif ($page === 'profile')
        <div class="mb-4"><h1 class="h3 mb-1">Your profile</h1><p class="text-muted mb-0">Update the contact and company information saved to your account.</p></div>
        <form action="{{ route('user.profile.update') }}" method="POST" class="card">
            @csrf
            @method('PUT')
            <div class="card-body row g-3">
                <div class="col-md-6"><label class="form-label" for="first_name">First name <span class="text-danger">*</span></label><input id="first_name" class="form-control" name="first_name" value="{{ old('first_name', $profile->first_name) }}" autocomplete="given-name" required></div>
                <div class="col-md-6"><label class="form-label" for="last_name">Last name <span class="text-danger">*</span></label><input id="last_name" class="form-control" name="last_name" value="{{ old('last_name', $profile->last_name) }}" autocomplete="family-name" required></div>
                <div class="col-md-6"><label class="form-label" for="email">Email <span class="text-danger">*</span></label><input id="email" class="form-control" type="email" name="email" value="{{ old('email', $profile->email) }}" autocomplete="email" required></div>
                <div class="col-md-6"><label class="form-label" for="phone">Phone</label><input id="phone" class="form-control" type="tel" name="phone" value="{{ old('phone', $profile->phone) }}" autocomplete="tel-national"></div>
                <div class="col-md-3"><label class="form-label" for="country_code">Phone country code</label><input id="country_code" class="form-control" name="country_code" value="{{ old('country_code', $profile->country_code) }}" placeholder="+1"></div>
                <div class="col-md-3"><label class="form-label" for="phone_country">Phone country (ISO)</label><input id="phone_country" class="form-control" name="phone_country" value="{{ old('phone_country', $profile->phone_country) }}" maxlength="2" placeholder="ca"></div>
                <div class="col-md-6"><label class="form-label" for="company">Company</label><input id="company" class="form-control" name="company" value="{{ old('company', $profile->company) }}"></div>
                <div class="col-md-6"><label class="form-label" for="industry">Industry</label><input id="industry" class="form-control" name="industry" value="{{ old('industry', $profile->industry) }}"></div>
                <div class="col-md-6"><label class="form-label" for="address">Address</label><input id="address" class="form-control" name="address" value="{{ old('address', $profile->address) }}" autocomplete="street-address"></div>
                <div class="col-md-6"><label class="form-label" for="city">City</label><input id="city" class="form-control" name="city" value="{{ old('city', $profile->city) }}" autocomplete="address-level2"></div>
                <div class="col-md-4"><label class="form-label" for="province">Province/state</label><input id="province" class="form-control" name="province" value="{{ old('province', $profile->province) }}" autocomplete="address-level1"></div>
                <div class="col-md-4"><label class="form-label" for="postal_code">Postal/ZIP code</label><input id="postal_code" class="form-control" name="postal_code" value="{{ old('postal_code', $profile->postal_code) }}" autocomplete="postal-code"></div>
                <div class="col-md-4"><label class="form-label" for="country">Country</label><input id="country" class="form-control" name="country" value="{{ old('country', $profile->country) }}" autocomplete="country-name"></div>
            </div>
            <div class="card-footer bg-white"><button class="btn btn-primary" type="submit">Save profile</button></div>
        </form>

    @elseif ($page === 'settings')
        <div class="mb-4"><h1 class="h3 mb-1">Dashboard settings</h1><p class="text-muted mb-0">Choose in-app alert preferences and the comparison thresholds used on your dashboard.</p></div>
        <div class="alert alert-warning">Set limits according to the requirements that apply to your site. These configurable limits are not legal advice or an automatic compliance certification.</div>
        
        <form action="{{ route('user.settings.password') }}" method="POST" class="card">
            @csrf
            @method('PUT')
            <div class="card-body"><h2 class="h5">Change password</h2><p class="text-muted">Confirm your current password before choosing a new one.</p>
                <div class="row g-3">
                    <div class="col-md-4"><label class="form-label" for="current_password">Current password</label><input class="form-control" id="current_password" type="password" name="current_password" autocomplete="current-password" required></div>
                    <div class="col-md-4"><label class="form-label" for="password">New password</label><input class="form-control" id="password" type="password" name="password" autocomplete="new-password" required></div>
                    <div class="col-md-4"><label class="form-label" for="password_confirmation">Confirm new password</label><input class="form-control" id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password" required></div>
                </div>
            </div>
            <div class="card-footer bg-white"><button class="btn btn-outline-primary" type="submit">Update password</button></div>
        </form>
    @endif
</div>
@include('user.include.footer')
