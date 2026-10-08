<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile - Wateryze</title>

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
        .profile-header {
            padding: 40px 0;
            color: #000;
            margin-bottom: 10px;
        }

        .profile-card {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .profile-avatar-large {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid white;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .profile-info-item {
            padding: 15px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .profile-info-item:last-child {
            border-bottom: none;
        }

        .profile-label {
            font-weight: 600;
            color: #000;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .profile-value {
            color: #000;
            font-size: 16px;
            margin-top: 5px;
        }

        .btn-edit {
            background: #667eea;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-edit:hover {
            background: #764ba2;
            color: white;
            text-decoration: none;
        }

        .admin-badge {
            background: #667eea;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
        }

        .edit-mode {
            display: none;
        }

        .edit-mode.active {
            display: block;
        }

        .view-mode {
            display: block;
        }

        .view-mode.hidden {
            display: none;
        }
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
            <nav class="navbar">
                <div class="navbar-left">
                    <button class="menu-toggle d-lg-none" id="menuToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h2 class="page-title">Admin Profile</h2>
                </div>

                <div class="navbar-right">
                    <!-- Admin Profile Dropdown -->
                    <div class="nav-item profile-wrapper">
                        <button class="nav-link profile-btn" id="profileBtn">
                            <img src="assets/images/profile-icon.png" alt="Admin" class="profile-avatar">
                            <span class="profile-name d-none d-sm-inline">Admin</span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <!-- Profile Dropdown Menu -->
                        <div class="profile-dropdown" id="profileDropdown">
                            <a href="profile.html" class="dropdown-item active">
                                <i class="fas fa-user"></i> My Profile
                            </a>
                            <a href="settings.html" class="dropdown-item">
                                <i class="fas fa-lock"></i> Change Password
                            </a>
                            <hr class="dropdown-divider">
                            <a href="../login.html" class="dropdown-item">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- ========== TOP NAVBAR END ========== -->

            <!-- ========== PAGE CONTENT START ========== -->
            <div class="page-content">
                <!-- Profile Header -->
                <div class="profile-header">
                    <div class="container-fluid">
                        <div class="text-center">
                            <img src="assets/images/profile-icon.png" alt="Admin Avatar" class="profile-avatar-large">
                            <h1 class="fs-4">William Johnson</h1>
                            <p class="mb-2">william.johnson@wateryze.com</p>
                            <span class="admin-badge bg-primary">ADMIN</span>
                        </div>
                    </div>
                </div>

                <!-- Profile Content -->
                <div class="container-fluid">
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-lg-8">
                            <!-- Personal Information -->
                            <div class="profile-card">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h3 class="mb-0">Personal Information</h3>
                                    <button class="btn-edit bg-primary btn-sm" onclick="toggleEditMode('personal')">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                </div>

                                <!-- View Mode -->
                                <div class="view-mode" id="personalView">
                                    <div class="profile-info-item">
                                        <div class="profile-label">Full Name</div>
                                        <div class="profile-value">William Johnson</div>
                                    </div>
                                    <div class="profile-info-item">
                                        <div class="profile-label">Email Address</div>
                                        <div class="profile-value">william.johnson@wateryze.com</div>
                                    </div>
                                    <div class="profile-info-item">
                                        <div class="profile-label">Phone Number</div>
                                        <div class="profile-value">+1 (604) 555-0123</div>
                                    </div>
                                    <div class="profile-info-item">
                                        <div class="profile-label">Department</div>
                                        <div class="profile-value">System Administration</div>
                                    </div>
                                    <div class="profile-info-item">
                                        <div class="profile-label">Role</div>
                                        <div class="profile-value">System Administrator</div>
                                    </div>
                                    <div class="profile-info-item">
                                        <div class="profile-label">Location</div>
                                        <div class="profile-value">Vancouver, British Columbia, Canada</div>
                                    </div>
                                    <div class="profile-info-item">
                                        <div class="profile-label">Admin Since</div>
                                        <div class="profile-value">June 1, 2023</div>
                                    </div>
                                </div>

                                <!-- Edit Mode -->
                                <form class="edit-mode" id="personalEdit">
                                    <div class="mb-3">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" class="form-control" value="William Johnson">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" class="form-control" value="william.johnson@wateryze.com">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" value="+1 (604) 555-0123">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Department</label>
                                        <input type="text" class="form-control" value="System Administration">
                                    </div>
                                    <div class="d-flex gap-2">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> Save Changes
                                        </button>
                                        <button type="button" class="btn btn-secondary" onclick="toggleEditMode('personal')">
                                            <i class="fas fa-times"></i> Cancel
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <!-- Admin Permissions -->
                            <div class="profile-card">
                                <h3 class="mb-4">Admin Permissions</h3>
                                <div class="profile-info-item">
                                    <div class="profile-label">Manage Users</div>
                                    <div class="profile-value">
                                        <span style="background: #28a745; color: white; padding: 3px 8px; border-radius: 3px; font-size: 12px;">Enabled</span>
                                    </div>
                                </div>
                                <div class="profile-info-item">
                                    <div class="profile-label">View Reports</div>
                                    <div class="profile-value">
                                        <span style="background: #28a745; color: white; padding: 3px 8px; border-radius: 3px; font-size: 12px;">Enabled</span>
                                    </div>
                                </div>
                                <div class="profile-info-item">
                                    <div class="profile-label">Manage Subscriptions</div>
                                    <div class="profile-value">
                                        <span style="background: #28a745; color: white; padding: 3px 8px; border-radius: 3px; font-size: 12px;">Enabled</span>
                                    </div>
                                </div>
                                <div class="profile-info-item">
                                    <div class="profile-label">System Settings</div>
                                    <div class="profile-value">
                                        <span style="background: #28a745; color: white; padding: 3px 8px; border-radius: 3px; font-size: 12px;">Enabled</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Security Settings -->
                            <div class="profile-card">
                                <h3 class="mb-4">Security Settings</h3>
                                <div class="profile-info-item">
                                    <div class="profile-label">Password Status</div>
                                    <div class="profile-value">
                                        Last changed 30 days ago
                                        <a href="settings.html" class="btn-edit ms-3 bg-primary" style="padding: 5px 15px; font-size: 12px;">
                                            Change Password
                                        </a>
                                    </div>
                                </div>
                                <div class="profile-info-item" style="margin-top: 20px;">
                                    <div class="profile-label">Two-Factor Authentication</div>
                                    <div class="profile-value">
                                        <span style="background: #28a745; color: white; padding: 3px 8px; border-radius: 3px; font-size: 12px;">Enabled</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-lg-4">
                            <!-- Admin Status -->
                            <div class="profile-card">
                                <h3 class="mb-4">Admin Status</h3>
                                <div class="alert alert-success mb-3">
                                    <i class="fas fa-check-circle"></i> Account Active
                                </div>
                                <div class="profile-info-item">
                                    <div class="profile-label">Admin Level</div>
                                    <div class="profile-value">Super Administrator</div>
                                </div>
                                <div class="profile-info-item">
                                    <div class="profile-label">Access Level</div>
                                    <div class="profile-value">Full System Access</div>
                                </div>
                                <div class="profile-info-item">
                                    <div class="profile-label">Last Login</div>
                                    <div class="profile-value">Today, 2:30 PM</div>
                                </div>
                            </div>

                            <!-- Admin Statistics -->
                            <div class="profile-card">
                                <h3 class="mb-3">Admin Statistics</h3>
                                <div class="profile-info-item">
                                    <div class="profile-label">Users Managed</div>
                                    <div class="profile-value">156</div>
                                </div>
                                <div class="profile-info-item">
                                    <div class="profile-label">Reports Generated</div>
                                    <div class="profile-value">847</div>
                                </div>
                                <div class="profile-info-item">
                                    <div class="profile-label">Active Sessions</div>
                                    <div class="profile-value">12</div>
                                </div>
                            </div>

                            <!-- Quick Links -->
                            <div class="profile-card">
                                <h3 class="mb-3">Quick Links</h3>
                                <div style="display: flex; flex-direction: column; gap: 10px;">
                                    <a href="settings.html" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-cog"></i> Admin Settings
                                    </a>
                                    <a href="users.html" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-users"></i> Manage Users
                                    </a>
                                    <a href="#" class="btn btn-outline-danger btn-sm" onclick="logout()">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ========== PAGE CONTENT END ========== -->
        </div>
        <!-- ========== MAIN CONTENT END ========== -->
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Main Script -->
    <script src="js/script.js"></script>

    <script>
        // Toggle Edit Mode
        function toggleEditMode(section) {
            const viewElement = document.getElementById(section + 'View');
            const editElement = document.getElementById(section + 'Edit');

            viewElement.classList.toggle('hidden');
            editElement.classList.toggle('active');
        }

        // Logout Function
        function logout() {
            if (confirm('Are you sure you want to logout?')) {
                window.location.href = '../login.html';
            }
        }

        // Profile Button Dropdown
        const profileBtn = document.getElementById('profileBtn');
        const profileDropdown = document.getElementById('profileDropdown');

        if (profileBtn && profileDropdown) {
            profileBtn.addEventListener('click', function () {
                profileDropdown.style.display = profileDropdown.style.display === 'block' ? 'none' : 'block';
            });

            document.addEventListener('click', function (event) {
                if (!profileBtn.contains(event.target) && !profileDropdown.contains(event.target)) {
                    profileDropdown.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>
