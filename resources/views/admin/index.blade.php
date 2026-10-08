<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wateryze - Admin Dashboard</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="../images/favicon.png" type="image/x-icon">

    <!-- Google Fonts - Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/styles.css?v=1.3">
</head>

<body>
    <div class="wrapper">
        <!-- ========== SIDEBAR START ========== -->
        <nav class="sidebar">
            <!-- Logo Section -->
            <div class="sidebar-header">
                <div class="logo-wrapper">
                    <a href="index.html" class="logo-link">
                        <img src="assets/images/logo.png" alt="Wateryze Logo" class="logo-img">
                    </a>
                </div>
                <button class="sidebar-toggle d-lg-none" id="sidebarToggle">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Navigation Menu -->
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="index.html" class="nav-link active">
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
                    <a href="reports.html" class="nav-link">
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


        </nav> <!-- ========== SIDEBAR END ========== -->

        <!-- ========== MAIN CONTENT START ========== -->
        <div class="main-content">
            <!-- ========== TOP NAVBAR START ========== -->
            <nav class="navbar">
                <div class="navbar-left">
                    <button class="menu-toggle d-lg-none" id="menuToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h2 class="page-title" id="pageTitle">Dashboard</h2>
                </div>

                <div class="navbar-right">


                    <!-- Admin Profile Dropdown -->
                    <div class="nav-item profile-wrapper">
                        <button class="nav-link profile-btn" id="profileBtn">
                            <img src="assets/images/profile-icon.png" alt="Admin" class="profile-avatar">
                            <span class="profile-name d-none d-sm-inline">Admin</span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <!-- Profile Dropdown Menu -->
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="assets/js/script.js"></script>
</body>

</html>