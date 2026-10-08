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
           <div class="content-area">

    <!-- Page Header -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Add Chemical Usage</h2>
            <p class="text-muted mb-0">
                Record chemical usage for your current chemical kit.
            </p>
        </div>

        <a href="Chemical-Kit-Usage.html" class="btn btn-primary mt-3 mt-md-0">
            <i class="fas fa-arrow-left me-2"></i>
            Back to Usage
        </a>
    </div>


    <div class="row justify-content-center">

        <!-- Main Form -->
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">Usage Information</h5>
                </div>


                <div class="card-body p-4">

                    <form>

                        <div class="row">

                            <!-- Chemical Name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">
                                    Chemical Name
                                </label>

                                <select class="form-select">
                                    <option selected disabled>
                                        Select Chemical
                                    </option>

                                    <option>pH Adjuster</option>
                                    <option>Coagulant</option>
                                    <option>Disinfectant</option>
                                    <option>Odour Control Chemical</option>
                                </select>
                            </div>


                            <!-- Usage Date -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">
                                    Usage Date
                                </label>

                                <input type="date" class="form-control">
                            </div>


                            <!-- Quantity Used -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">
                                    Quantity Used
                                </label>

                                <input
                                    type="number"
                                    class="form-control"
                                    placeholder="Enter quantity"
                                >
                            </div>


                            <!-- Unit -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">
                                    Unit
                                </label>

                                <select class="form-select">
                                    <option selected disabled>
                                        Select Unit
                                    </option>

                                    <option>Liters (L)</option>
                                    <option>Milliliters (ml)</option>
                                    <option>Kilograms (kg)</option>
                                    <option>Grams (g)</option>
                                </select>
                            </div>


                            <!-- Usage Purpose -->
                            <div class="col-12 mb-3">
                                <label class="form-label fw-semibold">
                                    Usage Purpose
                                </label>

                                <select class="form-select">
                                    <option selected disabled>
                                        Select Purpose
                                    </option>

                                    <option>Water Treatment</option>
                                    <option>pH Adjustment</option>
                                    <option>Cleaning</option>
                                    <option>Odour Control</option>
                                    <option>Regular Maintenance</option>
                                    <option>Other</option>
                                </select>
                            </div>


                            <!-- Notes -->
                            <div class="col-12 mb-4">
                                <label class="form-label fw-semibold">
                                    Notes
                                    <span class="text-muted fw-normal">
                                        (Optional)
                                    </span>
                                </label>

                                <textarea
                                    class="form-control"
                                    rows="4"
                                    placeholder="Add any additional information about this chemical usage..."
                                ></textarea>
                            </div>

                        </div>


                        <!-- Current Kit Info -->
                        <div class="border rounded p-3 mb-4">

                            <div class="d-flex justify-content-between align-items-center">

                                <div>
                                    <small class="text-muted">
                                        Current Kit
                                    </small>

                                    <h6 class="mb-0 mt-1">
                                        CK-2026-001
                                    </h6>
                                </div>


                                <div class="text-end">

                                    <small class="text-muted">
                                        Current Usage
                                    </small>

                                    <h6 class="mb-0 mt-1">
                                        <span class="badge bg-primary">
                                            2 / 4 Used
                                        </span>
                                    </h6>

                                </div>

                            </div>

                        </div>


                        <!-- Buttons -->
                        <div class="d-flex justify-content-end gap-2">

                            <a
                                href="chemical-kit-usage.html"
                                class="btn btn-outline-secondary"
                            >
                                Cancel
                            </a>


                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                <i class="fas fa-save me-2"></i>
                                Save Usage
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>


        <!-- Usage Guidelines -->
        <div class="col-lg-4 mt-4 mt-lg-0">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">
                        <i class="fas fa-circle-info text-primary me-2"></i>
                        Usage Guidelines
                    </h5>
                </div>


                <div class="card-body">

                    <div class="mb-3">
                        <h6>Record Usage</h6>

                        <p class="text-muted small mb-0">
                            Enter the amount of chemical used during your
                            wastewater treatment process.
                        </p>
                    </div>


                    <hr>


                    <div class="mb-3">
                        <h6>Keep Information Accurate</h6>

                        <p class="text-muted small mb-0">
                            Accurate records help monitor your chemical
                            consumption and kit availability.
                        </p>
                    </div>


                    <hr>


                    <div>
                        <h6>Low Stock Alerts</h6>

                        <p class="text-muted small mb-0">
                            Your dashboard will notify you when the chemical
                            kit requires replacement or refill.
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
        </div>
    </div>



    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script src="../js/script.js"></script>