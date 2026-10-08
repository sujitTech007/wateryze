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

                    <a href="subscription_plan.html" class="nav-link active">

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







            <!-- ========== SUBSCRIPTIONS CONTENT START ========== -->

            <div class="content-area">



    <!-- Subscription Plans -->

    <section class="mb-4">



        <!-- Section Header -->

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">



            <div>

                <h4 class="mb-1">Subscription Plans</h4>

                <p class="text-muted mb-0">

                    Manage available subscription plans and their features.

                </p>

            </div>



            <a href="subscription_add.html" class="btn btn-primary mt-3 mt-md-0">

                <i class="fas fa-plus me-1"></i>

                Add Plan

            </a>



        </div>





        <!-- Plans -->

        <div class="row g-4">



            <!-- Starter Plan -->

            <div class="col-md-4">



                <div class="card h-100 border-0 shadow-sm">



                    <!-- Plan Header -->

                    <div class="card-body p-4">



                        <div class="d-flex justify-content-between align-items-start mb-4">



                            <div>

                                <span class="badge bg-light text-primary mb-2">

                                    STARTER

                                </span>



                                <h4 class="mb-1">

                                    Starter

                                </h4>



                                <p class="text-muted mb-0" style="font-size: 13px;">

                                    Essential plan for growing businesses

                                </p>

                            </div>



                            <!-- Actions -->

                            <div class="d-flex gap-2">



                                <a href="./subscription/subscription_edit.html"

                                   class="btn btn-sm btn-outline-primary"

                                   title="Edit">

                                    <i class="fas fa-edit"></i>

                                </a>



                                <button type="button"

                                        class="btn btn-sm btn-outline-danger"

                                        title="Delete">

                                    <i class="fas fa-trash"></i>

                                </button>



                            </div>



                        </div>





                        <!-- Price -->

                        <div class="mb-4">



                            <h2 class="mb-0 text-primary fs-4">

                                Custom

                            </h2>



                            <small class="text-muted">

                                Custom pricing

                            </small>



                        </div>





                        <!-- Description -->

                        <p class="text-muted mb-4"style="font-size:13px;">

                            Essential wastewater compliance and monitoring

                            features for growing SMBs.

                        </p>





                        <!-- Features -->

                        <h6 class="mb-3">

                            Plan Features

                        </h6>



                        <ul class="list-unstyled mb-0">



                            <li class="d-flex align-items-center mb-3"style="font-size:13px;">

                                <span class="badge bg-success-subtle text-success rounded-circle p-2 me-2">

                                    <i class="fas fa-check"></i>

                                </span>

                                Compliance tracking

                            </li>



                            <li class="d-flex align-items-center mb-3"style="font-size:13px;">

                                <span class="badge bg-success-subtle text-success rounded-circle p-2 me-2">

                                    <i class="fas fa-check"></i>

                                </span>

                                Chemical kit management

                            </li>



                            <li class="d-flex align-items-center mb-3"style="font-size:13px;">

                                <span class="badge bg-success-subtle text-success rounded-circle p-2 me-2">

                                    <i class="fas fa-check"></i>

                                </span>

                                Compliance reporting

                            </li>



                            <li class="d-flex align-items-center mb-3"style="font-size:13px;">

                                <span class="badge bg-success-subtle text-success rounded-circle p-2 me-2">

                                    <i class="fas fa-check"></i>

                                </span>

                                Customer dashboard

                            </li>



                            <li class="d-flex align-items-center"style="font-size:13px;">

                                <span class="badge bg-success-subtle text-success rounded-circle p-2 me-2">

                                    <i class="fas fa-check"></i>

                                </span>

                                Email notifications

                            </li>



                        </ul>



                    </div>



                </div>



            </div>





            <!-- Pro Plan -->

            <div class="col-md-4">



                <div class="card h-100  border-0 shadow-sm">



                    <div class="card-body p-4">



                        <!-- Header -->

                        <div class="d-flex justify-content-between align-items-start mb-4">



                            <div>



                                <span class="badge bg-primary mb-2">

                                    RECOMMENDED

                                </span>



                                <h4 class="mb-1">

                                    Pro

                                </h4>



                                <p class="text-muted mb-0 text-nowrap"style="font-size:13px;">

                                    Advanced tools for expanding businesses

                                </p>



                            </div>





                            <!-- Actions -->

                            <div class="d-flex gap-2">



                                <a href="./subscription/subscription_edit.html"

                                   class="btn btn-sm btn-outline-primary"

                                   title="Edit">

                                    <i class="fas fa-edit"></i>

                                </a>



                                <button type="button"

                                        class="btn btn-sm btn-outline-danger"

                                        title="Delete">

                                    <i class="fas fa-trash"></i>

                                </button>



                            </div>



                        </div>





                        <!-- Price -->

                        <div class="mb-4">



                            <h2 class="mb-0 text-primary fs-4">

                                Custom

                            </h2>



                            <small class="text-muted">

                                Custom pricing

                            </small>



                        </div>





                        <!-- Description -->

                        <p class="text-muted mb-4"style="font-size:13px;">

                            Advanced monitoring, compliance and reporting

                            capabilities for expanding businesses.

                        </p>





                        <!-- Features -->

                        <h6 class="mb-3">

                            Plan Features

                        </h6>



                        <ul class="list-unstyled mb-0">



                            <li class="d-flex align-items-center mb-3"style="font-size:13px;">

                                <span class="badge bg-success-subtle text-success rounded-circle p-2 me-2">

                                    <i class="fas fa-check"></i>

                                </span>

                                Real-time sensor integration

                            </li>



                            <li class="d-flex align-items-center mb-3"style="font-size:13px;">

                                <span class="badge bg-success-subtle text-success rounded-circle p-2 me-2">

                                    <i class="fas fa-check"></i>

                                </span>

                                Live water quality monitoring

                            </li>



                            <li class="d-flex align-items-center mb-3"style="font-size:13px;">

                                <span class="badge bg-success-subtle text-success rounded-circle p-2 me-2">

                                    <i class="fas fa-check"></i>

                                </span>

                                Automated compliance reports

                            </li>



                            <li class="d-flex align-items-center mb-3"style="font-size:13px;">

                                <span class="badge bg-success-subtle text-success rounded-circle p-2 me-2">

                                    <i class="fas fa-check"></i>

                                </span>

                                Compliance alerts & notifications

                            </li>



                            <li class="d-flex align-items-center mb-3"style="font-size:13px;">

                                <span class="badge bg-success-subtle text-success rounded-circle p-2 me-2">

                                    <i class="fas fa-check"></i>

                                </span>

                                ESG audit reports

                            </li>



                            <li class="d-flex align-items-center"style="font-size:13px;">

                                <span class="badge bg-success-subtle text-success rounded-circle p-2 me-2">

                                    <i class="fas fa-check"></i>

                                </span>

                                Multi-site dashboard

                            </li>



                        </ul>



                    </div>



                </div>



            </div>



        </div>



    </section>



</div>

            <!-- ========== SUBSCRIPTIONS CONTENT END ========== -->



            <!-- Bootstrap JS -->

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



            <!-- Custom JavaScript -->

            <script src="assets/js/script.js"></script>

</body>



</html>