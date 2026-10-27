@include('admin.include.header')

            @if (session('status'))
                <div class="content-area"><div class="alert alert-success">{{ session('status') }}</div></div>
            @endif
            <!-- ========== DASHBOARD CONTENT START ========== -->
            <div class="content-area">
                <!-- ========== SUMMARY CARDS START ========== -->
                <section class="summary-cards mb-4">
                    <div class="row g-4"> <!-- Total Users Card -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div
                                class="card stat-card bg-primary-subtle border border-primary-subtle shadow rounded-3">
                                <div class="card-body">
                                    <div class="stat-icon bg-primary"> <i class="fas fa-users"></i> </div>
                                    <div class="stat-content">
                                        <p class="stat-label">Total Users</p>
                                        <h3 class="stat-value">{{ number_format($userCount) }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Total Water Consumption Card -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card stat-card bg-info-subtle border border-info-subtle shadow rounded-3">
                                <div class="card-body">
                                    <div class="stat-icon bg-info"> <i class="fas fa-droplet"></i> </div>
                                    <div class="stat-content">
                                        <p class="stat-label">Average Discharge Flow This Month (m³/day)</p>
                                        <h3 class="stat-value">{{ number_format($monthDischargeAverage, 2) }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Active Connections Card -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div
                                class="card stat-card bg-success-subtle border border-success-subtle shadow rounded-3">
                                <div class="card-body">
                                    <div class="stat-icon bg-success"> <i class="fas fa-plug"></i> </div>
                                    <div class="stat-content">
                                        <p class="stat-label">Active Connections</p>
                                        <h3 class="stat-value">{{ number_format($activeConnectionCount) }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Today's Usage Card -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div
                                class="card stat-card bg-warning-subtle border border-warning-subtle shadow rounded-3">
                                <div class="card-body">
                                    <div class="stat-icon bg-warning"> <i class="fas fa-chart-pie"></i> </div>
                                    <div class="stat-content">
                                        <p class="stat-label">Today's Sensor Readings</p>
                                        <h3 class="stat-value">{{ number_format($todayReadingCount) }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- ========== SUMMARY CARDS END ========== -->

                <section class="mb-4">
                    <div class="row g-3">
                        @foreach ([['Customer Sites', $siteCount], ['Stored Sensor Readings', $readingCount], ['Administrator Accounts', $adminCount]] as [$label, $count])
                            <div class="col-md-4">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <span class="text-muted">{{ $label }}</span>
                                        <strong class="fs-4">{{ number_format($count) }}</strong>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>

                <section class="mb-4">
                    <div class="d-flex flex-wrap gap-2">
                        <a class="btn btn-outline-primary" href="{{ route('admin.users.index') }}">Manage users</a>
                        <a class="btn btn-outline-primary" href="{{ route('admin.water-usage') }}">Water monitoring</a>
                        <a class="btn btn-outline-primary" href="{{ route('admin.chemical-usage') }}">Chemical usage</a>
                        <a class="btn btn-outline-primary" href="{{ route('admin.compliance') }}">Compliance</a>
                        <a class="btn btn-outline-primary" href="{{ route('admin.reports') }}">Reports</a>
                    </div>
                </section>

                <!-- ========== CHARTS SECTION START ========== -->
                <section class="charts-section mb-4">
                    <div class="row">
                        <!-- Daily Water Usage Chart -->
                        <div class="col-lg-8 mb-3">
                            <div class="card chart-card">
                                <div class="card-header border-0 pb-0">
                                    <h5 class="card-title mb-0">Daily Water Usage</h5>
                                    <small class="text-muted">Last 7 days</small>
                                </div>
                                <div class="card-body">
                                    <canvas id="dailyUsageChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Monthly Comparison Chart -->
                        <div class="col-lg-4 mb-3">
                            <div class="card chart-card">
                                <div class="card-header border-0 pb-0">
                                    <h5 class="card-title mb-0">Monthly Comparison</h5>
                                    <small class="text-muted">This year</small>
                                </div>
                                <div class="card-body">
                                    <canvas id="monthlyComparisonChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- ========== CHARTS SECTION END ========== -->

                <section class="charts-section mb-4">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="card chart-card h-100">
                                <div class="card-header border-0 pb-0">
                                    <h5 class="card-title mb-0">Recent Users</h5>
                                    <small class="text-muted">Latest customer accounts</small>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle mb-0">
                                        <thead><tr><th>Name</th><th>Email</th><th>Joined</th></tr></thead>
                                        <tbody>
                                            @forelse ($recentUsers as $account)
                                                <tr>
                                                    <td><a href="{{ route('admin.users.edit', $account) }}">{{ trim(($account->first_name ?? '').' '.($account->last_name ?? '')) ?: $account->name }}</a></td>
                                                    <td>{{ $account->email }}</td>
                                                    <td>{{ $account->created_at->format('M j, Y') }}</td>
                                                </tr>
                                            @empty
                                                <tr><td colspan="3" class="text-center text-muted py-4">No user accounts yet.</td></tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer bg-white"><a href="{{ route('admin.users.index') }}">Manage users</a></div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="card chart-card h-100">
                                <div class="card-header border-0 pb-0">
                                    <h5 class="card-title mb-0">Recent Sensor Readings</h5>
                                    <small class="text-muted">Latest API-imported measurements</small>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle mb-0">
                                        <thead><tr><th>Site</th><th>Owner</th><th>Recorded</th><th>pH</th><th>TDS</th></tr></thead>
                                        <tbody>
                                            @forelse ($recentReadings as $reading)
                                                <tr>
                                                    <td>{{ $reading->site?->name ?? 'Site removed' }}</td>
                                                    <td>{{ $reading->site?->user?->email ?? '—' }}</td>
                                                    <td>{{ $reading->recorded_at->format('M j, Y H:i') }}</td>
                                                    <td>{{ $reading->ph ?? '—' }}</td>
                                                    <td>{{ $reading->tds ?? '—' }}</td>
                                                </tr>
                                            @empty
                                                <tr><td colspan="5" class="text-center text-muted py-4">No sensor readings have been imported.</td></tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
            <!-- ========== DASHBOARD CONTENT END ========== -->
        </div>
        <!-- ========== MAIN CONTENT END ========== -->
    </div>

    <script>
        const dailyLabels = @json($dailyLabels);
        const dailyValues = @json($dailyUsage);
        const monthlyLabels = @json($monthlyLabels);
        const monthlyValues = @json($monthlyUsage);

        new Chart(document.getElementById('dailyUsageChart'), {
            type: 'line',
            data: {
                labels: dailyLabels,
                datasets: [{ label: 'Discharge flow (m³/day)', data: dailyValues, borderColor: '#0d6efd', backgroundColor: 'rgba(13, 110, 253, .12)', fill: true, tension: .3 }]
            },
            options: { responsive: true, maintainAspectRatio: false }
        });

        new Chart(document.getElementById('monthlyComparisonChart'), {
            type: 'bar',
            data: {
                labels: monthlyLabels,
                datasets: [{ label: 'Discharge flow (m³/day)', data: monthlyValues, backgroundColor: '#20c997' }]
            },
            options: { responsive: true, maintainAspectRatio: false }
        });
    </script>
    @include('admin.include.footer')