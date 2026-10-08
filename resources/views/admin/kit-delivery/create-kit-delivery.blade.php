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

    <!-- PAGE HEADER -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">

        <div>
            <h3 class="mb-1">Create Kit Delivery</h3>
            <p class="text-muted mb-0">
                Create a new chemical kit delivery for a customer.
            </p>
        </div>

        <a href="kit-delivery.html"
           class="btn btn-outline-secondary mt-3 mt-md-0">
            <i class="fas fa-arrow-left me-2"></i>
            Back to Deliveries
        </a>

    </div>


    <div class="row">

        <!-- LEFT CONTENT -->
        <div class="col-lg-8 mb-4">

            <!-- CUSTOMER INFORMATION -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-4">
                    <h5 class="mb-1">
                        <i class="fas fa-user text-primary me-2"></i>
                        Customer Information
                    </h5>

                    <p class="text-muted small mb-0">
                        Select the customer and enter delivery details.
                    </p>
                </div>

                <div class="card-body p-4">

                    <div class="row g-3">

                        <!-- Customer -->
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">
                                Customer <span class="text-danger">*</span>
                            </label>

                            <select class="form-select">
                                <option selected disabled>
                                    Select customer
                                </option>

                                <option>Green Valley Spa</option>
                                <option>Pure Brew Brewery</option>
                                <option>Fresh Life FMCG</option>
                                <option>Clear Water Spa</option>
                            </select>
                        </div>


                        <!-- Contact Person -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Contact Person
                            </label>

                            <input type="text"
                                   class="form-control"
                                   placeholder="Enter contact person">

                        </div>


                        <!-- Contact Number -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Contact Number
                            </label>

                            <input type="tel"
                                   class="form-control"
                                   placeholder="Enter contact number">

                        </div>


                        <!-- Delivery Address -->
                        <div class="col-md-12">

                            <label class="form-label fw-semibold">
                                Delivery Address
                                <span class="text-danger">*</span>
                            </label>

                            <textarea class="form-control"
                                      rows="3"
                                      placeholder="Enter complete delivery address"></textarea>

                        </div>


                        <!-- City -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                City
                            </label>

                            <input type="text"
                                   class="form-control"
                                   placeholder="Enter city">

                        </div>


                        <!-- Province -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Province
                            </label>

                            <select class="form-select">

                                <option selected disabled>
                                    Select province
                                </option>

                                <option>Ontario</option>
                                <option>British Columbia</option>
                                <option>Alberta</option>
                                <option>Quebec</option>
                                <option>Manitoba</option>
                                <option>Saskatchewan</option>

                            </select>

                        </div>

                    </div>

                </div>

            </div>


            <!-- KIT INFORMATION -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-4">

                    <h5 class="mb-1">
                        <i class="fas fa-flask text-primary me-2"></i>
                        Kit Information
                    </h5>

                    <p class="text-muted small mb-0">
                        Select the kit type and delivery quantity.
                    </p>

                </div>


                <div class="card-body p-4">

                    <div class="row g-3">

                        <!-- Kit Type -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Kit Type
                                <span class="text-danger">*</span>
                            </label>

                            <select class="form-select">

                                <option selected disabled>
                                    Select kit type
                                </option>

                                <option>Water Testing Kit</option>
                                <option>Chemical Testing Kit</option>
                                <option>Compliance Kit</option>

                            </select>

                        </div>


                        <!-- Quantity -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Quantity
                                <span class="text-danger">*</span>
                            </label>

                            <input type="number"
                                   class="form-control"
                                   min="1"
                                   placeholder="Enter quantity">

                        </div>


                        <!-- Delivery Date -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Delivery Date
                                <span class="text-danger">*</span>
                            </label>

                            <input type="date"
                                   class="form-control">

                        </div>


                        <!-- Status -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Delivery Status
                            </label>

                            <select class="form-select">

                                <option selected>Pending</option>
                                <option>In Transit</option>
                                <option>Delivered</option>
                                <option>Cancelled</option>

                            </select>

                        </div>

                    </div>

                </div>

            </div>


            <!-- SHIPPING INFORMATION -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-4">

                    <h5 class="mb-1">
                        <i class="fas fa-truck text-primary me-2"></i>
                        Shipping Information
                    </h5>

                    <p class="text-muted small mb-0">
                        Add shipment and tracking information.
                    </p>

                </div>


                <div class="card-body p-4">

                    <div class="row g-3">

                        <!-- Tracking Number -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Tracking Number
                            </label>

                            <input type="text"
                                   class="form-control"
                                   placeholder="Enter tracking number">

                        </div>


                        <!-- Carrier -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Carrier
                            </label>

                            <select class="form-select">

                                <option selected disabled>
                                    Select carrier
                                </option>

                                <option>Canada Post</option>
                                <option>FedEx</option>
                                <option>UPS</option>
                                <option>DHL</option>
                                <option>Other</option>

                            </select>

                        </div>


                        <!-- Notes -->
                        <div class="col-md-12">

                            <label class="form-label fw-semibold">
                                Delivery Notes
                            </label>

                            <textarea class="form-control"
                                      rows="4"
                                      placeholder="Enter delivery instructions or additional notes"></textarea>

                        </div>

                    </div>

                </div>

            </div>


            <!-- ACTION BUTTONS -->
            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-end gap-2">

                        <a href="kit-delivery.html"
                           class="btn btn-light border">
                            Cancel
                        </a>

                        <button type="button"
                                class="btn btn-primary">

                            <i class="fas fa-plus me-2"></i>
                            Create Delivery

                        </button>

                    </div>

                </div>

            </div>

        </div>


        <!-- RIGHT SIDEBAR -->
        <div class="col-lg-4 mb-4">

            <!-- DELIVERY SUMMARY -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-4">

                    <h5 class="mb-0">
                        Delivery Summary
                    </h5>

                </div>


                <div class="card-body p-4">

                    <div class="bg-light rounded p-3">

                        <div class="d-flex justify-content-between mb-3">

                            <span class="text-muted">
                                Delivery ID
                            </span>

                            <strong>
                                Auto Generated
                            </strong>

                        </div>


                        <div class="d-flex justify-content-between mb-3">

                            <span class="text-muted">
                                Status
                            </span>

                            <span class="badge bg-warning text-dark">
                                Pending
                            </span>

                        </div>


                        <div class="d-flex justify-content-between mb-3">

                            <span class="text-muted">
                                Kit Type
                            </span>

                            <span>
                                Not selected
                            </span>

                        </div>


                        <div class="d-flex justify-content-between">

                            <span class="text-muted">
                                Quantity
                            </span>

                            <span>
                                0
                            </span>

                        </div>

                    </div>

                </div>

            </div>


            <!-- DELIVERY PROCESS -->
            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white border-0 p-4">

                    <h5 class="mb-0">
                        Delivery Process
                    </h5>

                </div>


                <div class="card-body p-4">

                    <!-- STEP 1 -->
                    <div class="d-flex align-items-start mb-4">

                        <div class="bg-primary text-white rounded-circle
                                    d-flex align-items-center justify-content-center
                                    me-3"
                             style="width:40px;height:40px;min-width:40px;">

                            <i class="fas fa-box"></i>

                        </div>


                        <div>

                            <h6 class="fw-semibold mb-1">
                                1. Order Created
                            </h6>

                            <p class="text-muted small mb-0">
                                Record customer and requested kit details.
                            </p>

                        </div>

                    </div>


                    <!-- STEP 2 -->
                    <div class="d-flex align-items-start mb-4">

                        <div class="bg-info text-white rounded-circle
                                    d-flex align-items-center justify-content-center
                                    me-3"
                             style="width:40px;height:40px;min-width:40px;">

                            <i class="fas fa-truck"></i>

                        </div>


                        <div>

                            <h6 class="fw-semibold mb-1">
                                2. Shipment In Transit
                            </h6>

                            <p class="text-muted small mb-0">
                                Track dispatched kits and delivery progress.
                            </p>

                        </div>

                    </div>


                    <!-- STEP 3 -->
                    <div class="d-flex align-items-start">

                        <div class="bg-success text-white rounded-circle
                                    d-flex align-items-center justify-content-center
                                    me-3"
                             style="width:40px;height:40px;min-width:40px;">

                            <i class="fas fa-check"></i>

                        </div>


                        <div>

                            <h6 class="fw-semibold mb-1">
                                3. Delivery Completed
                            </h6>

                            <p class="text-muted small mb-0">
                                Update delivery status after customer receipt.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

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