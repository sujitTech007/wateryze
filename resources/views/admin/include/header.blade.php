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

    <link rel="stylesheet" href="../assets/css/styles.css?v=1.3">

</head>



<body>

    <div class="wrapper">

        <!-- ========== SIDEBAR START ========== -->

        <nav class="sidebar">

            <!-- Logo Section -->

            <div class="sidebar-header">

                <div class="logo-wrapper">

                    <a href="../index.html" class="logo-link">

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

                    <a href="../index.html" class="nav-link ">

                        <i class="fas fa-chart-line"></i>

                        <span>Dashboard</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="../user/users.html" class="nav-link">

                        <i class="fas fa-users"></i>

                        <span>Users</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="../water-usage.html" class="nav-link">

                        <i class="fas fa-water"></i>

                        <span>Water Usage</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="../chemical-kits/chemical-kits.html" class="nav-link">

                        <i class="fas fa-flask"></i>

                        <span>Chemical Kits</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="../compliance/compliance.html" class="nav-link">

                        <i class="fas fa-clipboard-check"></i>

                        <span>Compliance</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="../kit-delivery/kit-delivery.html" class="nav-link">

                        <i class="fas fa-box-open"></i>

                        <span>Kit delivery</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="../subscription/subscriptions.html" class="nav-link">

                        <i class="fas fa-credit-card"></i>

                        <span>Subscriptions</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="../subscription_plan.html" class="nav-link">

                        <i class="fas fa-credit-card"></i>

                        <span>Subscriptions Plan</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="../billing/billing.html" class="nav-link active">

                        <i class="fas fa-file-invoice-dollar"></i>

                        <span>Billing</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="../reports.html" class="nav-link">

                        <i class="fa-regular fa-file-lines"></i>

                        <span>Reports</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="../partner-lab/partner-labs.html" class="nav-link">

                        <i class="fas fa-flask"></i>

                        <span>Partner labs</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="../technician/technician.html" class="nav-link">

                        <i class="fas fa-user-cog"></i>

                        <span>Technician</span>

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

                <!-- <div class="navbar-left">

                    <button class="menu-toggle d-lg-none" id="menuToggle">

                        <i class="fas fa-bars"></i>

                    </button>

                    <h2 class="page-title" id="pageTitle">Billing</h2>

                </div> -->



                <div class="navbar-right">





                    <!-- Admin Profile Dropdown -->

                    <div class="nav-item profile-wrapper">

                        <button class="nav-link profile-btn" id="profileBtn">

                            <img src="../assets/images/profile-icon.png" alt="Admin" class="profile-avatar">

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