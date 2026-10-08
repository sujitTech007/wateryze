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
            <h2 class="mb-1" style="font-size: 25px;">Edit Compliance Record</h2>
            <p class="text-muted mb-0">
                Update customer compliance and verification information.
            </p>
        </div>

        <a href="../compliance/compliance.html"
            class="btn btn-primary">

            <i class="fas fa-arrow-left me-1"></i>
            Back

        </a>

    </div>


    <form>

        <div class="row">

            <!-- Left Section -->
            <div class="col-lg-8">


                <!-- Customer Information -->
                <div class="card shadow-sm border-0 mb-4">

                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0">
                            <i class="fas fa-user text-primary me-2"></i>
                            Customer Information
                        </h5>
                    </div>


                    <div class="card-body">

                        <div class="row g-3">

                            <div class="col-md-6">

                                <label class="form-label">
                                    Customer
                                </label>

                                <select class="form-select">

                                    <option selected>
                                        Blue Haven Spa
                                    </option>

                                    <option>
                                        Maple Brewery
                                    </option>

                                    <option>
                                        Crystal Waters
                                    </option>

                                    <option>
                                        FreshFlow Foods
                                    </option>

                                </select>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    Site ID
                                </label>

                                <input type="text"
                                    class="form-control"
                                    value="WZ-2025-001">

                            </div>


                            <div class="col-12">

                                <label class="form-label">
                                    Location
                                </label>

                                <input type="text"
                                    class="form-control"
                                    value="Ontario">

                            </div>

                        </div>

                    </div>

                </div>



                <!-- Compliance Details -->
                <div class="card shadow-sm border-0 mb-4">

                    <div class="card-header bg-white py-3">

                        <h5 class="mb-0">
                            <i class="fas fa-clipboard-check text-primary me-2"></i>
                            Compliance Details
                        </h5>

                    </div>


                    <div class="card-body">

                        <div class="row g-3">

                            <div class="col-md-6">

                                <label class="form-label">
                                    Compliance Score (%)
                                </label>

                                <input type="number"
                                    class="form-control"
                                    value="92">

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    Compliance Status
                                </label>

                                <select class="form-select">

                                    <option selected>
                                        Compliant
                                    </option>

                                    <option>
                                        Warning
                                    </option>

                                    <option>
                                        Non-Compliant
                                    </option>

                                </select>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    Verification Status
                                </label>

                                <select class="form-select">

                                    <option selected>
                                        Verified
                                    </option>

                                    <option>
                                        Pending
                                    </option>

                                    <option>
                                        Review Required
                                    </option>

                                    <option>
                                        Failed
                                    </option>

                                </select>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    Last Audit Date
                                </label>

                                <input type="date"
                                    class="form-control"
                                    value="2026-01-02">

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    Next Audit Date
                                </label>

                                <input type="date"
                                    class="form-control"
                                    value="2026-07-02">

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    Audit Reference
                                </label>

                                <input type="text"
                                    class="form-control"
                                    value="AUD-2026-001">

                            </div>

                        </div>

                    </div>

                </div>



                <!-- Water Quality -->
                <div class="card shadow-sm border-0 mb-4">

                    <div class="card-header bg-white py-3">

                        <h5 class="mb-0">
                            <i class="fas fa-droplet text-primary me-2"></i>
                            Water Quality Parameters
                        </h5>

                    </div>


                    <div class="card-body">

                        <div class="row g-3">

                            <div class="col-md-4">

                                <label class="form-label">
                                    pH Level
                                </label>

                                <input type="number"
                                    step="0.1"
                                    class="form-control"
                                    value="7.1">

                            </div>


                            <div class="col-md-4">

                                <label class="form-label">
                                    TDS (ppm)
                                </label>

                                <input type="number"
                                    class="form-control"
                                    value="380">

                            </div>


                            <div class="col-md-4">

                                <label class="form-label">
                                    Turbidity (NTU)
                                </label>

                                <input type="number"
                                    class="form-control"
                                    value="8">

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    COD (mg/L)
                                </label>

                                <input type="number"
                                    class="form-control"
                                    value="320">

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    BOD (mg/L)
                                </label>

                                <input type="number"
                                    class="form-control"
                                    value="140">

                            </div>

                        </div>

                    </div>

                </div>



                <!-- Audit Notes -->
                <div class="card shadow-sm border-0 mb-4">

                    <div class="card-header bg-white py-3">

                        <h5 class="mb-0">
                            <i class="fas fa-file-alt text-primary me-2"></i>
                            Audit Notes
                        </h5>

                    </div>


                    <div class="card-body">

                        <label class="form-label">
                            Compliance Notes
                        </label>

                        <textarea class="form-control"
                            rows="6">The wastewater treatment system is operating within the acceptable compliance range. All major water quality parameters have passed the latest audit.</textarea>

                    </div>

                </div>

            </div>



            <!-- Right Sidebar -->
            <div class="col-lg-4">


                <!-- Record Status -->
                <div class="card shadow-sm border-0 mb-4">

                    <div class="card-header bg-white py-3">

                        <h6 class="mb-0">
                            Record Status
                        </h6>

                    </div>


                    <div class="card-body">

                        <div class="form-check form-switch">

                            <input class="form-check-input"
                                type="checkbox"
                                checked
                                id="recordStatus">

                            <label class="form-check-label"
                                for="recordStatus">

                                Compliance Record Active

                            </label>

                        </div>

                        <small class="text-muted d-block mt-3">

                            Disable this record if the customer
                            compliance monitoring is no longer active.

                        </small>

                    </div>

                </div>



                <!-- Auditor -->
                <div class="card shadow-sm border-0 mb-4">

                    <div class="card-header bg-white py-3">

                        <h6 class="mb-0">
                            Auditor Information
                        </h6>

                    </div>


                    <div class="card-body">

                        <label class="form-label">
                            Auditor Name
                        </label>

                        <input type="text"
                            class="form-control"
                            value="Michael Anderson">

                    </div>

                </div>



                <!-- Actions -->
                <div class="card shadow-sm border-0">

                    <div class="card-body">

                        <button type="submit"
                            class="btn btn-primary w-100 mb-2">

                            <i class="fas fa-save me-2"></i>
                            Save Changes

                        </button>


                        <a href="compliance-view.html"
                            class="btn btn-outline-secondary w-100">

                            Cancel

                        </a>

                    </div>

                </div>

            </div>

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
       <script src="../assets/js/script.js"></script>
</body>

</html>