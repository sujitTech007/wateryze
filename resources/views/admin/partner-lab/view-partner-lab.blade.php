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
    <link rel="stylesheet" href="../assets/css/styles.css?v=1.3"></head>

<body>
    <div class="wrapper">
        <!-- ========== SIDEBAR START ========== -->
                <nav class="sidebar">
            <!-- Logo Section -->
            <div class="sidebar-header">
                <div class="logo-wrapper">
                    <a href="../index.html" class="logo-link">
                        <img src="../assets/images/logo.png" alt="Wateryze Logo"
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
                        <i class="fas fa-clipboard-check"></i>
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
                    <a href="../billing/billing.html" class="nav-link">
                        <i class="fas fa-credit-card"></i>
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
                    <a href="../partner-lab/partner-labs.html" class="nav-link active">
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
                    <h2 class="page-title" id="pageTitle">Dashboard</h2>
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

            <!-- ========== DASHBOARD CONTENT START ========== -->
           


<div class="content-area">

    <!-- Page Header -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1">View Partner Lab</h4>
            <p class="text-muted mb-0">
                View laboratory partner details and onboarding information.
            </p>
        </div>

        <div class="mt-2 mt-md-0">
            <a href="edit-partner-lab.html" class="btn btn-primary me-2">
                <i class="fas fa-edit me-2"></i>
                Edit Lab
            </a>

            <a href="partner-labs.html" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>
                Back
            </a>
        </div>
    </div>

    <!-- Lab Overview -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white">
            <h5 class="mb-0">Laboratory Overview</h5>
        </div>

        <div class="card-body">
            <div class="row g-4">

                <div class="col-md-6">
                    <small class="text-muted d-block">Lab ID</small>
                    <h6>#LAB-1001</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Laboratory Name</small>
                    <h6>ClearWater Analytics</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Laboratory Type</small>
                    <h6>Water Testing Laboratory</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Status</small>
                    <span class="badge bg-success">Active</span>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Onboarding Date</small>
                    <h6>September 02, 2026</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Last Updated</small>
                    <h6>September 15, 2026</h6>
                </div>

            </div>
        </div>
    </div>

    <!-- Contact Information -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white">
            <h5 class="mb-0">Contact Information</h5>
        </div>

        <div class="card-body">
            <div class="row g-4">

                <div class="col-md-6">
                    <small class="text-muted d-block">Contact Person</small>
                    <h6>Sarah Mitchell</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Email Address</small>
                    <h6>sarah@clearwateranalytics.com</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Phone Number</small>
                    <h6>+1 416 555 0124</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Website</small>
                    <h6>www.clearwateranalytics.com</h6>
                </div>

            </div>
        </div>
    </div>

    <!-- Location Information -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white">
            <h5 class="mb-0">Location Information</h5>
        </div>

        <div class="card-body">
            <div class="row g-4">

                <div class="col-md-6">
                    <small class="text-muted d-block">Address</small>
                    <h6>125 Water Street</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">City</small>
                    <h6>Toronto</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Province</small>
                    <h6>Ontario</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Postal Code</small>
                    <h6>M5V 2N8</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Country</small>
                    <h6>Canada</h6>
                </div>

            </div>
        </div>
    </div>

    <!-- Partnership Details -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white">
            <h5 class="mb-0">Partnership Details</h5>
        </div>

        <div class="card-body">
            <div class="row g-4">

                <div class="col-md-6">
                    <small class="text-muted d-block">Services Offered</small>
                    <p class="mb-0">
                        Water quality testing, wastewater analysis, compliance testing
                    </p>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Assigned Sites</small>
                    <h6>12 Sites</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Verification Status</small>
                    <span class="badge bg-success">Verified</span>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Partnership Notes</small>
                    <p class="mb-0">
                        Approved laboratory partner for Ontario pilot customers.
                    </p>
                </div>

            </div>
        </div>
    </div>

</div>
            <!-- ========== DASHBOARD CONTENT END ========== -->
        </div>
        <!-- ========== MAIN CONTENT END ========== -->
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="script.js"></script>
</body>

</html>