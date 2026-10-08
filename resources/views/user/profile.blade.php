<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - Wateryze</title>

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

    <style>
        .profile-header {
            padding: 40px 0;
            color: #000;
            margin-bottom: 40px;
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
            color: #333;
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

        .form-section {
            margin-top: 30px;
        }

        .form-section h3 {
            color: #333;
            margin-bottom: 20px;
            font-weight: 600;
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
            <nav class="navbar">
                <div class="navbar-left">
                    <button class="menu-toggle d-lg-none" id="menuToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h2 class="page-title">My Profile</h2>
                </div>

                <div class="navbar-right">
                    <!-- User Profile Dropdown -->
                    <div class="nav-item profile-wrapper">
                        <button class="nav-link profile-btn" id="profileBtn">
                            <img src="assets/images/profile-icon.png" alt="User" class="profile-avatar">
                            <span class="profile-name d-none d-sm-inline">User Name</span>
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

            <!-- ========== PAGE CONTENT START ========== -->
            <div class="page-content">
                <!-- Profile Header -->
                <div class="profile-header">
                    <div class="container-fluid">
                        <div class="text-center">
                            <img src="assets/images/profile-icon.png" alt="Profile Avatar" class="profile-avatar-large">
                            <h1>John Doe</h1>
                            <p class="mb-0">john.doe@wateryze.com</p>
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
                                    <button class="btn-edit" onclick="toggleEditMode('personal')">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                </div>

                                <!-- View Mode -->
                                <div class="view-mode" id="personalView">
                                    <div class="profile-info-item">
                                        <div class="profile-label">Full Name</div>
                                        <div class="profile-value">John Doe</div>
                                    </div>
                                    <div class="profile-info-item">
                                        <div class="profile-label">Email Address</div>
                                        <div class="profile-value">john.doe@wateryze.com</div>
                                    </div>
                                    <div class="profile-info-item">
                                        <div class="profile-label">Phone Number</div>
                                        <div class="profile-value">+1 (555) 123-4567</div>
                                    </div>
                                    <div class="profile-info-item">
                                        <div class="profile-label">Company Name</div>
                                        <div class="profile-value">Acme Brewery Ltd.</div>
                                    </div>
                                    <div class="profile-info-item">
                                        <div class="profile-label">Industry</div>
                                        <div class="profile-value">Beverage Manufacturing</div>
                                    </div>
                                    <div class="profile-info-item">
                                        <div class="profile-label">Location</div>
                                        <div class="profile-value">Vancouver, British Columbia, Canada</div>
                                    </div>
                                    <div class="profile-info-item">
                                        <div class="profile-label">Member Since</div>
                                        <div class="profile-value">January 15, 2024</div>
                                    </div>
                                </div>

                                <!-- Edit Mode -->
                                <form class="edit-mode" id="personalEdit">
                                    <div class="mb-3">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" class="form-control" value="John Doe">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" class="form-control" value="john.doe@wateryze.com">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" value="+1 (555) 123-4567">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Company Name</label>
                                        <input type="text" class="form-control" value="Acme Brewery Ltd.">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Industry</label>
                                        <input type="text" class="form-control" value="Beverage Manufacturing">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Location</label>
                                        <input type="text" class="form-control" value="Vancouver, British Columbia, Canada">
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

                            <!-- Security Settings -->
                            <div class="profile-card">
                                <h3 class="mb-4">Security Settings</h3>
                                <div class="profile-info-item">
                                    <div class="profile-label">Password Status</div>
                                    <div class="profile-value">
                                        Last changed 60 days ago
                                        <a href="settings.html" class="btn-edit ms-3" style="padding: 5px 15px; font-size: 12px;">
                                            Change Password
                                        </a>
                                    </div>
                                </div>
                                <div class="profile-info-item" style="margin-top: 20px;">
                                    <div class="profile-label">Two-Factor Authentication</div>
                                    <div class="profile-value">
                                        <span style="background: #ffc107; color: white; padding: 3px 8px; border-radius: 3px; font-size: 12px;">Disabled</span>
                                        <a href="settings.html" class="btn-edit ms-3" style="padding: 5px 15px; font-size: 12px;">
                                            Enable 2FA
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-lg-4">
                            <!-- Account Status -->
                            <div class="profile-card">
                                <h3 class="mb-4">Account Status</h3>
                                <div class="alert alert-info mb-3">
                                    <i class="fas fa-check-circle"></i> Account Active
                                </div>
                                <div class="profile-info-item">
                                    <div class="profile-label">Subscription Plan</div>
                                    <div class="profile-value">Professional</div>
                                </div>
                                <div class="profile-info-item">
                                    <div class="profile-label">Renewal Date</div>
                                    <div class="profile-value">April 15, 2025</div>
                                </div>
                                <div class="profile-info-item">
                                    <div class="profile-label">Billing Status</div>
                                    <div class="profile-value">
                                        <span style="background: #28a745; color: white; padding: 3px 8px; border-radius: 3px; font-size: 12px;">Paid</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Quick Links -->
                            <div class="profile-card">
                                <h3 class="mb-3">Quick Links</h3>
                                <div style="display: flex; flex-direction: column; gap: 10px;">
                                    <a href="settings.html" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-cog"></i> Account Settings
                                    </a>
                                    <a href="notifications.html" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-bell"></i> Notifications
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
       <script src="assets/js/script.js"></script>

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
