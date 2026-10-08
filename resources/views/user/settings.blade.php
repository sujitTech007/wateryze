<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - Wateryze</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="../images/favicon.png" type="image/x-icon">

    <!-- Google Fonts - Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css?v=1.2">
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
                    <a href="index.html" class="nav-link active">
                        <i class="fas fa-chart-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="water-monitoring.html" class="nav-link">
                        <i class="fas fa-tint"></i>
                        <span>Water Monitoring</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./chemical-kits/Chemical-Kit-Usage.html" class="nav-link">
                      <i class="fas fa-flask"></i>
                        <span>Chemical Kit Usage</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="compliance.html" class="nav-link">
                        <i class="fas fa-shield-alt"></i>
                        <span>Compliance
</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="schedule.html" class="nav-link">
                        <i class="fas fa-clock"></i>
                        <span>Schedule Reminder</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./report/reports.html" class="nav-link">
                        <i class="fa-regular fa-file-lines"></i>
                        <span>Reports</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="site-location.html" class="nav-link">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Sites & Locations</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="notifications.html" class="nav-link">
                        <i class="fas fa-bell"></i>
                        <span>Notifications</span>
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
                            <img src="assets/images/profile-icon.png" alt="William" class="profile-avatar">
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
                <div class="mb-4">
                    <button class="menu-toggle d-lg-none" id="menuToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h2 class="page-title" id="pageTitle">Settings & Configuration</h2>
                </div>
                <!-- Profile Settings -->
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="chart-card">
                            <h5 class="mb-4 fw-medium">
                                <i class="fas fa-user-circle"></i> Profile Settings
                            </h5>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" value="William">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" value="Johnson">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" class="form-control" value="William@wyz.com">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Organization</label>
                                    <input type="text" class="form-control" value="Water Treatment Plant #1">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" value="+1 (555) 123-4567">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Role</label>
                                    <select class="form-select">
                                        <option selected>System Administrator</option>
                                        <option>Operator</option>
                                        <option>Technician</option>
                                        <option>Manager</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <button class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save Changes
                                </button>
                                <button class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Plant Configuration -->
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="chart-card">
                            <h5 class="mb-4 fw-medium">
                                <i class="fas fa-industry"></i> Plant Configuration
                            </h5>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Plant Name</label>
                                    <input type="text" class="form-control" value="Riverside Water Treatment">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Plant Location</label>
                                    <input type="text" class="form-control" value="123 Main Street, City, State">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Plant Capacity</label>
                                    <input type="text" class="form-control" value="1000 m³/day">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Treatment Type</label>
                                    <select class="form-select">
                                        <option selected>Biological Treatment</option>
                                        <option>Chemical Treatment</option>
                                        <option>Physical Treatment</option>
                                        <option>Hybrid</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Latitude</label>
                                    <input type="text" class="form-control" value="40.7128">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Longitude</label>
                                    <input type="text" class="form-control" value="-74.0060">
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <button class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save Changes
                                </button>
                                <button class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Alert Thresholds -->
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="chart-card">
                            <h5 class="mb-4">
                                <i class="fas fa-bell"></i> Alert Thresholds
                            </h5>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="bg-light p-3 rounded">
                                        <h6 class="mb-3">pH Level</h6>
                                        <div class="mb-2">
                                            <label class="form-label">Minimum</label>
                                            <input type="number" class="form-control" value="6.5" step="0.1">
                                        </div>
                                        <div>
                                            <label class="form-label">Maximum</label>
                                            <input type="number" class="form-control" value="7.5" step="0.1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="bg-light p-3 rounded">
                                        <h6 class="mb-3">TDS (ppm)</h6>
                                        <div class="mb-2">
                                            <label class="form-label">Warning Level</label>
                                            <input type="number" class="form-control" value="400">
                                        </div>
                                        <div>
                                            <label class="form-label">Critical Level</label>
                                            <input type="number" class="form-control" value="500">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="bg-light p-3 rounded">
                                        <h6 class="mb-3">BOD (mg/L)</h6>
                                        <div class="mb-2">
                                            <label class="form-label">Warning Level</label>
                                            <input type="number" class="form-control" value="10">
                                        </div>
                                        <div>
                                            <label class="form-label">Critical Level</label>
                                            <input type="number" class="form-control" value="15">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="bg-light p-3 rounded">
                                        <h6 class="mb-3">Temperature (°C)</h6>
                                        <div class="mb-2">
                                            <label class="form-label">Minimum</label>
                                            <input type="number" class="form-control" value="15">
                                        </div>
                                        <div>
                                            <label class="form-label">Maximum</label>
                                            <input type="number" class="form-control" value="35">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="bg-light p-3 rounded">
                                        <h6 class="mb-3">Turbidity (NTU)</h6>
                                        <div class="mb-2">
                                            <label class="form-label">Warning Level</label>
                                            <input type="number" class="form-control" value="2" step="0.1">
                                        </div>
                                        <div>
                                            <label class="form-label">Critical Level</label>
                                            <input type="number" class="form-control" value="5" step="0.1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="bg-light p-3 rounded">
                                        <h6 class="mb-3">Dissolved O₂ (mg/L)</h6>
                                        <div class="mb-2">
                                            <label class="form-label">Minimum</label>
                                            <input type="number" class="form-control" value="4" step="0.1">
                                        </div>
                                        <div>
                                            <label class="form-label">Optimal</label>
                                            <input type="number" class="form-control" value="8" step="0.1">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <button class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save Thresholds
                                </button>
                                <button class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Notification Preferences -->
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="chart-card">
                            <h5 class="mb-4 fw-medium">
                                <i class="fas fa-envelope"></i> Notification Preferences
                            </h5>
                            
                            <div class="list-group">
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1">Email Alerts</h6>
                                        <small class="text-muted">Receive critical alerts via email</small>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" checked id="emailAlerts">
                                    </div>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1">SMS Notifications</h6>
                                        <small class="text-muted">Get immediate SMS for critical issues</small>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="smsNotif">
                                    </div>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1">Daily Report</h6>
                                        <small class="text-muted">Receive daily summary at 8:00 AM</small>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" checked id="dailyReport">
                                    </div>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1">System Maintenance Alerts</h6>
                                        <small class="text-muted">Notifications for scheduled maintenance</small>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" checked id="maintAlert">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- System Settings -->
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="chart-card">
                            <h5 class="mb-4 fw-medium">
                                <i class="fas fa-sliders-h"></i> System Settings
                            </h5>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Language</label>
                                    <select class="form-select">
                                        <option selected>English</option>
                                        <option>Spanish</option>
                                        <option>French</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Time Zone</label>
                                    <select class="form-select">
                                        <option selected>UTC-5 (EST)</option>
                                        <option>UTC (GMT)</option>
                                        <option>UTC+1 (CET)</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Data Retention</label>
                                    <select class="form-select">
                                        <option>30 days</option>
                                        <option>90 days</option>
                                        <option selected>1 year</option>
                                        <option>Unlimited</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Measurement Units</label>
                                    <select class="form-select">
                                        <option selected>Metric (°C, mg/L)</option>
                                        <option>Imperial (°F, ppm)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <button class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save Settings
                                </button>
                                <button class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Account & Security -->
                <div class="row">
                    <div class="col-12">
                        <div class="chart-card">
                            <h5 class="mb-4 fw-medium">
                                <i class="fas fa-lock"></i> Account & Security
                            </h5>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="bg-light p-4 rounded">
                                        <h6 class="mb-3">Change Password</h6>
                                        <div class="mb-3">
                                            <label class="form-label">Current Password</label>
                                            <input type="password" class="form-control" placeholder="Enter current password">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">New Password</label>
                                            <input type="password" class="form-control" placeholder="Enter new password">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" placeholder="Confirm new password">
                                        </div>
                                        <button class="btn btn-primary">
                                            <i class="fas fa-save"></i> Update Password
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="bg-light p-4 rounded">
                                        <h6 class="mb-2">Two-Factor Authentication</h6>
                                        <p class="text-muted small mb-3">Add extra security to your account</p>
                                        <button class="btn btn-primary">
                                            <i class="fas fa-shield-alt"></i> Enable 2FA
                                        </button>
                                    </div>
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
       <script src="assets/js/script.js"></script>
</body>
</html>
