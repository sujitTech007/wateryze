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
            <h4 class="mb-1">Edit Partner Lab</h4>
            <p class="text-muted mb-0">
                Update laboratory partner information and onboarding details.
            </p>
        </div>

        <a href="partner-labs.html" class="btn btn-primary mt-2 mt-md-0">
            <i class="fas fa-arrow-left me-2"></i>
            Back to Labs
        </a>
    </div>

    <form action="#" method="post">

        <!-- Laboratory Information -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Laboratory Information</h5>
            </div>

            <div class="card-body">
                <div class="row g-3">

                    <div class="col-md-6">
                        <label for="labId" class="form-label">Lab ID</label>
                        <input type="text"
                               class="form-control"
                               id="labId"
                               value="LAB-1001"
                               readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="labName" class="form-label">
                            Laboratory Name
                        </label>
                        <input type="text"
                               class="form-control"
                               id="labName"
                               value="ClearWater Analytics"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label for="labType" class="form-label">
                            Laboratory Type
                        </label>
                        <select class="form-select" id="labType" required>
                            <option>Water Testing Laboratory</option>
                            <option>Environmental Testing Laboratory</option>
                            <option>Compliance Laboratory</option>
                            <option>Research Laboratory</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="labStatus" class="form-label">
                            Status
                        </label>
                        <select class="form-select" id="labStatus" required>
                            <option selected>Active</option>
                            <option>Pending</option>
                            <option>Inactive</option>
                            <option>Rejected</option>
                        </select>
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
                <div class="row g-3">

                    <div class="col-md-6">
                        <label for="contactPerson" class="form-label">
                            Contact Person
                        </label>
                        <input type="text"
                               class="form-control"
                               id="contactPerson"
                               value="Sarah Mitchell"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">
                            Email Address
                        </label>
                        <input type="email"
                               class="form-control"
                               id="email"
                               value="sarah@clearwateranalytics.com"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label for="phone" class="form-label">
                            Phone Number
                        </label>
                        <input type="tel"
                               class="form-control"
                               id="phone"
                               value="+1 416 555 0124"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label for="website" class="form-label">
                            Website
                        </label>
                        <input type="url"
                               class="form-control"
                               id="website"
                               value="https://www.clearwateranalytics.com">
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
                <div class="row g-3">

                    <div class="col-12">
                        <label for="address" class="form-label">
                            Street Address
                        </label>
                        <input type="text"
                               class="form-control"
                               id="address"
                               value="125 Water Street"
                               required>
                    </div>

                    <div class="col-md-4">
                        <label for="city" class="form-label">City</label>
                        <input type="text"
                               class="form-control"
                               id="city"
                               value="Toronto"
                               required>
                    </div>

                    <div class="col-md-4">
                        <label for="province" class="form-label">
                            Province
                        </label>
                        <select class="form-select" id="province" required>
                            <option selected>Ontario</option>
                            <option>British Columbia</option>
                            <option>Alberta</option>
                            <option>Quebec</option>
                            <option>Manitoba</option>
                            <option>Saskatchewan</option>
                            <option>Nova Scotia</option>
                            <option>New Brunswick</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="postalCode" class="form-label">
                            Postal Code
                        </label>
                        <input type="text"
                               class="form-control"
                               id="postalCode"
                               value="M5V 2N8"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label for="country" class="form-label">
                            Country
                        </label>
                        <input type="text"
                               class="form-control"
                               id="country"
                               value="Canada"
                               readonly>
                    </div>

                </div>
            </div>
        </div>

        <!-- Partnership Details -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Partnership Details</h5>
            </div>

            <div class="card-body">
                <div class="row g-3">

                    <div class="col-md-6">
                        <label for="services" class="form-label">
                            Services Offered
                        </label>
                        <textarea class="form-control"
                                  id="services"
                                  rows="4">Water quality testing, wastewater analysis, compliance testing</textarea>
                    </div>

                    <div class="col-md-6">
                        <label for="verification" class="form-label">
                            Verification Status
                        </label>
                        <select class="form-select mb-3" id="verification">
                            <option selected>Verified</option>
                            <option>Pending</option>
                            <option>Rejected</option>
                        </select>

                        <label for="notes" class="form-label">
                            Partnership Notes
                        </label>
                        <textarea class="form-control"
                                  id="notes"
                                  rows="3">Approved laboratory partner for Ontario pilot customers.</textarea>
                    </div>

                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="d-flex flex-wrap justify-content-end gap-2">
            <a href="partner-labs.html" class="btn btn-light border">
                Cancel
            </a>

            <button type="reset" class="btn btn-outline-secondary">
                <i class="fas fa-undo me-2"></i>
                Reset
            </button>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>
                Update Partner Lab
            </button>
        </div>

    </form>

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