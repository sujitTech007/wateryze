<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Settings - Wateryze Admin Dashboard</title>

    

    <!-- Bootstrap 5 CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    

    <!-- Font Awesome Icons -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <link rel="icon" href="../images/favicon.png" type="image/x-icon">



    <!-- Google Fonts - Poppins -->

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    

    <!-- Custom CSS -->

<link rel="stylesheet" href="assets/css/styles.css?v=1.3">    

    <style>

       

    </style>

</head>

<body>

    <div class="wrapper">

        <!-- ========== SIDEBAR START ========== -->

          <nav class="sidebar">

            <!-- Logo Section -->

            <div class="sidebar-header">

                <div class="logo-wrapper">

                    <a href="index.html" class="logo-link">

                        <img src="assets/images/logo.png" alt="Wateryze Logo"

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

                    <a href="index.html" class="nav-link">

                        <i class="fas fa-chart-line"></i>

                        <span>Dashboard</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="./user/users.html" class="nav-link">

                        <i class="fas fa-users"></i>

                        <span>Users</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="water-usage.html" class="nav-link">

                        <i class="fas fa-water"></i>

                        <span>Water Usage</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="./chemical-kits/chemical-kits.html" class="nav-link">

                       <i class="fas fa-flask"></i>

                        <span>Chemical Kits</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="./compliance/compliance.html" class="nav-link">

                        <i class="fas fa-clipboard-check"></i>

                        <span>Compliance</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="./kit-delivery/kit-delivery.html" class="nav-link">

                          <i class="fas fa-box-open"></i>

                        <span>Kit delivery</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="./subscription/subscriptions.html" class="nav-link">

                        <i class="fas fa-credit-card"></i>

                        <span>Subscriptions</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="subscription_plan.html" class="nav-link">

                        <i class="fas fa-file-invoice-dollar "></i>

                        <span>Subscriptions Plan</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="./billing/billing.html" class="nav-link">

                         <i class="fas fa-file-invoice-dollar"></i>

                        <span>Billing</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="reports.html" class="nav-link">

                        <i class="fa-regular fa-file-lines"></i>

                        <span>Reports</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="./partner-lab/partner-labs.html" class="nav-link">

                        <i class="fas fa-flask"></i>

                        <span>Partner labs</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="./technician/technician.html" class="nav-link">

                        <i class="fas fa-user-cog"></i>

                        <span>Technician</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="settings.html" class="nav-link active">

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

            <nav class="navbar">

                <div class="navbar-left">

                    <button class="menu-toggle d-lg-none" id="menuToggle">

                        <i class="fas fa-bars"></i>

                    </button>

                    <h2 class="page-title">Settings</h2>

                </div>



                <div class="navbar-right">

                    <!-- Notifications -->

                    <!-- <div class="nav-item notification-wrapper">

                        <button class="nav-link notification-btn" id="notificationBtn">

                            <i class="fas fa-bell"></i>

                            <span class="notification-badge">3</span>

                        </button>

                        <div class="notification-dropdown" id="notificationDropdown">

                            <div class="dropdown-header">

                                <h6>Notifications</h6>

                                <a href="#" class="text-primary small">Mark all as read</a>

                            </div>

                            <div class="notification-list">

                                <div class="notification-item unread">

                                    <div class="notification-icon bg-primary">

                                        <i class="fas fa-user-plus"></i>

                                    </div>

                                    <div class="notification-content">

                                        <p>New user registered</p>

                                        <small>2 minutes ago</small>

                                    </div>

                                </div>

                                <div class="notification-item unread">

                                    <div class="notification-icon bg-warning">

                                        <i class="fas fa-exclamation-triangle"></i>

                                    </div>

                                    <div class="notification-content">

                                        <p>High water usage alert</p>

                                        <small>15 minutes ago</small>

                                    </div>

                                </div>

                                <div class="notification-item">

                                    <div class="notification-icon bg-success">

                                        <i class="fas fa-check-circle"></i>

                                    </div>

                                    <div class="notification-content">

                                        <p>System maintenance completed</p>

                                        <small>1 hour ago</small>

                                    </div>

                                </div>

                            </div>

                            <div class="dropdown-footer">

                                <a href="#">View all notifications</a>

                            </div>

                        </div>

                    </div> -->



                    <!-- Admin Profile Dropdown -->

                    <div class="nav-item profile-wrapper">

                        <button class="nav-link profile-btn" id="profileBtn">

                            <img src="assets/images/profile-icon.png" alt="Admin" class="profile-avatar">

                            <span class="profile-name d-none d-sm-inline">Admin</span>

                            <i class="fas fa-chevron-down"></i>

                        </button>

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



            <!-- ========== SETTINGS CONTENT START ========== -->

            <div class="content-area">

                <div class="row">

                    <!-- Settings Navigation -->

                    <!-- <div class="col-lg-3 mb-4">

                        <nav class="settings-nav">

                            <a href="#" class="nav-link active" data-target="general">

                                <i class="fas fa-sliders-h me-2"></i> General Settings

                            </a>

                            <a href="#" class="nav-link" data-target="security">

                                <i class="fas fa-shield-alt me-2"></i> Security

                            </a>

                            <a href="#" class="nav-link" data-target="notifications">

                                <i class="fas fa-bell me-2"></i> Notifications

                            </a>

                            <a href="#" class="nav-link" data-target="integrations">

                                <i class="fas fa-plug me-2"></i> Integrations

                            </a>

                            <a href="#" class="nav-link" data-target="billing">

                                <i class="fas fa-credit-card me-2"></i> Billing

                            </a>

                            <a href="#" class="nav-link" data-target="system">

                                <i class="fas fa-cogs me-2"></i> System

                            </a> -->

                        <!-- </nav>

                    </div> -->



                    <!-- Settings Content -->

                  <div class="col-lg-12">

    <div class="settings-content">



        <div class="row">



            <!-- General Settings -->

            <div class="col-md-6 mb-4">

                <div class="card h-100">

                    <div class="card-body">



                        <h4 class="mb-4">General Settings</h4>



                        <div class="mb-4">

                            <h6>Platform Information</h6>



                            <div class="mb-3">

                                <label class="form-label">Platform Name</label>

                                <input type="text" class="form-control" value="Wateryze" readonly>

                            </div>



                            <div class="mb-3">

                                <label class="form-label">Version</label>

                                <input type="text" class="form-control" value="v2.1.0" readonly>

                            </div>



                            <div class="mb-3">

                                <label class="form-label">Support Email</label>

                                <input type="email" class="form-control" value="support@wateryze.com">

                            </div>



                            <div class="mb-3">

                                <label class="form-label">Contact Phone</label>

                                <input type="tel" class="form-control" value="+1 (555) 123-4567">

                            </div>

                        </div>



                        <div class="mb-4">

                            <h6>Regional Settings</h6>



                            <div class="mb-3">

                                <label class="form-label">Timezone</label>

                                <select class="form-select">

                                    <option>UTC</option>

                                    <option selected>GMT-5 (Eastern Time)</option>

                                    <option>GMT-6 (Central Time)</option>

                                </select>

                            </div>



                            <div class="mb-3">

                                <label class="form-label">Language</label>

                                <select class="form-select">

                                    <option selected>English</option>

                                    <option>Spanish</option>

                                    <option>French</option>

                                </select>

                            </div>

                        </div>



                        <div class="mb-4">

                            <h6>Preferences</h6>



                            <div class="mb-3">

                                <div class="toggle-switch">

                                    <input type="checkbox" id="emailNotif" checked>

                                    <label for="emailNotif" class="mb-0"style="font-size:13px">

                                        Send email notifications

                                    </label>

                                </div>

                            </div>



                            <div class="mb-3">

                                <div class="toggle-switch">

                                    <input type="checkbox" id="smsNotif">

                                    <label for="smsNotif" class="mb-0"style="font-size:13px">

                                        Send SMS alerts

                                    </label>

                                </div>

                            </div>

                        </div>



                        <button class="btn btn-primary" style="font-size: 13px;">

                            <i class="fas fa-save me-2"></i> Save Changes

                        </button>



                        <button class="btn btn-outline-secondary ms-2" style="font-size: 13px;">

                            Reset

                        </button>



                    </div>

                </div>

            </div>





            <!-- Security Settings -->

            <div class="col-md-6 mb-4">

                <div class="card h-100">

                    <div class="card-body">



                        <h4 class="mb-4">Security Settings</h4>



                        <div class="mb-4">

                            <h6>Password</h6>



                            <div class="mb-3">

                                <label class="form-label">Current Password</label>

                                <input type="password" class="form-control">

                            </div>



                            <div class="mb-3">

                                <label class="form-label">New Password</label>

                                <input type="password" class="form-control">

                            </div>



                            <div class="mb-3">

                                <label class="form-label">Confirm Password</label>

                                <input type="password" class="form-control">

                            </div>

                        </div>



                        <div class="mb-4">

                            <h6>Two-Factor Authentication</h6>



                            <div class="mb-3">

                                <div class="toggle-switch">

                                    <input type="checkbox" id="twoFactor">

                                    <label for="twoFactor" class="mb-0"style="font-size:13px">

                                        Enable 2FA

                                    </label>

                                </div>

                            </div>



                            <small class="text-muted">

                                Enhance your account security with two-factor authentication

                            </small>

                        </div>



                        <div class="mb-4">

                            <h6>Active Sessions</h6>



                            <div class="alert alert-info mb-3">

                                <i class="fas fa-info-circle me-2"></i>

                                You have 2 active sessions

                            </div>



                            <button class="btn btn-danger" style="font-size: 13px;">

                                Logout All Sessions

                            </button>

                        </div>



                        <button class="btn btn-primary" style="font-size: 13px;">

                            <i class="fas fa-save me-2"></i> Update Security

                        </button>



                    </div>

                </div>

            </div>



        </div>



    </div>

</div>

                </div>

            </div>

            <!-- ========== SETTINGS CONTENT END ========== -->

        </div>

        <!-- ========== MAIN CONTENT END ========== -->

    </div>



    <!-- Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    

    <!-- Custom JavaScript -->

       <script src="assets/js/script.js"></script>

    

</body>

</html>

