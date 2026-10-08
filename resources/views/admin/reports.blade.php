 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports - Wateryze Admin Dashboard</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="icon" href="../images/favicon.png" type="image/x-icon">

    <!-- Google Fonts - Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Custom CSS -->
<link rel="stylesheet" href="assets/css/styles.css?v=1.3"></head>
<body>
    <div class="wrapper">
        <!-- ========== SIDEBAR START ========== -->
  <nav class="sidebar">
            <!-- Logo Section -->
            <div class="sidebar-header">
                <div class="logo-wrapper">
                    <a href="index.html" class="logo-link">
                        <img src="assets/images/logo.png" alt="Wateryze Logo"
                            class="logo-img">
                    </a>
                </div>
                <button class="sidebar-toggle d-lg-none" id="sidebarToggle">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Navigation Menu -->
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="index.html" class="nav-link">
                        <i class="fas fa-chart-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./user/users.html" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="water-usage.html" class="nav-link">
                        <i class="fas fa-water"></i>
                        <span>Water Usage</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./chemical-kits/chemical-kits.html" class="nav-link">
                       <i class="fas fa-flask"></i>
                        <span>Chemical Kits</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./compliance/compliance.html" class="nav-link">
                        <i class="fas fa-clipboard-check"></i>
                        <span>Compliance</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./kit-delivery/kit-delivery.html" class="nav-link">
                          <i class="fas fa-box-open"></i>
                        <span>Kit delivery</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./subscription/subscriptions.html" class="nav-link">
                        <i class="fas fa-credit-card"></i>
                        <span>Subscriptions</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="subscription_plan.html" class="nav-link">
                        <i class="fas fa-file-invoice-dollar "></i>
                        <span>Subscriptions Plan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./billing/billing.html" class="nav-link">
                         <i class="fas fa-file-invoice-dollar"></i>
                        <span>Billing</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="reports.html" class="nav-link active">
                        <i class="fa-regular fa-file-lines"></i>
                        <span>Reports</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./partner-lab/partner-labs.html" class="nav-link">
                        <i class="fas fa-flask"></i>
                        <span>Partner labs</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./technician/technician.html" class="nav-link">
                        <i class="fas fa-user-cog"></i>
                        <span>Technician</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="settings.html" class="nav-link">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>

           
        </nav>  
        <!-- ========== SIDEBAR END ========== -->

        <!-- ========== MAIN CONTENT START ========== -->
        <div class="main-content">
            <!-- ========== TOP NAVBAR START ========== -->
            <nav class="navbar">
                <div class="navbar-left">
                    <button class="menu-toggle d-lg-none" id="menuToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h2 class="page-title">Reports</h2>
                </div>

                <div class="navbar-right">
                    <!-- Notifications -->
                   

                    <!-- Admin Profile Dropdown -->
                    <div class="nav-item profile-wrapper">
                        <button class="nav-link profile-btn" id="profileBtn">
                            <img src="assets/images/profile-icon.png" alt="Admin" class="profile-avatar">
                            <span class="profile-name d-none d-sm-inline">Admin</span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                       <div class="profile-dropdown" id="profileDropdown">
                            <a href="profile.html" class="dropdown-item">
                                <i class="fas fa-user"></i> My Profile
                            </a>
                            <a href="settings.html" class="dropdown-item">
                                <i class="fas fa-lock"></i> Change Password
                            </a>
                            <hr class="dropdown-divider">
                            <a href="login.html" class="dropdown-item text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- ========== TOP NAVBAR END ========== -->

            <!-- ========== REPORTS CONTENT START ========== -->
            <div class="content-area">
                <!-- Report Controls -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label class="form-label">Report Type</label>
                                <select class="form-select">
                                    <option selected>Usage Report</option>
                                    <option>User Report</option>
                                    <option>Revenue Report</option>
                                    <option>System Report</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Date Range</label>
                                <select class="form-select">
                                    <option selected>This Month</option>
                                    <option>Last Month</option>
                                    <option>Last 3 Months</option>
                                    <option>This Year</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Format</label>
                                <select class="form-select">
                                    <option selected>View Online</option>
                                    <option>PDF</option>
                                    <option>Excel</option>
                                    <option>CSV</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">&nbsp;</label>
                                <button class="btn btn-primary w-100">
                                    <i class="fas fa-download"></i> Generate Report
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Report Charts -->
                <div class="row mb-4">
                    <div class="col-lg-6 mb-3">
                        <div class="card chart-card">
                            <div class="card-header border-0 pb-0">
                                <h5 class="card-title mb-0">Monthly Revenue Trend</h5>
                                <small class="text-muted">Last 12 months</small>
                            </div>
                            <div class="card-body">
                                <canvas id="revenueChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <div class="card chart-card">
                            <div class="card-header border-0 pb-0">
                                <h5 class="card-title mb-0">User Growth</h5>
                                <small class="text-muted">Quarterly comparison</small>
                            </div>
                            <div class="card-body">
                                <canvas id="userGrowthChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Reports -->
                <div class="card table-card">
                    <div class="card-header border-0">
                        <h5 class="card-title mb-0">Generated Reports</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr class="table-header-blue">
                                    <th>Report Name</th>
                                    <th>Type</th>
                                    <th>Period</th>
                                    <th>Generated On</th>
                                    <th>Generated By</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <i class="fas fa-file-pdf text-danger me-2"></i>
                                        Monthly Usage Report - January 2026
                                    </td>
                                    <td><span class="badge bg-info">Usage Report</span></td>
                                    <td>Jan 1 - Jan 17, 2026</td>
                                    <td>Jan 17, 2026</td>
                                    <td>Admin User</td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center gap-2">
                                        <button class="btn btn-sm btn-outline-primary me-1" title="Download">
                                            <i class="fas fa-download"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fas fa-file-excel text-success me-2"></i>
                                        User Analytics Report - December 2025
                                    </td>
                                    <td><span class="badge bg-primary">User Report</span></td>
                                    <td>Dec 1 - Dec 31, 2025</td>
                                    <td>Dec 31, 2025</td>
                                    <td>Admin User</td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center gap-2">
                                        <button class="btn btn-sm btn-outline-primary me-1" title="Download">
                                            <i class="fas fa-download"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fas fa-file-csv text-info me-2"></i>
                                        Revenue Report - Q4 2025
                                    </td>
                                    <td><span class="badge bg-warning">Revenue Report</span></td>
                                    <td>Oct 1 - Dec 31, 2025</td>
                                    <td>Jan 1, 2026</td>
                                    <td>Admin User</td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center gap-2">
                                        <button class="btn btn-sm btn-outline-primary me-1" title="Download">
                                            <i class="fas fa-download"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fas fa-file-pdf text-danger me-2"></i>
                                        System Performance Report - November 2025
                                    </td>
                                    <td><span class="badge bg-secondary">System Report</span></td>
                                    <td>Nov 1 - Nov 30, 2025</td>
                                    <td>Nov 30, 2025</td>
                                    <td>Admin User</td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center gap-2">
                                        <button class="btn btn-sm btn-outline-primary me-1" title="Download">
                                            <i class="fas fa-download"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- ========== REPORTS CONTENT END ========== -->
        </div>
        <!-- ========== MAIN CONTENT END ========== -->
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript -->
       <script src="assets/js/script.js"></script>
    
    <!-- Additional Chart for Reports Page -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Revenue Chart
            const ctxRevenue = document.getElementById('revenueChart').getContext('2d');
            const revenueData = {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Revenue ($K)',
                    data: [28, 32, 35, 38, 42, 45, 48, 51, 49, 52, 55, 58],
                    borderColor: '#0066cc',
                    backgroundColor: 'rgba(0, 102, 204, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 5,
                    pointBackgroundColor: '#0066cc',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                }]
            };

            const revenueOptions = {
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
                        max: 70,
                        grid: { color: 'rgba(0, 0, 0, 0.05)', drawBorder: false },
                        ticks: {
                            font: { family: "'Poppins', sans-serif", size: 12 },
                            color: '#7f8c8d',
                            stepSize: 10
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

            new Chart(ctxRevenue, { type: 'line', data: revenueData, options: revenueOptions });

            // User Growth Chart
            const ctxGrowth = document.getElementById('userGrowthChart').getContext('2d');
            const growthData = {
                labels: ['Q1 2025', 'Q2 2025', 'Q3 2025', 'Q4 2025', 'Q1 2026'],
                datasets: [{
                    label: 'New Users',
                    data: [145, 178, 212, 245, 287],
                    backgroundColor: 'rgba(0, 188, 212, 0.8)',
                    borderColor: '#00bcd4',
                    borderWidth: 2,
                    borderRadius: 8
                }]
            };

            const growthOptions = {
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
                        max: 350,
                        grid: { color: 'rgba(0, 0, 0, 0.05)', drawBorder: false },
                        ticks: {
                            font: { family: "'Poppins', sans-serif", size: 12 },
                            color: '#7f8c8d',
                            stepSize: 50
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

            new Chart(ctxGrowth, { type: 'bar', data: growthData, options: growthOptions });
        });
    </script>
</body>
</html>
