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
            <h4 class="mb-1">Edit Technician</h4>
            <p class="text-muted mb-0">
                Update technician profile, verification, and assignment details.
            </p>
        </div>

        <a href="../technician/technician.html" class="btn btn-primary mt-2 mt-md-0">
            <i class="fas fa-arrow-left me-2"></i>
            Back to Technicians
        </a>
    </div>

    <form action="#" method="post">

        <!-- Basic Information -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Basic Information</h5>
            </div>

            <div class="card-body">
                <div class="row g-3">

                    <div class="col-md-6">
                        <label for="technicianId" class="form-label">
                            Technician ID
                        </label>
                        <input type="text"
                               id="technicianId"
                               class="form-control"
                               value="TECH-1001"
                               readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="fullName" class="form-label">
                            Full Name
                        </label>
                        <input type="text"
                               id="fullName"
                               class="form-control"
                               value="Daniel Wilson"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">
                            Email Address
                        </label>
                        <input type="email"
                               id="email"
                               class="form-control"
                               value="daniel@example.com"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label for="phone" class="form-label">
                            Phone Number
                        </label>
                        <input type="tel"
                               id="phone"
                               class="form-control"
                               value="+1 416 555 0124"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label for="role" class="form-label">
                            Role
                        </label>
                        <select id="role" class="form-select">
                            <option selected>Field Service Technician</option>
                            <option>Senior Technician</option>
                            <option>Compliance Technician</option>
                            <option>Maintenance Technician</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="availability" class="form-label">
                            Availability
                        </label>
                        <select id="availability" class="form-select">
                            <option selected>Available</option>
                            <option>Busy</option>
                            <option>Inactive</option>
                        </select>
                    </div>

                </div>
            </div>
        </div>

        <!-- Address Information -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Address Information</h5>
            </div>

            <div class="card-body">
                <div class="row g-3">

                    <div class="col-12">
                        <label for="address" class="form-label">
                            Street Address
                        </label>
                        <input type="text"
                               id="address"
                               class="form-control"
                               value="125 Water Street">
                    </div>

                    <div class="col-md-4">
                        <label for="city" class="form-label">City</label>
                        <input type="text"
                               id="city"
                               class="form-control"
                               value="Toronto">
                    </div>

                    <div class="col-md-4">
                        <label for="province" class="form-label">
                            Province
                        </label>
                        <select id="province" class="form-select">
                            <option selected>Ontario</option>
                            <option>British Columbia</option>
                            <option>Alberta</option>
                            <option>Quebec</option>
                            <option>Manitoba</option>
                            <option>Saskatchewan</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="postalCode" class="form-label">
                            Postal Code
                        </label>
                        <input type="text"
                               id="postalCode"
                               class="form-control"
                               value="M5V 2N8">
                    </div>

                </div>
            </div>
        </div>

        <!-- Professional Details -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Professional Details</h5>
            </div>

            <div class="card-body">
                <div class="row g-3">

                    <div class="col-md-6">
                        <label for="specialization" class="form-label">
                            Specialization
                        </label>
                        <input type="text"
                               id="specialization"
                               class="form-control"
                               value="Wastewater Treatment and Compliance">
                    </div>

                    <div class="col-md-6">
                        <label for="experience" class="form-label">
                            Experience
                        </label>
                        <input type="text"
                               id="experience"
                               class="form-control"
                               value="5 Years">
                    </div>

                    <div class="col-md-6">
                        <label for="certification" class="form-label">
                            Certification
                        </label>
                        <input type="text"
                               id="certification"
                               class="form-control"
                               value="Water Quality Technician Certification">
                    </div>

                    <div class="col-md-6">
                        <label for="verification" class="form-label">
                            Verification Status
                        </label>
                        <select id="verification" class="form-select">
                            <option selected>Verified</option>
                            <option>Pending</option>
                            <option>Rejected</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="skills" class="form-label">
                            Skills
                        </label>
                        <textarea id="skills"
                                  class="form-control"
                                  rows="3">Water Testing, Chemical Dosing, Sensor Installation, Compliance Reporting</textarea>
                    </div>

                    <div class="col-12">
                        <label for="notes" class="form-label">
                            Internal Notes
                        </label>
                        <textarea id="notes"
                                  class="form-control"
                                  rows="3">Technician approved for Ontario pilot customer assignments.</textarea>
                    </div>

                </div>
            </div>
        </div>

        <!-- Assignment Information -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Assignment Information</h5>
            </div>

            <div class="card-body">
                <div class="row g-3">

                    <div class="col-md-6">
                        <label for="assignedSites" class="form-label">
                            Assigned Sites
                        </label>
                        <select id="assignedSites" class="form-select">
                            <option selected>8 Sites</option>
                            <option>5 Sites</option>
                            <option>3 Sites</option>
                            <option>6 Sites</option>
                            <option>Unassigned</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="serviceType" class="form-label">
                            Primary Service Type
                        </label>
                        <select id="serviceType" class="form-select">
                            <option selected>Water Quality Inspection</option>
                            <option>Compliance Testing</option>
                            <option>Sensor Maintenance</option>
                            <option>Chemical Kit Delivery</option>
                            <option>Compliance Reporting</option>
                        </select>
                    </div>

                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="d-flex flex-wrap justify-content-end gap-2">
            <a href="technicians.html" class="btn btn-light border">
                Cancel
            </a>

            <button type="reset" class="btn btn-outline-secondary">
                <i class="fas fa-undo me-2"></i>
                Reset
            </button>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>
                Update Technician
            </button>
        </div>

    </form>

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