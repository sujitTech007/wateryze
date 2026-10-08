@include('admin.include.header')
            <!-- ========== WATER USAGE CONTENT START ========== -->
            <div class="content-area">
                <div class="mb-4">
                    <button class="menu-toggle d-lg-none" id="menuToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h2 class="page-title">Water Usage</h2>
                </div>
                <!-- Summary Cards -->
                <section class="summary-cards mb-4">
                    <div class="row g-4"> <!-- Total Usage -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div
                                class="card stat-card bg-primary-subtle border border-primary-subtle shadow rounded-3">
                                <div class="card-body">
                                    <div class="stat-icon bg-primary"> <i class="fas fa-droplet"></i> </div>
                                    <div class="stat-content">
                                        <p class="stat-label">Total Usage (Month)</p>
                                        <h3 class="stat-value">45.2K L</h3>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Average Daily Usage -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card stat-card bg-info-subtle border border-info-subtle shadow rounded-3">
                                <div class="card-body">
                                    <div class="stat-icon bg-info"> <i class="fas fa-chart-line"></i> </div>
                                    <div class="stat-content">
                                        <p class="stat-label">Average Daily Usage</p>
                                        <h3 class="stat-value">2.8K L</h3>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Peak Usage -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div
                                class="card stat-card bg-warning-subtle border border-warning-subtle shadow rounded-3">
                                <div class="card-body">
                                    <div class="stat-icon bg-warning"> <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                    <div class="stat-content">
                                        <p class="stat-label">Peak Usage</p>
                                        <h3 class="stat-value">3.5K L</h3>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Conservation Rate -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div
                                class="card stat-card bg-success-subtle border border-success-subtle shadow rounded-3">
                                <div class="card-body">
                                    <div class="stat-icon bg-success"> <i class="fas fa-leaf"></i> </div>
                                    <div class="stat-content">
                                        <p class="stat-label">Conservation Rate</p>
                                        <h3 class="stat-value">15%</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Charts -->
                <!-- <section class="charts-section mb-4">
                    <div class="row">
                        <div class="col-lg-8 mb-3">
                            <div class="card chart-card">
                                <div class="card-header border-0 pb-0">
                                    <h5 class="card-title mb-0">Usage Trend (Last 30 Days)</h5>
                                    <small class="text-muted">Daily consumption analysis</small>
                                </div>
                                <div class="card-body">
                                    <canvas id="usageTrendChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mb-3">
                            <div class="card chart-card">
                                <div class="card-header border-0 pb-0">
                                    <h5 class="card-title mb-0">Usage by Type</h5>
                                    <small class="text-muted">Breakdown</small>
                                </div>
                                <div class="card-body">
                                    <canvas id="usageTypeChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> -->

                <!-- Usage Records Table -->
                <div class="card table-card">
                    <div class="card-header border-0">
                        <h5 class="card-title mb-0">Recent Usage Records</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr class="table-header-blue">
                                    <th>User</th>
                                    <th>Volume (L)</th>
                                    <th>Type</th>
                                    <th>Date & Time</th>
                                    <th>Duration (min)</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John Doe</td>
                                    <td>125</td>
                                    <td><span class="badge bg-primary">Household</span></td>
                                    <td>Jan 17, 10:30 AM</td>
                                    <td>15</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>
                                <tr>
                                    <td>Sarah Smith</td>
                                    <td>89</td>
                                    <td><span class="badge bg-info">Garden</span></td>
                                    <td>Jan 17, 9:15 AM</td>
                                    <td>22</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>
                                <tr>
                                    <td>Mike Johnson</td>
                                    <td>340</td>
                                    <td><span class="badge bg-warning">Commercial</span></td>
                                    <td>Jan 17, 8:45 AM</td>
                                    <td>45</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>
                                <tr>
                                    <td>Emily Davis</td>
                                    <td>156</td>
                                    <td><span class="badge bg-primary">Household</span></td>
                                    <td>Jan 17, 7:20 AM</td>
                                    <td>18</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>
                                <tr>
                                    <td>Robert Brown</td>
                                    <td>210</td>
                                    <td><span class="badge bg-info">Garden</span></td>
                                    <td>Jan 17, 6:50 AM</td>
                                    <td>28</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- ========== WATER USAGE CONTENT END ========== -->
        </div>
        <!-- ========== MAIN CONTENT END ========== -->
    </div>

   @include('admin.include.footer')

    <!-- Additional Chart for Water Usage Page -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Usage Trend Chart
            const ctxTrend = document.getElementById('usageTrendChart').getContext('2d');
            const trendData = {
                labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7', 'Day 8', 'Day 9', 'Day 10'],
                datasets: [{
                    label: 'Daily Usage (L)',
                    data: [2400, 2210, 2290, 2000, 2181, 2500, 2800, 2650, 2400, 2900],
                    borderColor: '#00bcd4',
                    backgroundColor: 'rgba(0, 188, 212, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 5,
                    pointBackgroundColor: '#00bcd4',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                }]
            };

            const trendOptions = {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            font: { family: "'Poppins', sans-serif", size: 14, weight: '500' },
                            color: '#2c3e50',
                            padding: 15,
                            usePointStyle: true
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 3500,
                        grid: { color: 'rgba(0, 0, 0, 0.05)', drawBorder: false },
                        ticks: {
                            font: { family: "'Poppins', sans-serif", size: 12 },
                            color: '#7f8c8d',
                            stepSize: 500
                        }
                    },
                    x: {
                        grid: { display: false, drawBorder: false },
                        ticks: {
                            font: { family: "'Poppins', sans-serif", size: 12 },
                            color: '#7f8c8d'
                        }
                    }
                }
            };

            new Chart(ctxTrend, { type: 'line', data: trendData, options: trendOptions });

            // Usage by Type Pie Chart
            const ctxType = document.getElementById('usageTypeChart').getContext('2d');
            const typeData = {
                labels: ['Household', 'Commercial', 'Garden', 'Industrial'],
                datasets: [{
                    data: [35, 25, 20, 20],
                    backgroundColor: [
                        'rgba(0, 102, 204, 0.8)',
                        'rgba(255, 193, 7, 0.8)',
                        'rgba(76, 175, 80, 0.8)',
                        'rgba(244, 67, 54, 0.8)'
                    ],
                    borderColor: [
                        '#0066cc',
                        '#ffc107',
                        '#4caf50',
                        '#f44336'
                    ],
                    borderWidth: 2
                }]
            };

            const typeOptions = {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: {
                            font: { family: "'Poppins', sans-serif", size: 12, weight: '500' },
                            color: '#2c3e50',
                            padding: 15,
                            usePointStyle: true
                        }
                    }
                }
            };

            new Chart(ctxType, { type: 'doughnut', data: typeData, options: typeOptions });
        });
    </script>
