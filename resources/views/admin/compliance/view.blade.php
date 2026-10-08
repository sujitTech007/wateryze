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
                    <a href="../user/users.html" class="nav-link active">
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
                    <a href="../billing/billing.html" class="nav-link">
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
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Compliance Record Details</h2>
            <p class="text-muted mb-0">
                View complete compliance and verification information.
            </p>
        </div>

        <div class="d-flex gap-2">
            <a href="compliance.html" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i> Back
            </a>

            <a href="compliance-edit.html" class="btn btn-primary">
                <i class="fas fa-edit me-1"></i> Edit Record
            </a>
        </div>
    </div>


    <div class="row">

        <!-- Main Compliance Details -->
        <div class="col-lg-8 mb-4">

            <div class="card shadow-sm border-0">

                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">
                        <i class="fas fa-clipboard-check text-primary me-2"></i>
                        Compliance Information
                    </h5>
                </div>

                <div class="card-body">

                    <div class="row g-4">

                        <div class="col-md-6">
                            <small class="text-muted">Customer</small>
                            <h6 class="mt-1 mb-0">Blue Haven Spa</h6>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted">Site ID</small>
                            <h6 class="mt-1 mb-0">WZ-2025-001</h6>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted">Location</small>
                            <h6 class="mt-1 mb-0">Ontario</h6>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted">Compliance Score</small>
                            <h6 class="mt-1 text-success mb-0">92%</h6>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted">Verification Status</small>

                            <div class="mt-1">
                                <span class="badge bg-success px-3 py-2">
                                    <i class="fas fa-check-circle me-1"></i>
                                    VERIFIED
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted">Compliance Status</small>

                            <div class="mt-1">
                                <span class="badge bg-success px-3 py-2">
                                    COMPLIANT
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted">Last Audit Date</small>
                            <h6 class="mt-1 mb-0">Jan 02, 2026</h6>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted">Next Audit Date</small>
                            <h6 class="mt-1 mb-0">Jul 02, 2026</h6>
                        </div>

                    </div>

                </div>
            </div>


            <!-- Water Quality -->
            <div class="card shadow-sm border-0 mt-4">

                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">
                        <i class="fas fa-droplet text-primary me-2"></i>
                        Water Quality Parameters
                    </h5>
                </div>

                <div class="card-body">

                    <div class="row g-3">

                        <div class="col-md-4">
                            <div class="border rounded p-3">
                                <small class="text-muted">pH Level</small>
                                <h4 class="mt-2 mb-1">7.1</h4>

                                <span class="badge bg-success">
                                    Normal
                                </span>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="border rounded p-3">
                                <small class="text-muted">TDS</small>
                                <h4 class="mt-2 mb-1">380 ppm</h4>

                                <span class="badge bg-success">
                                    Normal
                                </span>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="border rounded p-3">
                                <small class="text-muted">Turbidity</small>
                                <h4 class="mt-2 mb-1">8 NTU</h4>

                                <span class="badge bg-success">
                                    Normal
                                </span>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="border rounded p-3">
                                <small class="text-muted">COD</small>
                                <h4 class="mt-2 mb-1">320 mg/L</h4>

                                <span class="badge bg-success">
                                    Within Range
                                </span>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="border rounded p-3">
                                <small class="text-muted">BOD</small>
                                <h4 class="mt-2 mb-1">140 mg/L</h4>

                                <span class="badge bg-success">
                                    Within Range
                                </span>
                            </div>
                        </div>

                    </div>

                </div>
            </div>


            <!-- Audit Notes -->
            <div class="card shadow-sm border-0 mt-4">

                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">
                        <i class="fas fa-file-alt text-primary me-2"></i>
                        Audit Notes
                    </h5>
                </div>

                <div class="card-body">

                    <p class="mb-0 text-muted">
                        The wastewater treatment system is operating within
                        the acceptable compliance range. All major water
                        quality parameters have passed the latest audit.
                        No immediate corrective action is required.
                    </p>

                </div>

            </div>

        </div>


        <!-- Right Sidebar -->
        <div class="col-lg-4 mb-4">

            <!-- Compliance Score -->
            <div class="card shadow-sm border-0 mb-4">

                <div class="card-body text-center">

                    <h6 class="text-muted mb-3">
                        Compliance Score
                    </h6>

                    <div class=" fw-bold text-primary">
                        92%
                    </div>

                    <p class="text-primary mb-0 mt-2">
                        <i class="fas fa-check-circle me-1"></i>
                        Excellent Compliance
                    </p>

                </div>

            </div>


            <!-- Audit Information -->
            <div class="card shadow-sm border-0 mb-4">

                <div class="card-header bg-white py-3">
                    <h6 class="mb-0">
                        Audit Information
                    </h6>
                </div>

                <div class="card-body">

                    <div class="mb-3">
                        <small class="text-muted">
                            Last Auditor
                        </small>

                        <div>
                            Michael Anderson
                        </div>
                    </div>


                    <div class="mb-3">
                        <small class="text-muted">
                            Audit Reference
                        </small>

                        <div>
                            AUD-2026-001
                        </div>
                    </div>


                    <div>
                        <small class="text-muted">
                            Record Created
                        </small>

                        <div>
                            Jan 02, 2026
                        </div>
                    </div>

                </div>

            </div>


            <!-- Quick Actions -->
            <div class="card shadow-sm border-0">

                <div class="card-header bg-white py-3">
                    <h6 class="mb-0">
                        Quick Actions
                    </h6>
                </div>

                <div class="card-body d-grid gap-2">

                    <a href="compliance-edit.html"
                        class="btn btn-primary">

                        <i class="fas fa-edit me-2"></i>
                        Edit Compliance Record

                    </a>


                    <button class="btn btn-outline-secondary">

                        <i class="fas fa-download me-2"></i>
                        Export Record

                    </button>

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
       <script src="../assets/js/script.js"></script>
</body>

</html>