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

    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3 mb-4">



        <div>

            <h2 class="mb-1 fs-4">Site & Location</h2>



            <p class="text-muted mb-0">

                Manage your wastewater treatment site and location information.

            </p>

        </div>



        <div class="d-flex gap-2">



            <button type="button" class="btn btn-primary btn-sm">

                <i class="fas fa-map-marker-alt me-2"></i>

                View Location

            </button>



            <!-- <button type="button" class="btn btn-primary btn-sm">

                <i class="fas fa-edit me-2"></i>

                Edit Site

            </button> -->



        </div>



    </div>





    <!-- SITE OVERVIEW -->

    <div class="row g-4 mb-4">



        <!-- SITE INFORMATION -->

        <div class="col-lg-8">



            <div class="chart-card h-100">



                <div class="d-flex justify-content-between align-items-center mb-4">



                    <div>

                        <h4 class="mb-1">Site Information</h4>



                        <p class="text-muted mb-0">

                            Primary wastewater treatment facility details

                        </p>

                    </div>



                    <span class="badge bg-success px-3 py-2">

                        <i class="fas fa-check-circle me-1"></i>

                        Active

                    </span>



                </div>





                <div class="row g-4">



                    <!-- SITE NAME -->

                    <div class="col-md-6">



                        <small class="text-muted d-block mb-1">

                            Site Name

                        </small>



                        <h6 class="mb-0">

                            Blue Haven Spa

                        </h6>



                    </div>





                    <!-- SITE ID -->

                    <div class="col-md-6">



                        <small class="text-muted d-block mb-1">

                            Site ID

                        </small>



                        <h6 class="mb-0">

                            WZ-2025-001

                        </h6>



                    </div>





                    <!-- SITE TYPE -->

                    <div class="col-md-6">



                        <small class="text-muted d-block mb-1">

                            Facility Type

                        </small>



                        <h6 class="mb-0">

                            Spa & Wellness Facility

                        </h6>



                    </div>





                    <!-- STATUS -->

                    <div class="col-md-6">



                        <small class="text-muted d-block mb-1">

                            Monitoring Status

                        </small>



                        <h6 class="mb-0 text-success">

                            Live Monitoring Active

                        </h6>



                    </div>





                    <!-- CAPACITY -->

                    <div class="col-md-6">



                        <small class="text-muted d-block mb-1">

                            Treatment Capacity

                        </small>



                        <h6 class="mb-0">

                            50,000 L / Day

                        </h6>



                    </div>





                    <!-- ACTIVATION DATE -->

                    <div class="col-md-6">



                        <small class="text-muted d-block mb-1">

                            System Activated

                        </small>



                        <h6 class="mb-0">

                            Jan 15, 2025

                        </h6>



                    </div>



                </div>



            </div>



        </div>







        <!-- SITE STATUS -->

        <div class="col-lg-4">



            <div class="chart-card h-100">



                <h4 class="mb-1">

                    Site Status

                </h4>



                <p class="text-muted mb-4">

                    Current operational overview

                </p>





                <div class="border-bottom pb-3 mb-3">



                    <div class="d-flex justify-content-between align-items-center">



                        <span>System</span>



                        <span class="badge bg-success">

                            Online

                        </span>



                    </div>



                </div>





                <div class="border-bottom pb-3 mb-3">



                    <div class="d-flex justify-content-between align-items-center">



                        <span>Sensors</span>



                        <span class="badge bg-success">

                            4 / 4 Online

                        </span>



                    </div>



                </div>





                <div class="border-bottom pb-3 mb-3">



                    <div class="d-flex justify-content-between align-items-center">



                        <span>Compliance</span>



                        <span class="badge bg-success">

                            92%

                        </span>



                    </div>



                </div>





                <div>



                    <div class="d-flex justify-content-between align-items-center">



                        <span>Active Alerts</span>



                        <span class="badge bg-warning text-dark">

                            1

                        </span>



                    </div>



                </div>



            </div>



        </div>



    </div>







    <!-- LOCATION DETAILS -->

    <div class="row g-4 mb-4">



        <!-- ADDRESS -->

        <div class="col-lg-5">



            <div class="chart-card h-100">



                <div class="d-flex align-items-center mb-4">



                    <i class="fas fa-map-marker-alt fs-3 text-primary me-3"></i>



                    <div>

                        <h4 class="mb-1">

                            Location Details

                        </h4>



                        <p class="text-muted mb-0">

                            Registered site address

                        </p>

                    </div>



                </div>





                <div class="mb-4">



                    <small class="text-muted d-block mb-1">

                        Address

                    </small>



                    <p class="mb-0">

                        245 Lakeview Avenue<br>

                        Downtown District<br>

                        Ontario, Canada

                    </p>



                </div>





                <div class="row g-3">



                    <div class="col-6">



                        <small class="text-muted d-block mb-1">

                            City

                        </small>



                        <span>

                            Ontario

                        </span>



                    </div>





                    <div class="col-6">



                        <small class="text-muted d-block mb-1">

                            Postal Code

                        </small>



                        <span>

                            M5V 2T6

                        </span>



                    </div>





                    <div class="col-6">



                        <small class="text-muted d-block mb-1">

                            Country

                        </small>



                        <span>

                            Canada

                        </span>



                    </div>





                    <div class="col-6">



                        <small class="text-muted d-block mb-1">

                            Time Zone

                        </small>



                        <span>

                            EST

                        </span>



                    </div>



                </div>



            </div>



        </div>







        <!-- MAP PLACEHOLDER -->

        <div class="col-lg-7">



            <div class="chart-card h-100">



                <div class="d-flex justify-content-between align-items-center mb-4">



                    <div>

                        <h4 class="mb-1">

                            Site Location

                        </h4>



                        <p class="text-muted mb-0">

                            Geographic location of your facility

                        </p>

                    </div>



                    <button class="btn btn-sm btn-outline-primary">

                        <i class="fas fa-expand me-1"></i>

                        Expand

                    </button>



                </div>





                <!-- MAP AREA -->

                <div class="border rounded d-flex flex-column justify-content-center align-items-center text-center"

                     style="min-height: 280px;">



                    <i class="fas fa-map-marked-alt fs-1 text-primary mb-3"></i>



                    <h5>

                        Blue Haven Spa

                    </h5>



                    <p class="text-muted mb-3">

                        Ontario, Canada

                    </p>



                    <button class="btn btn-primary btn-sm">

                        <i class="fas fa-directions me-1"></i>

                        Get Directions

                    </button>



                </div>



            </div>



        </div>



    </div>







    <!-- SITE CONTACT & OPERATIONS -->

    <div class="row g-4">



        <!-- SITE CONTACT -->

        <div class="col-lg-6">



            <div class="chart-card h-100">



                <div class="d-flex align-items-center mb-4">



                    <i class="fas fa-user-circle fs-3 text-primary me-3"></i>



                    <div>

                        <h4 class="mb-1">

                            Site Contact

                        </h4>



                        <p class="text-muted mb-0">

                            Primary person responsible for the facility

                        </p>

                    </div>



                </div>





                <div class="border-bottom pb-3 mb-3">



                    <small class="text-muted d-block mb-1">

                        Contact Name

                    </small>



                    <span>

                        William Johnson

                    </span>



                </div>





                <div class="border-bottom pb-3 mb-3">



                    <small class="text-muted d-block mb-1">

                        Email Address

                    </small>



                    <span>

                        manager@bluehaven.com

                    </span>



                </div>





                <div>



                    <small class="text-muted d-block mb-1">

                        Phone Number

                    </small>



                    <span>

                        +1 (416) 555-0123

                    </span>



                </div>



            </div>



        </div>







        <!-- OPERATION DETAILS -->

        <div class="col-lg-6">



            <div class="chart-card h-100">



                <div class="d-flex align-items-center mb-4">



                    <i class="fas fa-cogs fs-3 text-primary me-3"></i>



                    <div>

                        <h4 class="mb-1">

                            Treatment Operations

                        </h4>



                        <p class="text-muted mb-0">

                            Current system configuration

                        </p>

                    </div>



                </div>





                <div class="border-bottom pb-3 mb-3">



                    <div class="d-flex justify-content-between align-items-center">



                        <div>



                            <h6 class="mb-1">

                                Operating Schedule

                            </h6>



                            <small class="text-muted">

                                Daily treatment cycle

                            </small>



                        </div>



                        <span>

                            24 / 7

                        </span>



                    </div>



                </div>





                <div class="border-bottom pb-3 mb-3">



                    <div class="d-flex justify-content-between align-items-center">



                        <div>



                            <h6 class="mb-1">

                                Monitoring Frequency

                            </h6>



                            <small class="text-muted">

                                Sensor data collection

                            </small>



                        </div>



                        <span>

                            Real Time

                        </span>



                    </div>



                </div>





                <div>



                    <div class="d-flex justify-content-between align-items-center">



                        <div>



                            <h6 class="mb-1">

                                Last Maintenance

                            </h6>



                            <small class="text-muted">

                                System maintenance completed

                            </small>



                        </div>



                        <span>

                            Aug 28, 2026

                        </span>



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

       <script src="assets/js/script.js"></script>