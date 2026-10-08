@include('admin.include.header')

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
                                        <h3 class="stat-value">1,245</h3>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Total Water Consumption Card -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card stat-card bg-info-subtle border border-info-subtle shadow rounded-3">
                                <div class="card-body">
                                    <div class="stat-icon bg-info"> <i class="fas fa-droplet"></i> </div>
                                    <div class="stat-content">
                                        <p class="stat-label">Water Consumption</p>
                                        <h3 class="stat-value">45.2K L</h3>
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
                                        <h3 class="stat-value">987</h3>
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
                                        <p class="stat-label">Today's Usage</p>
                                        <h3 class="stat-value">2.8K L</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- ========== SUMMARY CARDS END ========== -->

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

            </div>
            <!-- ========== DASHBOARD CONTENT END ========== -->
        </div>
        <!-- ========== MAIN CONTENT END ========== -->
    </div>

   @include('admin.include.footer')