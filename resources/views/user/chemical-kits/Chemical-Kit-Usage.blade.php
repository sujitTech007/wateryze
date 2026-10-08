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
    <link rel="stylesheet" href="../assets/css/style.css?v=1.2">
</head>

<body>
    <div class="wrapper">
        <!-- ========== SIDEBAR START ========== -->
        <nav class="sidebar">
            <!-- Logo Section -->
            <div class="sidebar-header">
                <div class="logo-wrapper">
                    <a href="index.html" class="logo-link">
                        <img src="../assets/images/logo.png" alt="Wateryze Logo" class="logo-img">
                    </a>
                </div>
                <button class="sidebar-toggle d-lg-none" id="sidebarToggle">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Navigation Menu -->
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="../index.html" class="nav-link active">
                        <i class="fas fa-chart-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../water-monitoring.html" class="nav-link">
                        <i class="fas fa-tint"></i>
                        <span>Water Monitoring</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../chemical-kits/Chemical-Kit-Usage.html" class="nav-link">
                        <i class="fas fa-flask"></i>
                        <span>Chemical Kit Usage</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../compliance.html" class="nav-link">
                        <i class="fas fa-shield-alt"></i>
                        <span>Compliance
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../schedule.html" class="nav-link">
                        <i class="fas fa-clock"></i>
                        <span>Schedule Reminder</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../report/reports.html" class="nav-link">
                        <i class="fa-regular fa-file-lines"></i>
                        <span>Reports</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../site-location.html" class="nav-link">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Sites & Locations</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../notifications.html" class="nav-link">
                        <i class="fas fa-bell"></i>
                        <span>Notifications</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../settings.html" class="nav-link">
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
                            <img src="../assets/images/profile-icon.png" alt="William" class="profile-avatar">
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

                        <h2 class="mb-1 fs-4">
                            Chemical Kit Usage
                        </h2>

                        <p class="text-muted mb-0">
                            Track chemical consumption, remaining stock and usage activity.
                        </p>

                    </div>


                    <div class="d-flex gap-2">

                        <button type="button" class="btn btn-outline-secondary">

                            <i class="fas fa-history me-2"></i>
                            Usage History

                        </button>


                        <a href="add-Chemical-Kit-Usage copy.html" type="button" class="btn btn-primary btn-sm">

                            <i class="fas fa-plus me-2"></i>
                            Add Usage

                        </a>

                    </div>

                </div>



                <!-- OVERVIEW CARDS -->
                <div class="row g-4 mb-4"> <!-- TOTAL CHEMICALS -->
                    <div class="col-md-6 col-xl-3">
                        <div class="chart-card bg-primary-subtle border border-primary-subtle shadow rounded-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted mb-1" style="font-size: 12px;"> Total Chemicals </p>
                                    <h2 class="fw-bold mb-0 fs-1"> 4 </h2>
                                </div>
                                <div class="fs-2 text-primary"> <i class="fas fa-flask"></i> </div>
                            </div> <small class="text-muted d-block mt-0" style="font-size: 12px;"> Chemicals available
                                in your kit </small>
                        </div>
                    </div> <!-- CHEMICALS USED -->
                    <div class="col-md-6 col-xl-3">
                        <div class="chart-card bg-warning-subtle border border-warning-subtle shadow rounded-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted mb-1" style="font-size: 12px;"> Chemicals Used </p>
                                    <h2 class="fw-bold mb-0 fs-1"> 2 </h2>
                                </div>
                                <div class="fs-2 text-warning"> <i class="fas fa-vial"></i> </div>
                            </div> <small class="text-muted d-block mt-0" style="font-size: 12px;"> Used during the
                                current cycle </small>
                        </div>
                    </div> <!-- REMAINING -->
                    <div class="col-md-6 col-xl-3">
                        <div class="chart-card bg-success-subtle border border-success-subtle shadow rounded-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted mb-1" style="font-size: 12px;"> Remaining </p>
                                    <h2 class="fw-bold mb-0 fs-1"> 2 </h2>
                                </div>
                                <div class="fs-2 text-success"> <i class="fas fa-box-open"></i> </div>
                            </div> <small class="text-success d-block mt-0" style="font-size: 12px;"> <i
                                    class="fas fa-check-circle me-1"></i> Stock level is sufficient </small>
                        </div>
                    </div> <!-- NEXT DELIVERY -->
                    <div class="col-md-6 col-xl-3">
                        <div class="chart-card bg-info-subtle border border-info-subtle shadow rounded-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted mb-1" style="font-size: 12px;"> Next Kit Delivery </p>
                                    <h5 class="fw-bold mb-0 fs-5"> Sep 25, 2026 </h5>
                                </div>
                                <div class="fs-2 text-info"> <i class="fas fa-truck"></i> </div>
                            </div> <small class="text-muted d-block mt-2" style="font-size: 12px;"> Scheduled delivery
                                date </small>
                        </div>
                    </div>
                </div>


                <!-- KIT USAGE + STATUS -->
                <div class="row g-4 mb-4">


                    <!-- KIT USAGE -->
                    <div class="col-lg-8">

                        <div class="chart-card h-100">

                            <div class="d-flex
                            justify-content-between
                            align-items-center
                            mb-4">

                                <div>

                                    <h4 class="mb-1">
                                        Current Kit Usage
                                    </h4>

                                    <p class="text-muted mb-0">
                                        Track the chemicals included in your current kit.
                                    </p>

                                </div>


                                <span class="badge bg-primary px-3 py-2">

                                    2 / 4 Used

                                </span>

                            </div>


                            <!-- CHEMICAL 1 -->
                            <div class=" rounded p-2 mb-2">

                                <div class="d-flex
                                justify-content-between
                                align-items-center
                                mb-3">

                                    <div>

                                        <h6 class="mb-1">
                                            pH Adjuster
                                        </h6>

                                        <small class="text-muted">
                                            Used for maintaining optimal pH levels
                                        </small>

                                    </div>


                                    <span class="badge bg-success">
                                        Used
                                    </span>

                                </div>


                                <div class="progress" style="height: 8px;">

                                    <div class="progress-bar" role="progressbar" style="width: 100%;"
                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">

                                    </div>

                                </div>

                            </div>



                            <!-- CHEMICAL 2 -->
                            <div class=" rounded p-2 mb-2">

                                <div class="d-flex
                                justify-content-between
                                align-items-center
                                mb-3">

                                    <div>

                                        <h6 class="mb-1">
                                            Coagulant
                                        </h6>

                                        <small class="text-muted">
                                            Helps remove suspended solids
                                        </small>

                                    </div>


                                    <span class="badge bg-success">
                                        Used
                                    </span>

                                </div>


                                <div class="progress" style="height: 8px;">

                                    <div class="progress-bar" role="progressbar" style="width: 100%;"
                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">

                                    </div>

                                </div>

                            </div>



                            <!-- CHEMICAL 3 -->
                            <div class=" rounded p-2 mb-2">

                                <div class="d-flex
                                justify-content-between
                                align-items-center
                                mb-3">

                                    <div>

                                        <h6 class="mb-1">
                                            Biological Treatment Agent
                                        </h6>

                                        <small class="text-muted">
                                            Supports organic wastewater treatment
                                        </small>

                                    </div>


                                    <span class="badge bg-secondary">
                                        Available
                                    </span>

                                </div>


                                <div class="progress" style="height: 8px;">

                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 0%;"
                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">

                                    </div>

                                </div>

                            </div>



                            <!-- CHEMICAL 4 -->
                            <div class=" rounded p-3">

                                <div class="d-flex
                                justify-content-between
                                align-items-center
                                mb-3">

                                    <div>

                                        <h6 class="mb-1">
                                            Disinfectant
                                        </h6>

                                        <small class="text-muted">
                                            Used for final wastewater treatment
                                        </small>

                                    </div>


                                    <span class="badge bg-secondary">
                                        Available
                                    </span>

                                </div>


                                <div class="progress" style="height: 8px;">

                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 0%;"
                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">

                                    </div>

                                </div>

                            </div>


                        </div>

                    </div>



                    <!-- KIT STATUS -->
                    <div class="col-lg-4">

                        <div class="chart-card h-100">

                            <h4 class="mb-1">
                                Kit Status
                            </h4>

                            <p class="text-muted mb-4">
                                Current chemical kit information
                            </p>


                            <div class="border-bottom pb-3 mb-3">

                                <small class="text-muted d-block mb-1">
                                    Kit ID
                                </small>

                                <span class="fw-semibold">
                                    CK-2026-001
                                </span>

                            </div>


                            <div class="border-bottom pb-3 mb-3">

                                <small class="text-muted d-block mb-1">
                                    Kit Status
                                </small>

                                <span class="badge bg-success">
                                    Active
                                </span>

                            </div>


                            <div class="border-bottom pb-3 mb-3">

                                <small class="text-muted d-block mb-1">
                                    Usage Progress
                                </small>

                                <span class="fw-semibold">
                                    50% Used
                                </span>

                            </div>


                            <div class="border-bottom pb-3 mb-3">

                                <small class="text-muted d-block mb-1">
                                    Activated On
                                </small>

                                <span class="fw-semibold">
                                    Sep 1, 2026
                                </span>

                            </div>


                            <div>

                                <small class="text-muted d-block mb-1">
                                    Estimated Remaining Duration
                                </small>

                                <span class="fw-semibold">
                                    Approximately 14 Days
                                </span>

                            </div>


                        </div>

                    </div>

                </div>



                <!-- USAGE HISTORY + ALERTS -->
                <div class="row g-4">


                    <!-- RECENT USAGE -->
                    <div class="col-lg-8">

                        <div class="chart-card">

                            <div class="d-flex
                            justify-content-between
                            align-items-center
                            mb-4">

                                <div>

                                    <h4 class="mb-1">
                                        Recent Usage Activity
                                    </h4>

                                    <p class="text-muted mb-0">
                                        Latest chemical usage records
                                    </p>

                                </div>


                                <a href="#" class="text-decoration-none">

                                    View All

                                </a>

                            </div>


                            <div class="table-responsive">

                                <table class="table table-hover mb-0">

                                    <thead>

                                        <tr class="table-header-blue">

                                            <th>Chemical</th>
                                            <th>Usage Date</th>
                                            <th>Purpose</th>
                                            <th>Status</th>

                                        </tr>

                                    </thead>


                                    <tbody>


                                        <tr>

                                            <td>

                                                <strong>
                                                    pH Adjuster
                                                </strong>

                                            </td>


                                            <td>
                                                Sep 4, 2026
                                            </td>


                                            <td>
                                                pH balancing
                                            </td>


                                            <td>

                                                <span class="badge bg-success">
                                                    Applied
                                                </span>

                                            </td>

                                        </tr>



                                        <tr>

                                            <td>

                                                <strong>
                                                    Coagulant
                                                </strong>

                                            </td>


                                            <td>
                                                Sep 3, 2026
                                            </td>


                                            <td>
                                                Solids treatment
                                            </td>


                                            <td>

                                                <span class="badge bg-success">
                                                    Applied
                                                </span>

                                            </td>

                                        </tr>



                                        <tr>

                                            <td>

                                                <strong>
                                                    Kit Activated
                                                </strong>

                                            </td>


                                            <td>
                                                Sep 1, 2026
                                            </td>


                                            <td>
                                                New chemical kit activated
                                            </td>


                                            <td>

                                                <span class="badge bg-primary">
                                                    Completed
                                                </span>

                                            </td>

                                        </tr>


                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>



                    <!-- USAGE ALERT -->
                    <div class="col-lg-4">

                        <div class="chart-card h-100">

                            <h4 class="mb-1">
                                Usage Alerts
                            </h4>

                            <p class="text-muted mb-4">
                                Important kit notifications
                            </p>


                            <div class="alert alert-success">

                                <div class="d-flex">

                                    <i class="fas fa-check-circle
                                  fs-5
                                  me-3"></i>


                                    <div>

                                        <h6 class="mb-1">
                                            Kit Stock Healthy
                                        </h6>

                                        <small>
                                            You currently have sufficient chemicals
                                            available for treatment.
                                        </small>

                                    </div>

                                </div>

                            </div>


                            <div class="alert alert-primary mb-0">

                                <div class="d-flex">

                                    <i class="fas fa-truck
                                  fs-5
                                  me-3"></i>


                                    <div>

                                        <h6 class="mb-1">
                                            Upcoming Delivery
                                        </h6>

                                        <small>
                                            Your next chemical kit delivery is scheduled
                                            for Sep 25, 2026.
                                        </small>

                                    </div>

                                </div>

                            </div>


                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>



    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script src="../js/script.js"></script>