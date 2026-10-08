<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Notifications - Wateryze</title>



    <!-- Bootstrap 5 CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">



    <!-- Font Awesome Icons -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="icon" href="../images/favicon.png" type="image/x-icon">



    <!-- Google Fonts - Poppins -->

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"

        rel="stylesheet">



    <!-- Custom CSS -->

    <link rel="stylesheet" href="assets/css/style.css?v=1.2">

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

                    <a href="water-monitoring.html" class="nav-link">

                        <i class="fas fa-tint"></i>

                        <span>Water Monitoring</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="./chemical-kits/Chemical-Kit-Usage.html" class="nav-link">

                      <i class="fas fa-flask"></i>

                        <span>Chemical Kit Usage</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="compliance.html" class="nav-link">

                        <i class="fas fa-shield-alt"></i>

                        <span>Compliance

</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="schedule.html" class="nav-link">

                        <i class="fas fa-clock"></i>

                        <span>Schedule Reminder</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="./report/reports.html" class="nav-link">

                        <i class="fa-regular fa-file-lines"></i>

                        <span>Reports</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="site-location.html" class="nav-link">

                        <i class="fas fa-map-marker-alt"></i>

                        <span>Sites & Locations</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="notifications.html" class="nav-link">

                        <i class="fas fa-bell"></i>

                        <span>Notifications</span>

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

                    <h2 class="page-title" id="pageTitle">Notifications</h2>

                </div>



                <div class="navbar-right">

                    <!-- Admin Profile Dropdown -->

                    <div class="nav-item profile-wrapper">

                        <button class="nav-link profile-btn" id="profileBtn">

                            <img src="assets/images/profile-icon.png" alt="William" class="profile-avatar">

                            <span class="profile-name d-none d-sm-inline">William</span>

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

                <!-- Notification Filters -->

                <div class="row mb-4">

                    <div class="col-12">

                        <div class="btn-group flex-wrap" role="group">

                            <button type="button" class="btn btn-primary">All</button>

                            <button type="button" class="btn btn-outline-primary">Alerts</button>

                            <button type="button" class="btn btn-outline-primary">Reminders</button>

                            <button type="button" class="btn btn-outline-primary">System</button>

                            <button type="button" class="btn btn-outline-primary">Read</button>

                            <button type="button" class="btn btn-outline-primary">Unread</button>

                        </div>

                    </div>

                </div>



                <!-- Active Alerts Section -->

                <div class="row mb-5">

                    <div class="col-12">

                        <h5 class="mb-3">

                            <i class="fas fa-exclamation-triangle text-warning"></i> Active Alerts (2)

                        </h5>

                        

                        <div class="row">

                            <!-- Alert 1 -->

                            <div class="col-lg-6 mb-3">

                                <div class="alert alert-warning border-start border-5" role="alert">

                                    <div class="d-flex justify-content-between align-items-start">

                                        <div>

                                            <h6 class="alert-heading">

                                                <i class="fas fa-exclamation-triangle"></i> BOD Level Alert

                                            </h6>

                                            <p class="mb-1">BOD concentration is 12 mg/L (threshold: 10 mg/L)</p>

                                            <small class="text-muted">2 hours ago • Tank B</small>

                                        </div>

                                        <button class="btn btn-sm btn-light">Dismiss</button>

                                    </div>

                                </div>

                            </div>



                            <!-- Alert 2 -->

                            <div class="col-lg-6 mb-3">

                                <div class="alert alert-warning border-start border-5" role="alert">

                                    <div class="d-flex justify-content-between align-items-start">

                                        <div>

                                            <h6 class="alert-heading">

                                                <i class="fas fa-exclamation-triangle"></i> Turbidity Warning

                                            </h6>

                                            <p class="mb-1">Turbidity sensor showing elevated readings at 2.5 NTU</p>

                                            <small class="text-muted">1 hour ago • Tank C</small>

                                        </div>

                                        <button class="btn btn-sm btn-light">Dismiss</button>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>



                <!-- Recent Notifications Section -->

                <div class="row">

                    <div class="col-12">

                        <h5 class="mb-3">

                            <i class="fas fa-bell"></i> Recent Notifications

                        </h5>

                        

                       <!-- Notification 1 -->
<div class="card mb-3 border-0 shadow-sm">
    <div class="card-body py-3">
        <div class="d-flex justify-content-between align-items-start">

            <div>
                <h6 class="card-title mb-1 text-dark">
                    <i class="fas fa-check-circle text-primary me-1"></i>
                    System Online
                </h6>

                <p class="card-text mb-1">
                    All sensors are online and reporting data correctly.
                </p>

                <small class="text-muted">30 minutes ago</small>
            </div>

            <span class="badge bg-light text-primary border">
                Read
            </span>

        </div>
    </div>
</div>


<!-- Notification 2 -->
<div class="card mb-3 border-0 shadow-sm">
    <div class="card-body py-3">
        <div class="d-flex justify-content-between align-items-start">

            <div>
                <h6 class="card-title mb-1 text-dark">
                    <i class="fas fa-clock text-primary me-1"></i>
                    Scheduled Maintenance Reminder
                </h6>

                <p class="card-text mb-1">
                    Sensor calibration scheduled for tomorrow at 10:00 AM
                </p>

                <small class="text-muted">2 hours ago</small>
            </div>

            <span class="badge bg-primary">
                Unread
            </span>

        </div>
    </div>
</div>


<!-- Notification 3 -->
<div class="card mb-3 border-0 shadow-sm">
    <div class="card-body py-3">
        <div class="d-flex justify-content-between align-items-start">

            <div>
                <h6 class="card-title mb-1 text-dark">
                    <i class="fas fa-info-circle text-primary me-1"></i>
                    Report Generated
                </h6>

                <p class="card-text mb-1">
                    Daily compliance report for Jan 16, 2026 is ready for download.
                </p>

                <small class="text-muted">4 hours ago</small>
            </div>

            <span class="badge bg-light text-primary border">
                Read
            </span>

        </div>
    </div>
</div>


<!-- Notification 4 -->
<div class="card mb-3 border-0 shadow-sm">
    <div class="card-body py-3">
        <div class="d-flex justify-content-between align-items-start">

            <div>
                <h6 class="card-title mb-1 text-dark">
                    <i class="fas fa-check-circle text-primary me-1"></i>
                    Compliance Check Passed
                </h6>

                <p class="card-text mb-1">
                    Daily compliance check completed successfully. All parameters within limits.
                </p>

                <small class="text-muted">8 hours ago</small>
            </div>

            <span class="badge bg-light text-primary border">
                Read
            </span>

        </div>
    </div>
</div>


<!-- Notification 5 -->
<div class="card mb-3 border-0 shadow-sm">
    <div class="card-body py-3">
        <div class="d-flex justify-content-between align-items-start">

            <div>
                <h6 class="card-title mb-1 text-dark">
                    <i class="fas fa-exclamation-circle text-primary me-1"></i>
                    Chemical Refill Required
                </h6>

                <p class="card-text mb-1">
                    Treatment chemical inventory is low. Estimated 3 days remaining.
                </p>

                <small class="text-muted">12 hours ago</small>
            </div>

            <span class="badge bg-light text-primary border">
                Read
            </span>

        </div>
    </div>
</div>

                    </div>

                </div>



                <!-- Settings Link -->

                <div class="text-center mt-5">

                    <p class="text-muted mb-3">Configure your notification preferences and alert thresholds</p>

                    <a href="settings.html" class="btn btn-primary">

                        <i class="fas fa-cog"></i> Go to Settings

                    </a>

                </div>

            </div>

        </div>

    </div>



    <!-- Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    

    <!-- Custom JS -->

    <script src="assets/js/script.js"></script>

</body>

</html>

