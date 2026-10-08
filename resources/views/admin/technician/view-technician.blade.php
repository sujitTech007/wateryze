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
                    <a href="../partner-lab/partner-labs.html" class="nav-link">
                        <i class="fas fa-flask"></i>
                        <span>Partner labs</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../technician/technician.html" class="nav-link active">
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
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1">View Technician</h4>
            <p class="text-muted mb-0">
                View technician profile, verification, and service details.
            </p>
        </div>

        <div class="mt-2 mt-md-0">
            <a href="edit-technician.html" class="btn btn-primary me-2">
                <i class="fas fa-edit me-2"></i>
                Edit Technician
            </a>

            <a href="technicians.html" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>
                Back
            </a>
        </div>
    </div>

    <!-- Profile Overview -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white">
            <h5 class="mb-0">Technician Overview</h5>
        </div>

        <div class="card-body">
            <div class="row g-4 align-items-center">

                <div class="col-md-3 text-center">
                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle
                                d-inline-flex align-items-center justify-content-center"
                         style="width: 100px; height: 100px;">
                        <i class="fas fa-user fa-3x"></i>
                    </div>
                    <h5 class="mt-3 mb-1">Daniel Wilson</h5>
                    <p class="text-muted mb-0">TECH-1001</p>
                </div>

                <div class="col-md-9">
                    <div class="row g-4">

                        <div class="col-md-6">
                            <small class="text-muted d-block">Verification Status</small>
                            <span class="badge bg-success">Verified</span>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted d-block">Availability</small>
                            <span class="badge bg-success">Available</span>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted d-block">Assigned Sites</small>
                            <h6>8 Sites</h6>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted d-block">Completed Services</small>
                            <h6>24 Services</h6>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted d-block">Joining Date</small>
                            <h6>September 02, 2026</h6>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted d-block">Last Activity</small>
                            <h6>September 15, 2026</h6>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Personal Information -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white">
            <h5 class="mb-0">Personal Information</h5>
        </div>

        <div class="card-body">
            <div class="row g-4">

                <div class="col-md-6">
                    <small class="text-muted d-block">Full Name</small>
                    <h6>Daniel Wilson</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Email Address</small>
                    <h6>daniel@example.com</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Phone Number</small>
                    <h6>+1 416 555 0124</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Role</small>
                    <h6>Field Service Technician</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Province</small>
                    <h6>Ontario</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">City</small>
                    <h6>Toronto</h6>
                </div>

            </div>
        </div>
    </div>

    <!-- Professional Information -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white">
            <h5 class="mb-0">Professional Information</h5>
        </div>

        <div class="card-body">
            <div class="row g-4">

                <div class="col-md-6">
                    <small class="text-muted d-block">Specialization</small>
                    <h6>Wastewater Treatment and Compliance</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Experience</small>
                    <h6>5 Years</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Certification</small>
                    <h6>Water Quality Technician Certification</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Verification Date</small>
                    <h6>September 03, 2026</h6>
                </div>

                <div class="col-12">
                    <small class="text-muted d-block">Skills</small>
                    <span class="badge bg-light text-dark border me-2">Water Testing</span>
                    <span class="badge bg-light text-dark border me-2">Chemical Dosing</span>
                    <span class="badge bg-light text-dark border me-2">Sensor Installation</span>
                    <span class="badge bg-light text-dark border">Compliance Reporting</span>
                </div>

            </div>
        </div>
    </div>

    <!-- Assigned Sites -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white">
            <h5 class="mb-0">Assigned Sites</h5>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Site Name</th>
                            <th>Location</th>
                            <th>Service Type</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Green Spa Facility</td>
                            <td>Toronto, Ontario</td>
                            <td>Water Quality Inspection</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>

                        <tr>
                            <td>Ontario Brewing Plant</td>
                            <td>Mississauga, Ontario</td>
                            <td>Compliance Testing</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>

                        <tr>
                            <td>FreshFlow Manufacturing</td>
                            <td>Brampton, Ontario</td>
                            <td>Sensor Maintenance</td>
                            <td>
                                <span class="badge bg-warning text-dark">Scheduled</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Delete Technician Modal -->
<div class="modal fade" id="deleteTechnicianModal" tabindex="-1"
     aria-labelledby="deleteTechnicianModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="deleteTechnicianModalLabel">
                    Delete Technician
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                </button>
            </div>

            <div class="modal-body">
                Are you sure you want to delete this technician?
                This action cannot be undone.
            </div>

            <div class="modal-footer">
                <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                    Cancel
                </button>

                <a href="delete-technician.html"
                   class="btn btn-danger">
                    Delete Technician
                </a>
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