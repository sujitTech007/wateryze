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
          <!-- ========== EDIT REPORT CONTENT START ========== -->
<div class="content-area">

    <!-- Page Header -->
    <div class="d-flex flex-column flex-md-row
                justify-content-between
                align-items-md-center
                mb-4">

        <div>

            <a href="reports.html"
               class="btn btn-sm btn-outline-secondary mb-3">

                <i class="fas fa-arrow-left me-1"></i>
                Back to Reports

            </a>

            <h3 class="mb-1">Edit Customer Report</h3>

            <p class="text-muted mb-0">
                Update customer water quality and chemical kit usage details.
            </p>

        </div>

    </div>


    <form>

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

                        <div class="row g-3">


                            <!-- Customer ID -->
                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Customer ID
                                </label>

                                <input type="text"
                                       class="form-control"
                                       value="WZ-2025-001"
                                       readonly>

                            </div>


                            <!-- Customer Name -->
                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Customer Name
                                </label>

                                <input type="text"
                                       class="form-control"
                                       value="Blue Haven Spa">

                            </div>


                            <!-- Location -->
                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Location
                                </label>

                                <input type="text"
                                       class="form-control"
                                       value="Ontario">

                            </div>


                            <!-- Contact -->
                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Contact Email
                                </label>

                                <input type="email"
                                       class="form-control"
                                       value="manager@bluehaven.com">

                            </div>


                        </div>

                    </div>

                </div>



                <!-- Water Quality -->
                <div class="card border-0 shadow-sm mb-4">

                    <div class="card-header bg-white py-3">

                        <h5 class="mb-1">
                            <i class="fas fa-tint me-2 text-primary"></i>
                            Water Quality
                        </h5>

                        <small class="text-muted">
                            Update the latest water quality measurements
                        </small>

                    </div>


                    <div class="card-body p-4">

                        <div class="row g-3">


                            <!-- pH -->
                            <div class="col-md-4">

                                <label class="form-label fw-semibold">
                                    pH Level
                                </label>

                                <input type="number"
                                       step="0.1"
                                       class="form-control"
                                       value="6.2">

                            </div>


                            <!-- Turbidity -->
                            <div class="col-md-4">

                                <label class="form-label fw-semibold">
                                    Turbidity (NTU)
                                </label>

                                <input type="number"
                                       class="form-control"
                                       value="22">

                            </div>


                            <!-- TDS -->
                            <div class="col-md-4">

                                <label class="form-label fw-semibold">
                                    TDS (ppm)
                                </label>

                                <input type="number"
                                       class="form-control"
                                       placeholder="Enter TDS value">

                            </div>


                            <!-- ORP -->
                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    ORP (mV)
                                </label>

                                <input type="number"
                                       class="form-control"
                                       placeholder="Enter ORP value">

                            </div>


                            <!-- Report Status -->
                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Compliance Status
                                </label>

                                <select class="form-select">

                                    <option selected>
                                        Warning
                                    </option>

                                    <option>
                                        Compliant
                                    </option>

                                    <option>
                                        Critical
                                    </option>

                                    <option>
                                        Pending Review
                                    </option>

                                </select>

                            </div>


                        </div>

                    </div>

                </div>



                <!-- Chemical Kit Usage -->
                <div class="card border-0 shadow-sm">

                    <div class="card-header bg-white py-3">

                        <h5 class="mb-1">
                            <i class="fas fa-flask me-2 text-primary"></i>
                            Chemical Kit Usage
                        </h5>

                        <small class="text-muted">
                            Update chemical kit consumption details
                        </small>

                    </div>


                    <div class="card-body p-4">

                        <div class="row g-3">


                            <!-- Chemicals Used -->
                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Chemicals Used
                                </label>

                                <input type="number"
                                       class="form-control"
                                       value="2">

                            </div>


                            <!-- Total Chemicals -->
                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Total Chemicals
                                </label>

                                <input type="number"
                                       class="form-control"
                                       value="4">

                            </div>


                            <!-- Usage Notes -->
                            <div class="col-12">

                                <label class="form-label fw-semibold">
                                    Usage Notes
                                </label>

                                <textarea class="form-control"
                                          rows="4"
                                          placeholder="Add chemical usage notes..."></textarea>

                            </div>


                        </div>

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


                        <!-- Report ID -->
                        <div class="mb-3">

                            <small class="text-muted d-block">
                                Report ID
                            </small>

                            <span class="fw-semibold">
                                #REP-001
                            </span>

                        </div>


                        <hr>


                        <!-- Customer -->
                        <div class="mb-3">

                            <small class="text-muted d-block">
                                Customer
                            </small>

                            <span class="fw-semibold">
                                Blue Haven Spa
                            </span>

                        </div>


                        <hr>


                        <!-- Current Status -->
                        <div class="mb-3">

                            <small class="text-muted d-block mb-2">
                                Current Status
                            </small>

                            <span class="badge bg-warning text-dark px-3 py-2">

                                <i class="fas fa-exclamation-triangle me-1"></i>

                                Warning

                            </span>

                        </div>


                        <hr>


                        <!-- Last Updated -->
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



                <!-- Water Quality Status -->
                <div class="card border-0 shadow-sm">

                    <div class="card-header bg-white py-3">

                        <h5 class="mb-0">
                            Current Readings
                        </h5>

                    </div>


                    <div class="card-body">


                        <div class="d-flex
                                    justify-content-between
                                    align-items-center
                                    mb-3">

                            <span class="text-muted">
                                pH Level
                            </span>

                            <span class="fw-semibold">
                                6.2
                            </span>

                        </div>


                        <div class="d-flex
                                    justify-content-between
                                    align-items-center
                                    mb-3">

                            <span class="text-muted">
                                Turbidity
                            </span>

                            <span class="fw-semibold">
                                22 NTU
                            </span>

                        </div>


                        <div class="d-flex
                                    justify-content-between
                                    align-items-center">

                            <span class="text-muted">
                                Kit Usage
                            </span>

                            <span class="badge bg-info text-dark px-3 py-2">
                                2 / 4 Chemicals
                            </span>

                        </div>


                    </div>

                </div>


            </div>

        </div>



        <!-- ACTION BUTTONS -->
        <div class="d-flex justify-content-end gap-2 mt-4">

            <a href="reports.html"
               class="btn btn-outline-secondary">

                Cancel

            </a>


            <button type="submit"
                    class="btn btn-primary px-4">

                <i class="fas fa-save me-2"></i>
                Save Changes

            </button>

        </div>


    </form>

</div>
<!-- ========== EDIT REPORT CONTENT END ========== -->
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script src="../js/script.js"></script>
