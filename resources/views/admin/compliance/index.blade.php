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
    <link rel="stylesheet" href="../assets/css/styles.css?v=1.3">
</head>

<body>
    <div class="wrapper">
        <!-- ========== SIDEBAR START ========== -->
        <nav class="sidebar">
            <!-- Logo Section -->
            <div class="sidebar-header">
                <div class="logo-wrapper">
                    <a href="../index.html" class="logo-link">
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
                    <a href="../compliance/compliance.html" class="nav-link active">
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
                <!-- <div class="navbar-left">
                    <button class="menu-toggle d-lg-none" id="menuToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h2 class="page-title" id="pageTitle">Compliance</h2>
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

                <!-- PAGE HEADER -->
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">

                    <div>
                        <h3 class="mb-1">Compliance Management</h3>
                        <p class="text-muted mb-0">
                            Monitor customer compliance status, verification and audit readiness.
                        </p>
                    </div>

                    <a href="create-compliance.html" type="button" class="btn btn-primary mt-3 mt-md-0 btn-sm">
                        <i class="fas fa-plus me-2"></i>
                        create Compliance Record
                    </a>

                </div>


                <!-- ========== SUMMARY CARDS START ========== -->
                <section class="summary-cards mb-4">

                    <div class="row"> <!-- Total Records -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div
                                class="card stat-card h-100 bg-primary-subtle border border-primary-subtle shadow rounded-3">
                                <div class="card-body">
                                    <div class="stat-icon bg-primary"> <i class="fas fa-clipboard-check"></i> </div>
                                    <div class="stat-content">
                                        <p class="stat-label">Total Records</p>
                                        <h3 class="stat-value">1,245</h3>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Compliant -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div
                                class="card stat-card h-100 bg-success-subtle border border-success-subtle shadow rounded-3">
                                <div class="card-body">
                                    <div class="stat-icon bg-success"> <i class="fas fa-check-circle"></i> </div>
                                    <div class="stat-content">
                                        <p class="stat-label">Compliant</p>
                                        <h3 class="stat-value">1,087</h3>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Pending Verification -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div
                                class="card stat-card h-100 bg-warning-subtle border border-warning-subtle shadow rounded-3">
                                <div class="card-body">
                                    <div class="stat-icon bg-warning"> <i class="fas fa-clock"></i> </div>
                                    <div class="stat-content">
                                        <p class="stat-label">Pending Verification</p>
                                        <h3 class="stat-value">94</h3>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Non-Compliant -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div
                                class="card stat-card h-100 bg-danger-subtle border border-danger-subtle shadow rounded-3">
                                <div class="card-body">
                                    <div class="stat-icon bg-danger"> <i class="fas fa-exclamation-triangle"></i> </div>
                                    <div class="stat-content">
                                        <p class="stat-label">Non-Compliant</p>
                                        <h3 class="stat-value">64</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
                <!-- ========== SUMMARY CARDS END ========== -->

 <!-- Search and Filter Section -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Search...">
                            </div>
                            <div class="col-md-3">
                                <select class="form-select">
                                    <option selected>All Status</option>
                                    <option>Active</option>
                                    <option>Inactive</option>
                                    <option>Pending</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select">
                                    <option selected>All Roles</option>
                                    <option>Admin</option>
                                    <option>User</option>
                                    <option>Subscriber</option>
                                </select>
                            </div>
                            <div class="col-md-2">
 <button class="btn btn-primary w-100">Filter</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ========== COMPLIANCE TABLE START ========== -->
                <section>

                    <div class="card chart-card">

                        <!-- CARD HEADER -->
                        <div
                            class="card-header bg-transparent d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">

                            <div>
                                <h5 class="mb-1">Compliance Records</h5>

                                <small class="text-muted">
                                    Review and verify wastewater treatment compliance records.
                                </small>
                            </div>


                           
                        </div>


                        <!-- TABLE -->
                        <div class="table-responsive">

                            <table class="table table-hover align-middle mb-0">

                                <thead class="table-light">

                                    <tr class="table-header-blue">
                                        <th>Customer</th>
                                        <th>Site ID</th>
                                        <th>Compliance Score</th>
                                        <th>Verification</th>
                                        <th>Last Audit</th>
                                        <th>Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>

                                </thead>


                                <tbody>

                                    <!-- RECORD 1 -->
                                    <tr>

                                        <td>
                                            <strong>Blue Haven Spa</strong>

                                            <small class="text-muted d-block">
                                                Ontario
                                            </small>
                                        </td>


                                        <td>
                                            WZ-2025-001
                                        </td>


                                        <td>

                                            <span class="fw-semibold text-success">
                                                92%
                                            </span>

                                        </td>


                                        <td>

                                            <span class="badge bg-success">
                                                <i class="fas fa-check-circle me-1"></i>
                                                Verified
                                            </span>

                                        </td>


                                        <td>
                                            Jan 02, 2026
                                        </td>


                                        <td>

                                            <span class="badge bg-success">
                                                Compliant
                                            </span>

                                        </td>


                                        <td>
                                            <div class="d-flex justify-content-center align-items-center gap-2">
                                                <a href="view-compliance.html" class="btn btn-sm btn-outline-info">

                                                    <i class="fas fa-eye"></i>

                                                </a>


                                                <a href="edit-compliance.html" class="btn btn-sm btn-outline-primary">

                                                    <i class="fas fa-edit"></i>

                                                </a>
                                                 <button type="button" class="btn btn-sm btn-outline-danger"
                                                    data-bs-toggle="modal" data-bs-target="#deleteChemicalKitModal">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>

                                    </tr>


                                    <!-- RECORD 2 -->
                                    <tr>

                                        <td>

                                            <strong>Maple Brewery</strong>

                                            <small class="text-muted d-block">
                                                British Columbia
                                            </small>

                                        </td>


                                        <td>
                                            WZ-2025-002
                                        </td>


                                        <td>

                                            <span class="fw-semibold text-success">
                                                88%
                                            </span>

                                        </td>


                                        <td>

                                            <span class="badge bg-warning text-dark">
                                                <i class="fas fa-clock me-1"></i>
                                                Pending
                                            </span>

                                        </td>


                                        <td>
                                            Jan 05, 2026
                                        </td>


                                        <td>

                                            <span class="badge bg-success">
                                                Compliant
                                            </span>

                                        </td>


                                        <td>
                                            <div class="d-flex justify-content-center align-items-center gap-2">
                                                <a href="view-compliance.html" class="btn btn-sm btn-outline-info">

                                                    <i class="fas fa-eye"></i>

                                                </a>


                                                <a href="edit-compliance.html" class="btn btn-sm btn-outline-primary">

                                                    <i class="fas fa-edit"></i>

                                                </a>
                                                 <button type="button" class="btn btn-sm btn-outline-danger"
                                                    data-bs-toggle="modal" data-bs-target="#deleteChemicalKitModal">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>

                                    </tr>


                                    <!-- RECORD 3 -->
                                    <tr>

                                        <td>

                                            <strong>Crystal Waters</strong>

                                            <small class="text-muted d-block">
                                                Alberta
                                            </small>

                                        </td>


                                        <td>
                                            WZ-2025-003
                                        </td>


                                        <td>

                                            <span class="fw-semibold text-warning">
                                                71%
                                            </span>

                                        </td>


                                        <td>

                                            <span class="badge bg-warning text-dark">
                                                <i class="fas fa-clock me-1"></i>
                                                Review Required
                                            </span>

                                        </td>


                                        <td>
                                            Dec 28, 2025
                                        </td>


                                        <td>

                                            <span class="badge bg-warning text-dark">
                                                Warning
                                            </span>

                                        </td>


                                        <td>
                                            <div class="d-flex justify-content-center align-items-center gap-2">
                                                <a href="view-compliance.html" class="btn btn-sm btn-outline-info">

                                                    <i class="fas fa-eye"></i>

                                                </a>


                                                <a href="edit-compliance.html" class="btn btn-sm btn-outline-primary">

                                                    <i class="fas fa-edit"></i>

                                                </a>
                                                 <button type="button" class="btn btn-sm btn-outline-danger"
                                                    data-bs-toggle="modal" data-bs-target="#deleteChemicalKitModal">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>

                                    </tr>


                                    <!-- RECORD 4 -->
                                    <tr>

                                        <td>

                                            <strong>FreshFlow Foods</strong>

                                            <small class="text-muted d-block">
                                                Ontario
                                            </small>

                                        </td>


                                        <td>
                                            WZ-2025-004
                                        </td>


                                        <td>

                                            <span class="fw-semibold text-danger">
                                                48%
                                            </span>

                                        </td>


                                        <td>

                                            <span class="badge bg-danger">
                                                <i class="fas fa-times-circle me-1"></i>
                                                Failed
                                            </span>

                                        </td>


                                        <td>
                                            Dec 20, 2025
                                        </td>


                                        <td>

                                            <span class="badge bg-danger">
                                                Non-Compliant
                                            </span>

                                        </td>


                                        <td>
                                            <div class="d-flex justify-content-center align-items-center gap-2">
                                                <a href="view-compliance.html" class="btn btn-sm btn-outline-info">

                                                    <i class="fas fa-eye"></i>

                                                </a>


                                                <a href="edit-compliance.html" class="btn btn-sm btn-outline-primary">

                                                    <i class="fas fa-edit"></i>

                                                </a>
                                                 <button type="button" class="btn btn-sm btn-outline-danger"
                                                    data-bs-toggle="modal" data-bs-target="#deleteChemicalKitModal">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>

                                    </tr>

                                </tbody>

                            </table>

                        </div>


                        <!-- CARD FOOTER -->
                        <div
                            class="card-footer bg-transparent d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">

                            <small class="text-muted">
                                Showing 1 – 4 of 1,245 compliance records
                            </small>


                            <nav aria-label="Compliance pagination">

                                <ul class="pagination pagination-sm mb-0">

                                    <li class="page-item disabled">
                                        <a class="page-link" href="#">
                                            Previous
                                        </a>
                                    </li>

                                    <li class="page-item active">
                                        <a class="page-link" href="#">
                                            1
                                        </a>
                                    </li>

                                    <li class="page-item">
                                        <a class="page-link" href="#">
                                            2
                                        </a>
                                    </li>

                                    <li class="page-item">
                                        <a class="page-link" href="#">
                                            3
                                        </a>
                                    </li>

                                    <li class="page-item">
                                        <a class="page-link" href="#">
                                            Next
                                        </a>
                                    </li>

                                </ul>

                            </nav>

                        </div>

                    </div>

                </section>
                <!-- ========== COMPLIANCE TABLE END ========== -->

            </div>
            <!-- ========== DASHBOARD CONTENT END ========== -->
        </div>
        <!-- ========== MAIN CONTENT END ========== -->
    </div>
     <!-- DELETE CHEMICAL KIT MODAL -->
    <div class="modal fade" id="deleteChemicalKitModal" tabindex="-1" aria-labelledby="deleteChemicalKitModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <!-- HEADER -->
                <div class="modal-header">

                    <h5 class="modal-title" id="deleteChemicalKitModalLabel">

                        Delete Chemical Kit

                    </h5>


                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>

                </div>


                <!-- BODY -->
                <div class="modal-body text-center py-4">

                    <div class="mb-3">

                        <i class="fas fa-trash-alt text-danger" style="font-size: 40px;">
                        </i>

                    </div>


                    <h5 class="mb-2" style="font-size: 12px;">
                        Delete this compliance?
                    </h5>


                    <p class="text-muted mb-0" style="font-size: 12px;">

                        You are about to delete
                        <strong>WZ-2025-001</strong>.

                        This action cannot be undone.

                    </p>

                </div>



                <div class="modal-footer justify-content-center">

                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">

                        Cancel

                    </button>


                    <button type="button" class="btn btn-danger btn-sm">

                        <i class="fas fa-trash me-2"></i>

                        Yes, Delete

                    </button>

                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="../assets/js/script.js"></script>
</body>

</html>