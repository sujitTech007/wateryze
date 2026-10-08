<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule - Wateryze</title>

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
                    <a href="schedule.html" class="nav-link active">
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
            <nav class="navbar justify-content-end">


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
                <div class="mb-4">
                    <button class="menu-toggle d-lg-none" id="menuToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h2 class="page-title" id="pageTitle">Schedule Reminder</h2>
                </div>
                <!-- SUMMARY CARDS -->
                <section class="summary-cards mb-4">
                    <div class="row g-4"> <!-- Upcoming Tasks -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div
                                class="card stat-card bg-success-subtle border border-success-subtle shadow rounded-3">
                                <div class="card-body">
                                    <div class="stat-icon bg-success"> <i class="fas fa-clock"></i> </div>
                                    <div class="stat-content">
                                        <p class="stat-label">Upcoming Tasks</p>
                                        <h3 class="stat-value">3</h3>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Overdue -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div
                                class="card stat-card bg-danger-subtle border border-danger-subtle shadow rounded-3">
                                <div class="card-body">
                                    <div class="stat-icon bg-danger"> <i class="fas fa-hourglass-end"></i> </div>
                                    <div class="stat-content">
                                        <p class="stat-label">Overdue</p>
                                        <h3 class="stat-value">0</h3>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Completed -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div
                                class="card stat-card bg-primary-subtle border border-primary-subtle shadow rounded-3">
                                <div class="card-body">
                                    <div class="stat-icon bg-primary"> <i class="fas fa-check"></i> </div>
                                    <div class="stat-content">
                                        <p class="stat-label">Completed</p>
                                        <h3 class="stat-value">12</h3>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Next Task -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card stat-card bg-info-subtle border border-info-subtle shadow rounded-3">
                                <div class="card-body">
                                    <div class="stat-icon bg-info"> <i class="fas fa-calendar-check"></i> </div>
                                    <div class="stat-content">
                                        <p class="stat-label">Next Task</p>
                                        <h5 class="stat-value">Jan 18</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- UPCOMING SCHEDULE -->
                <section class="mb-4">
                    <div class="card chart-card">
                        <div class="card-header border-0 pb-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title mb-0">Upcoming Schedule</h5>
                                </div>
                                <!-- <button class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add Task</button> -->
                            </div>
                        </div>
                        <div class="card-body">
                            <div style="display: grid; gap: 15px;">
                                <div
                                    style="background: #f8f9fa; padding: 20px; border-radius: 12px; border-left: 4px solid #0066cc;">
                                    <div
                                        style="display: flex; justify-content: space-between; align-items: flex-start;">
                                        <div>
                                            <h6 style="margin: 0 0 8px 0; color: #333; font-weight: 600;">
                                                <i class="fas fa-microchip"></i> Sensor Calibration
                                            </h6>
                                            <p style="margin: 0; font-size: 13px; color: #666;">Calibrate all water
                                                quality sensors to ensure accurate readings.</p>
                                            <p style="margin: 5px 0 0 0; font-size: 12px; color: #999;"><i
                                                    class="fas fa-calendar"></i> Tomorrow at 10:00 AM</p>
                                        </div>
                                        <span class="badge bg-info">Scheduled</span>
                                    </div>
                                </div>

                                <div
                                    style="background: #f8f9fa; padding: 20px; border-radius: 12px; border-left: 4px solid #28a745;">
                                    <div
                                        style="display: flex; justify-content: space-between; align-items: flex-start;">
                                        <div>
                                            <h6 style="margin: 0 0 8px 0; color: #333; font-weight: 600;">
                                                <i class="fas fa-flask"></i> Chemical Inventory Check
                                            </h6>
                                            <p style="margin: 0; font-size: 13px; color: #666;">Check treatment chemical
                                                levels and place orders if needed.</p>
                                            <p style="margin: 5px 0 0 0; font-size: 12px; color: #999;"><i
                                                    class="fas fa-calendar"></i> Jan 19, 2026</p>
                                        </div>
                                        <span class="badge bg-success">In Progress</span>
                                    </div>
                                </div>

                                <div
                                    style="background: #f8f9fa; padding: 20px; border-radius: 12px; border-left: 4px solid #7c3aed;">
                                    <div
                                        style="display: flex; justify-content: space-between; align-items: flex-start;">
                                        <div>
                                            <h6 style="margin: 0 0 8px 0; color: #333; font-weight: 600;">
                                                <i class="fas fa-tools"></i> Equipment Maintenance
                                            </h6>
                                            <p style="margin: 0; font-size: 13px; color: #666;">Preventive maintenance
                                                for pumps and filters.</p>
                                            <p style="margin: 5px 0 0 0; font-size: 12px; color: #999;"><i
                                                    class="fas fa-calendar"></i> Jan 20, 2026</p>
                                        </div>
                                        <span class="badge bg-info">Scheduled</span>
                                    </div>
                                </div>

                                <div
                                    style="background: #f8f9fa; padding: 20px; border-radius: 12px; border-left: 4px solid #ffc107;">
                                    <div
                                        style="display: flex; justify-content: space-between; align-items: flex-start;">
                                        <div>
                                            <h6 style="margin: 0 0 8px 0; color: #333; font-weight: 600;">
                                                <i class="fas fa-file-chart-line"></i> Monthly Compliance Report
                                            </h6>
                                            <p style="margin: 0; font-size: 13px; color: #666;">Generate and submit
                                                monthly compliance report to authorities.</p>
                                            <p style="margin: 5px 0 0 0; font-size: 12px; color: #999;"><i
                                                    class="fas fa-calendar"></i> Jan 25, 2026</p>
                                        </div>
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    </div>
                                </div>

                                <div
                                    style="background: #f8f9fa; padding: 20px; border-radius: 12px; border-left: 4px solid #28a745;">
                                    <div
                                        style="display: flex; justify-content: space-between; align-items: flex-start;">
                                        <div>
                                            <h6 style="margin: 0 0 8px 0; color: #333; font-weight: 600;">
                                                <i class="fas fa-check-double"></i> Quality Audit
                                            </h6>
                                            <p style="margin: 0; font-size: 13px; color: #666;">Quarterly system audit
                                                and quality assurance check.</p>
                                            <p style="margin: 5px 0 0 0; font-size: 12px; color: #999;"><i
                                                    class="fas fa-calendar"></i> Feb 15, 2026</p>
                                        </div>
                                        <span class="badge bg-success">Scheduled</span>
                                    </div>
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="assets/js/script.js"></script>
</body>

</html>
<!-- <p style="margin: 0; font-size: 13px; color: #666;">Check treatment chemical levels and place orders if needed.</p>
                                    <p style="margin: 5px 0 0 0; font-size: 12px; color: #999;"><i class="fas fa-calendar"></i> Jan 19, 2026</p>
                                </div>
                                <span class="table-badge badge-success">In Progress</span>
                            </div>
                        </div>

                        <div style="background: #f8f9fa; padding: 20px; border-radius: 12px; border-left: 4px solid #7c3aed;">
                            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                                <div>
                                    <h4 style="margin: 0 0 8px 0; color: #333; font-weight: 600;">
                                        <i class="fas fa-tools"></i> Equipment Maintenance
                                    </h4>
                                    <p style="margin: 0; font-size: 13px; color: #666;">Preventive maintenance for pumps and filters.</p>
                                    <p style="margin: 5px 0 0 0; font-size: 12px; color: #999;"><i class="fas fa-calendar"></i> Jan 20, 2026</p>
                                </div>
                                <span class="table-badge badge-info">Scheduled</span>
                            </div>
                        </div>

                        <div style="background: #f8f9fa; padding: 20px; border-radius: 12px; border-left: 4px solid #ffc107;">
                            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                                <div>
                                    <h4 style="margin: 0 0 8px 0; color: #333; font-weight: 600;">
                                        <i class="fas fa-file-chart-line"></i> Monthly Compliance Report
                                    </h4>
                                    <p style="margin: 0; font-size: 13px; color: #666;">Generate and submit monthly compliance report to authorities.</p>
                                    <p style="margin: 5px 0 0 0; font-size: 12px; color: #999;"><i class="fas fa-calendar"></i> Jan 25, 2026</p>
                                </div>
                                <span class="table-badge badge-warning">Pending</span>
                            </div>
                        </div>

                        <div style="background: #f8f9fa; padding: 20px; border-radius: 12px; border-left: 4px solid #28a745;">
                            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                                <div>
                                    <h4 style="margin: 0 0 8px 0; color: #333; font-weight: 600;">
                                        <i class="fas fa-check-double"></i> Quality Audit
                                    </h4>
                                    <p style="margin: 0; font-size: 13px; color: #666;">Quarterly system audit and quality assurance check.</p>
                                    <p style="margin: 5px 0 0 0; font-size: 12px; color: #999;"><i class="fas fa-calendar"></i> Feb 15, 2026</p>
                                </div>
                                <span class="table-badge badge-success">Scheduled</span>
                            </div>
                        </div>
                    </div>
                </div> -->

<!-- COMPLETED SCHEDULE -->
<div class="section" style="    margin-left: 20%; margin-right: 0;">
    <div class="section-header">
        <h2 class="section-title">Completed Tasks (12)</h2>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Scheduled Date</th>
                    <th>Completed Date</th>
                    <th>Assigned To</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><i class="fas fa-microchip"></i> Sensor Calibration</td>
                    <td>Jan 10, 2026</td>
                    <td>Jan 10, 2026</td>
                    <td>William Johnson</td>
                    <td><span class="table-badge badge-success">Completed</span></td>
                </tr>
                <tr>
                    <td><i class="fas fa-flask"></i> Chemical Refill</td>
                    <td>Jan 7, 2026</td>
                    <td>Jan 7, 2026</td>
                    <td>System</td>
                    <td><span class="table-badge badge-success">Completed</span></td>
                </tr>
                <tr>
                    <td><i class="fas fa-tools"></i> Equipment Maintenance</td>
                    <td>Dec 28, 2025</td>
                    <td>Dec 28, 2025</td>
                    <td>Admin</td>
                    <td><span class="table-badge badge-success">Completed</span></td>
                </tr>
                <tr>
                    <td><i class="fas fa-file-chart-line"></i> Monthly Report</td>
                    <td>Jan 1, 2026</td>
                    <td>Jan 1, 2026</td>
                    <td>System Auto</td>
                    <td><span class="table-badge badge-success">Completed</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</div>

<script>
    document.querySelector('.date-picker').value = new Date().toLocaleDateString();
</script>
</body>

</html>