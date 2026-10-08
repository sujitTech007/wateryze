<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wateryze</title>

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

                <!-- PAGE HEADER -->
                <div class="d-flex flex-column flex-lg-row
                justify-content-between
                align-items-lg-center
                gap-3
                mb-4">

                    <div>
                        <h2 class="mb-1 fs-4">Compliance</h2>

                        <p class="text-muted mb-0">
                            Monitor your wastewater treatment compliance and regulatory status.
                        </p>
                    </div>


                    <div class="d-flex gap-2">

                        <button type="button" class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-download me-2"></i>
                            Export Report
                        </button>

                        <a href="view-audit-report.html" type="button" class="btn btn-primary btn-sm">
                            <i class="fas fa-file-alt me-2"></i>
                            View Audit Report
                        </a>

                    </div>

                </div>



                <!-- COMPLIANCE OVERVIEW -->
                <div class="row g-4 mb-4"> <!-- COMPLIANCE SCORE -->
                    <div class="col-md-6 col-xl-3">
                        <div class="chart-card bg-success-subtle border border-success-subtle shadow rounded-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted mb-1" style="font-size: 10px;"> Compliance Score </p>
                                    <h2 class="mb-0"> 92% </h2>
                                </div>
                                <div class="fs-2 text-success"> <i class="fas fa-shield-alt"></i> </div>
                            </div>
                            <div class="mt-2">
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 92%;"
                                        aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"> </div>
                                </div>
                            </div> <small class="text-success d-block mt-2" style="font-size: 10px;"> <i
                                    class="fas fa-arrow-up me-1"></i> 4% improvement from last month </small>
                        </div>
                    </div> <!-- CURRENT STATUS -->
                    <div class="col-md-6 col-xl-3">
                        <div class="chart-card bg-success-subtle border border-success-subtle shadow rounded-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted mb-1" style="font-size: 10px;"> Current Status </p>
                                    <h4 class="mb-0 text-success"> Compliant </h4>
                                </div>
                                <div class="fs-2 text-success"> <i class="fas fa-check-circle"></i> </div>
                            </div> <small class="text-muted d-block mt-3" style="font-size: 10px;"> Your treatment
                                system is currently meeting compliance requirements. </small>
                        </div>
                    </div> <!-- ACTIVE ALERTS -->
                    <div class="col-md-6 col-xl-3">
                        <div class="chart-card bg-warning-subtle border border-warning-subtle shadow rounded-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted mb-1" style="font-size: 10px;"> Active Alerts </p>
                                    <h2 class="mb-0"> 1 </h2>
                                </div>
                                <div class="fs-2 text-warning"> <i class="fas fa-exclamation-triangle"></i> </div>
                            </div> <small class="text-warning d-block mt-3" style="font-size: 10px;"> <i
                                    class="fas fa-info-circle me-1"></i> One parameter requires attention </small>
                        </div>
                    </div> <!-- LAST AUDIT -->
                    <div class="col-md-6 col-xl-3">
                        <div class="chart-card bg-primary-subtle border border-primary-subtle shadow rounded-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted mb-1" style="font-size: 10px;"> Last Audit </p>
                                    <h5 class="mb-0"> Sep 01, 2026 </h5>
                                </div>
                                <div class="fs-2 text-primary"> <i class="fas fa-clipboard-check"></i> </div>
                            </div> <small class="text-muted d-block mt-3" style="font-size: 10px;"> Next review
                                scheduled soon </small>
                        </div>
                    </div>
                </div>



                <!-- COMPLIANCE STATUS -->
                <div class="row g-4 mb-4">


                    <!-- REQUIREMENTS -->
                    <div class="col-lg-8">

                        <div class="chart-card h-100">

                            <div class="d-flex justify-content-between
                            align-items-center mb-4">

                                <div>
                                    <h4 class="mb-1">
                                        Compliance Requirements
                                    </h4>

                                    <p class="text-muted mb-0">
                                        Current status of monitored wastewater parameters.
                                    </p>
                                </div>


                                <span class="badge bg-success px-3 py-2">
                                    5 / 6 Compliant
                                </span>

                            </div>



                            <!-- PH -->
                            <div class="border rounded p-3 mb-3">

                                <div class="d-flex justify-content-between
                                align-items-center mb-2">

                                    <div>
                                        <h6 class="mb-1">
                                            pH Level
                                        </h6>

                                        <small class="text-muted">
                                            Required range: 6.5 – 8.5
                                        </small>
                                    </div>


                                    <span class="badge bg-success">
                                        Compliant
                                    </span>

                                </div>


                                <div class="d-flex justify-content-between">

                                    <span>
                                        Current: <strong>7.1</strong>
                                    </span>

                                    <span class="text-success">
                                        <i class="fas fa-check-circle"></i>
                                    </span>

                                </div>

                            </div>



                            <!-- TDS -->
                            <div class="border rounded p-3 mb-3">

                                <div class="d-flex justify-content-between
                                align-items-center mb-2">

                                    <div>
                                        <h6 class="mb-1">
                                            TDS
                                        </h6>

                                        <small class="text-muted">
                                            Required limit: Below 500 ppm
                                        </small>
                                    </div>


                                    <span class="badge bg-success">
                                        Compliant
                                    </span>

                                </div>


                                <div class="d-flex justify-content-between">

                                    <span>
                                        Current: <strong>480 ppm</strong>
                                    </span>

                                    <span class="text-success">
                                        <i class="fas fa-check-circle"></i>
                                    </span>

                                </div>

                            </div>



                            <!-- TURBIDITY -->
                            <div class="border rounded p-3 mb-3">

                                <div class="d-flex justify-content-between
                                align-items-center mb-2">

                                    <div>
                                        <h6 class="mb-1">
                                            Turbidity
                                        </h6>

                                        <small class="text-muted">
                                            Recommended limit: Below 10 NTU
                                        </small>
                                    </div>


                                    <span class="badge bg-warning text-dark">
                                        Attention
                                    </span>

                                </div>


                                <div class="d-flex justify-content-between">

                                    <span>
                                        Current: <strong>12 NTU</strong>
                                    </span>

                                    <span class="text-warning">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </span>

                                </div>

                            </div>



                            <!-- COD -->
                            <div class="border rounded p-3 mb-3">

                                <div class="d-flex justify-content-between
                                align-items-center mb-2">

                                    <div>
                                        <h6 class="mb-1">
                                            COD
                                        </h6>

                                        <small class="text-muted">
                                            Required limit: Below 350 mg/L
                                        </small>
                                    </div>


                                    <span class="badge bg-success">
                                        Compliant
                                    </span>

                                </div>


                                <div class="d-flex justify-content-between">

                                    <span>
                                        Current: <strong>320 mg/L</strong>
                                    </span>

                                    <span class="text-success">
                                        <i class="fas fa-check-circle"></i>
                                    </span>

                                </div>

                            </div>



                            <!-- BOD -->
                            <div class="border rounded p-3">

                                <div class="d-flex justify-content-between
                                align-items-center mb-2">

                                    <div>
                                        <h6 class="mb-1">
                                            BOD
                                        </h6>

                                        <small class="text-muted">
                                            Required limit: Below 150 mg/L
                                        </small>
                                    </div>


                                    <span class="badge bg-success">
                                        Compliant
                                    </span>

                                </div>


                                <div class="d-flex justify-content-between">

                                    <span>
                                        Current: <strong>140 mg/L</strong>
                                    </span>

                                    <span class="text-success">
                                        <i class="fas fa-check-circle"></i>
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>



                    <!-- COMPLIANCE SUMMARY -->
                    <div class="col-lg-4">

                        <div class="chart-card h-100">

                            <h4 class="mb-1">
                                Compliance Summary
                            </h4>

                            <p class="text-muted mb-4">
                                Current monitoring overview
                            </p>


                            <div class="border-bottom pb-3 mb-3">

                                <small class="text-muted d-block mb-1">
                                    Total Parameters
                                </small>

                                <h5 class="mb-0">
                                    6
                                </h5>

                            </div>


                            <div class="border-bottom pb-3 mb-3">

                                <small class="text-muted d-block mb-1">
                                    Compliant Parameters
                                </small>

                                <h5 class="mb-0 text-success">
                                    5
                                </h5>

                            </div>


                            <div class="border-bottom pb-3 mb-3">

                                <small class="text-muted d-block mb-1">
                                    Requires Attention
                                </small>

                                <h5 class="mb-0 text-warning">
                                    1
                                </h5>

                            </div>


                            <div class="border-bottom pb-3 mb-3">

                                <small class="text-muted d-block mb-1">
                                    Overall Risk Level
                                </small>

                                <span class="badge bg-success">
                                    Low Risk
                                </span>

                            </div>


                            <div>

                                <small class="text-muted d-block mb-1">
                                    Next Compliance Review
                                </small>

                                <span class="fw-semibold">
                                    Sep 30, 2026
                                </span>

                            </div>

                        </div>

                    </div>

                </div>



                <!-- ACTIVE ALERTS -->
                <div class="row g-4 mb-4">


                    <div class="col-lg-6">

                        <div class="chart-card h-100">

                            <div class="d-flex justify-content-between
                            align-items-center mb-4">

                                <div>
                                    <h4 class="mb-1">
                                        Compliance Alerts
                                    </h4>

                                    <p class="text-muted mb-0">
                                        Parameters requiring attention
                                    </p>
                                </div>


                                <span class="badge bg-warning text-dark">
                                    1 Active
                                </span>

                            </div>


                            <div class="alert alert-warning mb-0">

                                <div class="d-flex">

                                    <i class="fas fa-exclamation-triangle
                                  fs-4 me-3"></i>


                                    <div>

                                        <h6 class="mb-1">
                                            Turbidity Above Recommended Level
                                        </h6>

                                        <p class="mb-2">

                                            The current turbidity level is 12 NTU,
                                            which is above the recommended limit.

                                        </p>


                                        <button class="btn btn-sm btn-warning">
                                            Review Details
                                        </button>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                    <!-- RECENT ACTIVITY -->
                    <div class="col-lg-6">

                        <div class="chart-card h-100">

                            <div class="d-flex justify-content-between
                            align-items-center mb-4">

                                <div>
                                    <h4 class="mb-1">
                                        Recent Compliance Activity
                                    </h4>

                                    <p class="text-muted mb-0">
                                        Latest compliance updates
                                    </p>
                                </div>


                                <a href="#" class="text-decoration-none">
                                    View All
                                </a>

                            </div>



                            <div class="border-bottom pb-3 mb-3">

                                <div class="d-flex justify-content-between">

                                    <div>

                                        <h6 class="mb-1">
                                            Compliance Score Updated
                                        </h6>

                                        <small class="text-muted">
                                            Current compliance score is 92%
                                        </small>

                                    </div>


                                    <small class="text-muted">
                                        Now
                                    </small>

                                </div>

                            </div>



                            <div class="border-bottom pb-3 mb-3">

                                <div class="d-flex justify-content-between">

                                    <div>

                                        <h6 class="mb-1">
                                            Turbidity Alert Generated
                                        </h6>

                                        <small class="text-muted">
                                            Turbidity reading exceeded recommended level
                                        </small>

                                    </div>


                                    <small class="text-muted">
                                        10 min ago
                                    </small>

                                </div>

                            </div>



                            <div>

                                <div class="d-flex justify-content-between">

                                    <div>

                                        <h6 class="mb-1">
                                            Audit Report Completed
                                        </h6>

                                        <small class="text-muted">
                                            Latest system audit was successfully completed
                                        </small>

                                    </div>


                                    <small class="text-muted">
                                        Yesterday
                                    </small>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>



                <!-- COMPLIANCE HISTORY -->
                <div class="chart-card">

                    <div class="d-flex flex-column flex-md-row
                    justify-content-between
                    align-items-md-center
                    gap-3
                    mb-4">

                        <div>

                            <h4 class="mb-1">
                                Compliance History
                            </h4>

                            <p class="text-muted mb-0">
                                Previous compliance monitoring records
                            </p>

                        </div>


                        <select class="form-select w-auto">

                            <option selected>
                                Last 30 Days
                            </option>

                            <option>
                                Last 3 Months
                            </option>

                            <option>
                                Last 6 Months
                            </option>

                        </select>

                    </div>


                    <div class="table-responsive">

                        <table class="table table-hover mb-0">

                            <thead>

                                <tr class="table-header-blue">
                                    <th>Date</th>
                                    <th>Compliance Score</th>
                                    <th>Parameters Passed</th>
                                    <th>Alerts</th>
                                    <th>Status</th>
                                </tr>

                            </thead>


                            <tbody>

                                <tr>

                                    <td>
                                        Sep 05, 2026
                                    </td>

                                    <td>
                                        <strong>92%</strong>
                                    </td>

                                    <td>
                                        5 / 6
                                    </td>

                                    <td>
                                        1
                                    </td>

                                    <td>
                                        <span class="badge bg-success">
                                            Compliant
                                        </span>
                                    </td>

                                </tr>


                                <tr>

                                    <td>
                                        Sep 04, 2026
                                    </td>

                                    <td>
                                        <strong>94%</strong>
                                    </td>

                                    <td>
                                        6 / 6
                                    </td>

                                    <td>
                                        0
                                    </td>

                                    <td>
                                        <span class="badge bg-success">
                                            Compliant
                                        </span>
                                    </td>

                                </tr>


                                <tr>

                                    <td>
                                        Sep 03, 2026
                                    </td>

                                    <td>
                                        <strong>88%</strong>
                                    </td>

                                    <td>
                                        5 / 6
                                    </td>

                                    <td>
                                        1
                                    </td>

                                    <td>
                                        <span class="badge bg-warning text-dark">
                                            Attention
                                        </span>
                                    </td>

                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>
        </div>
    </div>



    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>