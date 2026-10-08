<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users - Wateryze Admin Dashboard</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="icon" href="../images/favicon.png" type="image/x-icon">

    <!-- Google Fonts - Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
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
                    <img src="../assets/images/profile-icon.png"
                        alt="Admin"
                        class="profile-avatar">

                    <span class="profile-name d-none d-sm-inline">
                        Admin
                    </span>

                    <i class="fas fa-chevron-down"></i>
                </button>

                <div class="profile-dropdown" id="profileDropdown">

                    <a href="profile.html" class="dropdown-item">
                        <i class="fas fa-user"></i>
                        My Profile
                    </a>

                    <a href="settings.html" class="dropdown-item">
                        <i class="fas fa-lock"></i>
                        Change Password
                    </a>

                    <hr class="dropdown-divider">

                    <a href="login.html"
                        class="dropdown-item text-danger">

                        <i class="fas fa-sign-out-alt"></i>
                        Logout

                    </a>

                </div>
            </div>

        </div>
    </nav>
    <!-- ========== TOP NAVBAR END ========== -->


    <!-- ========== EDIT USER CONTENT START ========== -->
    <div class="content-area">

        <!-- Page Header -->
        <div class="d-flex flex-column flex-md-row
                    justify-content-between
                    align-items-md-center
                    mb-4">

            <div>



                <h3 class="mb-1">Edit User</h3>

                <p class="text-muted mb-0">
                    Update user information and account permissions
                </p>

            </div>
                            <a href="users.html"
                    class="btn btn-sm btn-outline-secondary mb-3">

                    <i class="fas fa-arrow-left me-1"></i>
                    Back to Users

                </a>

        </div>


        <!-- Edit User Form -->
        <form>

            <div class="row g-4">

                <!-- Left Column -->
                <div class="col-lg-8">


                    <!-- User Information Card -->
                    <div class="card shadow-sm border-0 mb-4">

                        <div class="card-header bg-white py-3">

                            <h5 class="mb-1">
                                <i class="fas fa-user me-2 text-primary"></i>
                                User Information
                            </h5>

                            <small class="text-muted">
                                Update the user's personal information
                            </small>

                        </div>


                        <div class="card-body p-4">


                            <!-- Profile -->
                            <div class="d-flex align-items-center mb-4">

                                <img src="../assets/images/profile-icon.png"
                                    alt="User"
                                    class="rounded-circle me-3"
                                    width="90"
                                    height="90">

                                <div>

                                    <h6 class="mb-1">
                                        John Doe
                                    </h6>

                                    <small class="text-muted d-block mb-2">
                                        User Profile Image
                                    </small>

                                    <button type="button"
                                        class="btn btn-sm btn-outline-primary">

                                        <i class="fas fa-upload me-1"></i>
                                        Change Photo

                                    </button>

                                </div>

                            </div>


                            <div class="row g-3">

                                <!-- Full Name -->
                                <div class="col-md-6">

                                    <label class="form-label">
                                        Full Name
                                    </label>

                                    <input type="text"
                                        class="form-control"
                                        value="John Doe">

                                </div>


                                <!-- Email -->
                                <div class="col-md-6">

                                    <label class="form-label">
                                        Email Address
                                    </label>

                                    <input type="email"
                                        class="form-control"
                                        value="john.doe@example.com">

                                </div>


                                <!-- Phone -->
                                <div class="col-md-6">

                                    <label class="form-label">
                                        Phone Number
                                    </label>

                                    <input type="tel"
                                        class="form-control"
                                        placeholder="+1 000 000 0000">

                                </div>


                                <!-- Company -->
                                <div class="col-md-6">

                                    <label class="form-label">
                                        Company / Organization
                                    </label>

                                    <input type="text"
                                        class="form-control"
                                        placeholder="Enter company name">

                                </div>

                            </div>

                        </div>

                    </div>



                    <!-- Account Settings -->
                    <div class="card shadow-sm border-0">

                        <div class="card-header bg-white py-3">

                            <h5 class="mb-1">
                                <i class="fas fa-cog me-2 text-primary"></i>
                                Account Settings
                            </h5>

                            <small class="text-muted">
                                Manage user role and account status
                            </small>

                        </div>


                        <div class="card-body p-4">

                            <div class="row g-3">


                                <!-- Role -->
                                <div class="col-md-6">

                                    <label class="form-label">
                                        User Role
                                    </label>

                                    <select class="form-select">

                                        <option>Admin</option>
                                        <option selected>User</option>
                                        <option>Subscriber</option>

                                    </select>

                                </div>


                                <!-- Status -->
                                <div class="col-md-6">

                                    <label class="form-label">
                                        Account Status
                                    </label>

                                    <select class="form-select">

                                        <option selected>Active</option>
                                        <option>Inactive</option>
                                        <option>Pending</option>

                                    </select>

                                </div>


                                <!-- Notifications -->
                                <div class="col-12">

                                    <div class="form-check form-switch mt-2">

                                        <input class="form-check-input"
                                            type="checkbox"
                                            id="emailNotifications"
                                            checked>

                                        <label class="form-check-label"
                                            for="emailNotifications">

                                            Enable email notifications for this user

                                        </label>

                                    </div>

                                </div>


                            </div>

                        </div>

                    </div>

                </div>



                <!-- Right Column -->
                <div class="col-lg-4">


                    <!-- Account Details -->
                    <div class="card shadow-sm border-0 mb-4">

                        <div class="card-header bg-white py-3">

                            <h5 class="mb-0">
                                Account Details
                            </h5>

                        </div>


                        <div class="card-body">

                            <!-- User ID -->
                            <div class="mb-3">

                                <small class="text-muted d-block">
                                    User ID
                                </small>

                                <span class=">
                                    #USR-001
                                </span>

                            </div>


                            <hr>


                            <!-- Joined -->
                            <div class="mb-3">

                                <small class="text-muted d-block">
                                    Joined Date
                                </small>

                                <span class=">
                                    Jan 2, 2026
                                </span>

                            </div>


                            <hr>


                            <!-- Last Login -->
                            <div class="mb-3">

                                <small class="text-muted d-block">
                                    Last Login
                                </small>

                                <span class=">
                                    Sep 3, 2026
                                </span>

                            </div>


                            <hr>


                            <!-- Current Status -->
                            <div>

                                <small class="text-muted d-block mb-2">
                                    Current Status
                                </small>

                                <span class="badge bg-success px-3 py-2">
                                    Active
                                </span>

                            </div>

                        </div>

                    </div>



                    <!-- User Activity -->
                    <div class="card shadow-sm border-0">

                        <div class="card-header bg-white py-3">

                            <h5 class="mb-0">
                                User Activity
                            </h5>

                        </div>


                        <div class="card-body">

                            <div class="d-flex mb-3">

                                <div class="me-3 text-primary">

                                    <i class="fas fa-sign-in-alt"></i>

                                </div>

                                <div>

                                    <small class= d-block">
                                        Last Login
                                    </small>

                                    <small class="text-muted">
                                        Sep 3, 2026 at 10:30 AM
                                    </small>

                                </div>

                            </div>


                            <div class="d-flex">

                                <div class="me-3 text-success">

                                    <i class="fas fa-user-check"></i>

                                </div>

                                <div>

                                    <small class= d-block">
                                        Account Active
                                    </small>

                                    <small class="text-muted">
                                        User account is currently active
                                    </small>

                                </div>

                            </div>

                        </div>

                    </div>


                </div>

            </div>



            <!-- Action Buttons -->
            <div class="d-flex justify-content-end gap-2 mt-4">

                <a href="users.html"
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
    <!-- ========== EDIT USER CONTENT END ========== -->

</div>
        <!-- ========== MAIN CONTENT END ========== -->
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script src="script.js"></script>
</body>
</html>
