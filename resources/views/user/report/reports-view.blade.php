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

            <!-- ========== VIEW REPORT CONTENT START ========== -->

<div class="content-area">

    



    <!-- Page Header -->

    <div class="d-flex flex-column flex-md-row

                justify-content-between

                align-items-md-center

                mb-4">



        <div>



            <a href="reports.html"

               class="btn btn-sm btn-primary mb-3">



                <i class="fas fa-arrow-left me-1"></i>

                Back to Reports



            </a>



            <h3 class="mb-1">Customer Report Details</h3>



            <p class="text-muted mb-0">

                View detailed water quality, compliance and chemical usage information.

            </p>



        </div>



        <div class="mt-3 mt-md-0">



            <a href="edit-report.html"

               class="btn btn-primary">



                <i class="fas fa-edit me-2"></i>

                Edit Report



            </a>



        </div>



    </div>





    <div class="row g-4">



        <!-- LEFT COLUMN -->

        <div class="col-lg-8">





            <!-- Customer Information -->

            <div class="card border-0 shadow-sm mb-4">



                <div class="card-header bg-white py-3">



                    <h5 class="mb-1">

                        <i class="fas fa-building me-2 text-primary"></i>

                        Customer Information

                    </h5>



                    <small class="text-muted">

                        Customer and contact details

                    </small>



                </div>





                <div class="card-body p-4">



                    <div class="row g-4">





                        <div class="col-md-6">



                            <small class="text-muted d-block mb-1">

                                Customer ID

                            </small>



                            <span class="fw-semibold">

                                WZ-2025-001

                            </span>



                        </div>





                        <div class="col-md-6">



                            <small class="text-muted d-block mb-1">

                                Customer Name

                            </small>



                            <span class="fw-semibold">

                                Blue Haven Spa

                            </span>



                        </div>





                        <div class="col-md-6">



                            <small class="text-muted d-block mb-1">

                                Location

                            </small>



                            <span class="fw-semibold">

                                Ontario

                            </span>



                        </div>





                        <div class="col-md-6">



                            <small class="text-muted d-block mb-1">

                                Contact Email

                            </small>



                            <span class="fw-semibold">

                                manager@bluehaven.com

                            </span>



                        </div>





                    </div>



                </div>



            </div>







            <!-- Water Quality -->

            <div class="card border-0 shadow-sm mb-4">



                <div class="card-header bg-white py-3">



                    <h5 class="mb-1">

                        <i class="fas fa-tint me-2 text-primary"></i>

                        Water Quality Readings

                    </h5>



                    <small class="text-muted">

                        Latest recorded water quality measurements

                    </small>



                </div>





                <div class="card-body p-4">



                    <div class="row g-3">





                        <!-- PH -->

                        <div class="col-md-3">



                            <div class="border rounded p-3 h-100">



                                <small class="text-muted d-block mb-2">

                                    pH Level

                                </small>



                                <h5 class="mb-0">

                                    6.2

                                </h5>



                                <small class="text-warning">

                                    Low

                                </small>



                            </div>



                        </div>





                        <!-- Turbidity -->

                        <div class="col-md-3">



                            <div class="border rounded p-3 h-100">



                                <small class="text-muted d-block mb-2">

                                    Turbidity

                                </small>



                                <h5 class="mb-0">

                                    22

                                </h5>



                                <small class="text-muted">

                                    NTU

                                </small>



                            </div>



                        </div>





                        <!-- TDS -->

                        <div class="col-md-3">



                            <div class="border rounded p-3 h-100">



                                <small class="text-muted d-block mb-2">

                                    TDS

                                </small>



                                <h5 class="mb-0">

                                    --

                                </h5>



                                <small class="text-muted">

                                    ppm

                                </small>



                            </div>



                        </div>





                        <!-- ORP -->

                        <div class="col-md-3">



                            <div class="border rounded p-3 h-100">



                                <small class="text-muted d-block mb-2">

                                    ORP

                                </small>



                                <h5 class="mb-0">

                                    --

                                </h5>



                                <small class="text-muted">

                                    mV

                                </small>



                            </div>



                        </div>





                    </div>



                </div>



            </div>







            <!-- Chemical Kit Usage -->

            <div class="card border-0 shadow-sm mb-4">



                <div class="card-header bg-white py-3">



                    <h5 class="mb-1">

                        <i class="fas fa-flask me-2 text-primary"></i>

                        Chemical Kit Usage

                    </h5>



                    <small class="text-muted">

                        Current chemical kit consumption

                    </small>



                </div>





                <div class="card-body p-4">





                    <div class="row g-4">





                        <div class="col-md-6">



                            <small class="text-muted d-block mb-1">

                                Chemicals Used

                            </small>



                            <h4 class="mb-0">

                                2

                            </h4>



                        </div>





                        <div class="col-md-6">



                            <small class="text-muted d-block mb-1">

                                Total Chemicals Available

                            </small>



                            <h4 class="mb-0">

                                4

                            </h4>



                        </div>





                    </div>





                    <hr class="my-4">





                    <!-- Progress -->

                    <div class="d-flex justify-content-between mb-2">



                        <span class="fw-semibold">

                            Kit Usage

                        </span>



                        <span>

                            2 / 4 Chemicals

                        </span>



                    </div>





                    <div class="progress"

                         style="height: 10px;">



                        <div class="progress-bar"

                             role="progressbar"

                             style="width: 50%;"

                             aria-valuenow="50"

                             aria-valuemin="0"

                             aria-valuemax="100">



                        </div>



                    </div>





                    <!-- Notes -->

                    <div class="mt-4">



                        <small class="text-muted d-block mb-2">

                            Usage Notes

                        </small>



                        <p class="mb-0">

                            Chemical kit usage is within the expected

                            operational range.

                        </p>



                    </div>





                </div>



            </div>







            <!-- Report Notes -->

            <div class="card border-0 shadow-sm">



                <div class="card-header bg-white py-3">



                    <h5 class="mb-0">

                        <i class="fas fa-clipboard-list me-2 text-primary"></i>

                        Report Notes

                    </h5>



                </div>





                <div class="card-body">



                    <p class="mb-0 text-muted">



                        pH level is currently below the recommended range.

                        Please review the chemical dosing and water treatment

                        process to maintain compliance.



                    </p>



                </div>



            </div>





        </div>







        <!-- RIGHT COLUMN -->

        <div class="col-lg-4">





            <!-- Report Summary -->

            <div class="card border-0 shadow-sm mb-4">



                <div class="card-header bg-white py-3">



                    <h5 class="mb-0">

                        Report Summary

                    </h5>



                </div>





                <div class="card-body">





                    <div class="mb-3">



                        <small class="text-muted d-block">

                            Report ID

                        </small>



                        <span class="fw-semibold">

                            #REP-001

                        </span>



                    </div>





                    <hr>





                    <div class="mb-3">



                        <small class="text-muted d-block">

                            Report Date

                        </small>



                        <span class="fw-semibold">

                            Sep 4, 2026

                        </span>



                    </div>





                    <hr>





                    <div class="mb-3">



                        <small class="text-muted d-block mb-2">

                            Compliance Status

                        </small>



                        <span class="badge bg-warning text-dark px-3 py-2">



                            <i class="fas fa-exclamation-triangle me-1"></i>



                            Warning



                        </span>



                    </div>





                    <hr>





                    <div>



                        <small class="text-muted d-block">

                            Last Updated

                        </small>



                        <span class="fw-semibold">

                            Sep 4, 2026

                        </span>



                    </div>





                </div>



            </div>







            <!-- Compliance Information -->

            <div class="card border-0 shadow-sm mb-4">



                <div class="card-header bg-white py-3">



                    <h5 class="mb-0">

                        Compliance Information

                    </h5>



                </div>





                <div class="card-body">





                    <div class="d-flex align-items-start mb-3">



                        <i class="fas fa-exclamation-circle

                                  text-warning

                                  mt-1

                                  me-3"></i>



                        <div>



                            <h6 class="mb-1">

                                Action Required

                            </h6>



                            <small class="text-muted">



                                Water quality requires attention.



                            </small>



                        </div>



                    </div>





                    <hr>





                    <small class="text-muted d-block mb-1">

                        Compliance Review

                    </small>



                    <span class="fw-semibold">

                        Pending Review

                    </span>





                </div>



            </div>







            <!-- Quick Actions -->

            <div class="card border-0 shadow-sm">



                <div class="card-header bg-white py-3">



                    <h5 class="mb-0">

                        Quick Actions

                    </h5>



                </div>





                <div class="card-body d-grid gap-2">





                    <a href="edit-report.html"

                       class="btn btn-outline-primary">



                        <i class="fas fa-edit me-2"></i>

                        Edit Report



                    </a>





                    <button class="btn btn-outline-secondary">



                        <i class="fas fa-download me-2"></i>

                        Export Report



                    </button>





                    <button class="btn btn-outline-danger">



                        <i class="fas fa-trash me-2"></i>

                        Delete Report



                    </button>





                </div>



            </div>





        </div>



    </div>



</div>

<!-- ========== VIEW REPORT CONTENT END ========== -->

        </div>

    </div>



    <!-- Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    

    <!-- Custom JS -->

    <script src="../js/script.js"></script>

