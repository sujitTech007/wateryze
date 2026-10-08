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

                    <h2 class="page-title" id="pageTitle">partner lab</h2>

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



                <!-- ========== PAGE HEADER START ========== -->

                <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">

                    <div>

                        <h3 class=" mb-1">Partner Labs</h3>

                        <p class="text-muted mb-0">

                            Manage partner water laboratories and onboarding.

                        </p>

                    </div>



                    <a href="create-partner-lab.html" class="btn btn-primary mt-3 mt-md-0 btn-sm">

                        <i class="fas fa-plus me-2"></i> create Partner Lab

                    </a>

                </div>

                <!-- ========== PAGE HEADER END ========== -->





                <!-- ========== SUMMARY CARDS START ========== -->

                <section class="mb-4">

                    <div class="row"> <!-- Total Labs -->

                        <div class="col-lg-3 col-md-6 mb-3">

                            <div class="card shadow h-100 bg-primary-subtle border border-primary-subtle rounded-3">

                                <div class="card-body d-flex align-items-center">

                                    <div class="bg-primary text-white rounded p-3 me-3"> <i

                                            class="fas fa-flask fa-lg"></i> </div>

                                    <div>

                                        <p class="text-muted mb-1" style="font-size: 12px;">Total Labs</p>

                                        <h4 class="mb-0">48</h4>

                                    </div>

                                </div>

                            </div>

                        </div> <!-- Active Labs -->

                        <div class="col-lg-3 col-md-6 mb-3">

                            <div class="card shadow h-100 bg-success-subtle border border-success-subtle rounded-3">

                                <div class="card-body d-flex align-items-center">

                                    <div class="bg-success text-white rounded p-3 me-3"> <i

                                            class="fas fa-check-circle fa-lg"></i> </div>

                                    <div>

                                        <p class="text-muted mb-1" style="font-size: 12px;">Active Labs</p>

                                        <h4 class="mb-0">35</h4>

                                    </div>

                                </div>

                            </div>

                        </div> <!-- Pending Verification -->

                        <div class="col-lg-3 col-md-6 mb-3">

                            <div class="card shadow h-100 bg-warning-subtle border border-warning-subtle rounded-3">

                                <div class="card-body d-flex align-items-center">

                                    <div class="bg-warning text-white rounded p-3 me-3"> <i

                                            class="fas fa-clock fa-lg"></i> </div>

                                    <div>

                                        <p class="text-muted mb-1" style="font-size: 12px;">Pending Verification</p>

                                        <h4 class="mb-0">9</h4>

                                    </div>

                                </div>

                            </div>

                        </div> <!-- Inactive Labs -->

                        <div class="col-lg-3 col-md-6 mb-3">

                            <div

                                class="card shadow h-100 bg-secondary-subtle border border-secondary-subtle rounded-3">

                                <div class="card-body d-flex align-items-center">

                                    <div class="bg-secondary text-white rounded p-3 me-3"> <i

                                            class="fas fa-ban fa-lg"></i> </div>

                                    <div>

                                        <p class="text-muted mb-1" style="font-size: 12px;">Inactive Labs</p>

                                        <h4 class="mb-0">4</h4>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </section>

                <!-- ========== SUMMARY CARDS END ========== -->





                <!-- ========== PARTNER LAB TABLE START ========== -->

                <section class="mb-4">

                    <div class="card border-0 shadow-sm">



                        <div class="card-header bg-white border-0 p-4">

                            <div class="row align-items-center g-3">



                                <div class="col-lg-5">

                                    <h5 class=" mb-1">Partner Laboratory Records</h5>

                                    <p class="text-muted small mb-0">

                                        View and manage registered laboratory partners.

                                    </p>

                                </div>



                                <div class="col-lg-7">

                                    <div class="row g-2">



                                        <div class="col-md-5">

                                            <input type="text" class="form-control" placeholder="Search lab...">

                                        </div>



                                        <div class="col-md-4">

                                            <select class="form-select">

                                                <option selected>All Status</option>

                                                <option>Active</option>

                                                <option>Pending</option>

                                                <option>Inactive</option>

                                            </select>

                                        </div>



                                        <div class="col-md-3">

                                            <button class="btn btn-primary w-100">

                                                <i class="fas fa-filter me-1"></i> Filter

                                            </button>

                                        </div>



                                    </div>

                                </div>



                            </div>

                        </div>



                        <div class="table-responsive">

                            <table class="table table-hover align-middle mb-0">



                                <thead class="table-light">

                                    <tr class="table-header-blue">

                                        <th class="px-4">Lab ID</th>

                                        <th>Laboratory Name</th>

                                        <th>Location</th>

                                        <th>Contact Person</th>

                                        <th>Onboarding Date</th>

                                        <th>Status</th>

                                        <th class="text-center">Actions</th>

                                    </tr>

                                </thead>



                                <tbody>



                                    <tr>

                                        <td class="px-4 fw-semibold">#LAB-1001</td>

                                        <td>

                                            <div class="fw-semibold">ClearWater Analytics</div>

                                            <small class="text-muted">Water Testing Laboratory</small>

                                        </td>

                                        <td>Toronto, Ontario</td>

                                        <td>Sarah Mitchell</td>

                                        <td>Sep 02, 2026</td>

                                        <td>

                                            <span class="badge bg-success">Active</span>

                                        </td>

                                        <td>

                                            <div class="d-flex justify-content-center align-items-center gap-2">

                                                <a href="view-partner-lab.html" class="btn btn-sm btn-outline-info"

                                                    title="View">

                                                    <i class="fas fa-eye"></i>

                                                </a>

                                                <a href="edit-partner-lab.html" class="btn btn-sm btn-outline-primary"

                                                    title="Edit">

                                                    <i class="fas fa-edit"></i>

                                                </a>

                                                  <button type="button" class="btn btn-sm btn-outline-danger"

                                                    data-bs-toggle="modal" data-bs-target="#deleteChemicalKitModal">

                                                    <i class="fas fa-trash"></i>

                                                </button>

                                            </div>

                                        </td>

                                    </tr>



                                    <tr>

                                        <td class="px-4 fw-semibold">#LAB-1002</td>

                                        <td>

                                            <div class="fw-semibold">Pacific Water Labs</div>

                                            <small class="text-muted">Environmental Testing</small>

                                        </td>

                                        <td>Vancouver, BC</td>

                                        <td>Michael Brown</td>

                                        <td>Sep 05, 2026</td>

                                        <td>

                                            <span class="badge bg-success">Active</span>

                                        </td>

                                        <td>

                                            <div class="d-flex justify-content-center align-items-center gap-2">

                                                <a href="view-partner-lab.html" class="btn btn-sm btn-outline-info"

                                                    title="View">

                                                    <i class="fas fa-eye"></i>

                                                </a>

                                                <a href="edit-partner-lab.html" class="btn btn-sm btn-outline-primary"

                                                    title="Edit">

                                                    <i class="fas fa-edit"></i>

                                                </a>

                                                  <button type="button" class="btn btn-sm btn-outline-danger"

                                                    data-bs-toggle="modal" data-bs-target="#deleteChemicalKitModal">

                                                    <i class="fas fa-trash"></i>

                                                </button>

                                            </div>

                                        </td>

                                    </tr>



                                    <tr>

                                        <td class="px-4 fw-semibold">#LAB-1003</td>

                                        <td>

                                            <div class="fw-semibold">Ontario Eco Testing</div>

                                            <small class="text-muted">Compliance Laboratory</small>

                                        </td>

                                        <td>Ottawa, Ontario</td>

                                        <td>Emily Wilson</td>

                                        <td>Sep 10, 2026</td>

                                        <td>

                                            <span class="badge bg-warning text-dark">Pending</span>

                                        </td>

                                        <td>

                                            <div class="d-flex justify-content-center align-items-center gap-2">

                                                <a href="view-partner-lab.html" class="btn btn-sm btn-outline-info"

                                                    title="View">

                                                    <i class="fas fa-eye"></i>

                                                </a>

                                                <a href="edit-partner-lab.html" class="btn btn-sm btn-outline-primary"

                                                    title="Edit">

                                                    <i class="fas fa-edit"></i>

                                                </a>

                                                  <button type="button" class="btn btn-sm btn-outline-danger"

                                                    data-bs-toggle="modal" data-bs-target="#deleteChemicalKitModal">

                                                    <i class="fas fa-trash"></i>

                                                </button>

                                            </div>

                                        </td>

                                    </tr>



                                    <tr>

                                        <td class="px-4 fw-semibold">#LAB-1004</td>

                                        <td>

                                            <div class="fw-semibold">Alberta Water Science</div>

                                            <small class="text-muted">Water Quality Testing</small>

                                        </td>

                                        <td>Calgary, Alberta</td>

                                        <td>David Taylor</td>

                                        <td>Sep 12, 2026</td>

                                        <td>

                                            <span class="badge bg-warning text-dark">Pending</span>

                                        </td>

                                        <td>

                                            <div class="d-flex justify-content-center align-items-center gap-2">

                                                <a href="view-partner-lab.html" class="btn btn-sm btn-outline-info"

                                                    title="View">

                                                    <i class="fas fa-eye"></i>

                                                </a>

                                                <a href="edit-partner-lab.html" class="btn btn-sm btn-outline-primary"

                                                    title="Edit">

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



                        <!-- Pagination -->

                        <div class="card-footer bg-white border-0 p-4">

                            <div class="d-flex flex-wrap justify-content-between align-items-center">



                                <small class="text-muted">

                                    Showing 1 to 4 of 48 laboratories

                                </small>



                                <nav class="mt-2 mt-md-0">

                                    <ul class="pagination pagination-sm mb-0">

                                        <li class="page-item disabled">

                                            <a class="page-link" href="#">Previous</a>

                                        </li>

                                        <li class="page-item active">

                                            <a class="page-link" href="#">1</a>

                                        </li>

                                        <li class="page-item">

                                            <a class="page-link" href="#">2</a>

                                        </li>

                                        <li class="page-item">

                                            <a class="page-link" href="#">3</a>

                                        </li>

                                        <li class="page-item">

                                            <a class="page-link" href="#">Next</a>

                                        </li>

                                    </ul>

                                </nav>



                            </div>

                        </div>



                    </div>

                </section>

                <!-- ========== PARTNER LAB TABLE END ========== -->





                <!-- ========== LAB MANAGEMENT INFORMATION START ========== -->

                <section>

                    <div class="row">



                       



                    </div>

                </section>

                <!-- ========== LAB MANAGEMENT INFORMATION END ========== -->



            </div>

            <!-- ========== DASHBOARD CONTENT END ========== -->

        </div>

        <!-- ========== MAIN CONTENT END ========== -->

    </div>

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

                        Delete this partner-lab?

                    </h5>





                    <p class="text-muted mb-0" style="font-size: 12px;">



                        You are about to delete

                        <strong>CK-2025-001</strong>.



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