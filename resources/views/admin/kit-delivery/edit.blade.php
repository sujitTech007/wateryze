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
                        <i class="fas fa-clipboard-check"></i>
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
                        <i class="fas fa-credit-card"></i>
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

    <!-- Page Header -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1">Edit Kit Delivery</h4>
            <p class="text-muted mb-0">
                Update chemical kit delivery and tracking information.
            </p>
        </div>

        <a href="kit-delivery.html" class="btn btn-outline-secondary mt-2 mt-md-0">
            <i class="fas fa-arrow-left me-2"></i>
            Back to Deliveries
        </a>
    </div>

    <form action="#" method="post">

        <!-- Delivery Information -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Delivery Information</h5>
            </div>

            <div class="card-body">
                <div class="row g-3">

                    <div class="col-md-6">
                        <label for="deliveryId" class="form-label">
                            Delivery ID
                        </label>
                        <input type="text"
                               id="deliveryId"
                               class="form-control"
                               value="DEL-1001"
                               readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="customer" class="form-label">
                            Customer
                        </label>
                        <select id="customer" class="form-select" required>
                            <option selected>Green Valley Spa</option>
                            <option>Pure Brew Brewery</option>
                            <option>Fresh Life FMCG</option>
                            <option>Clear Water Spa</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="kitType" class="form-label">
                            Kit Type
                        </label>
                        <select id="kitType" class="form-select" required>
                            <option selected>Water Testing Kit</option>
                            <option>Chemical Testing Kit</option>
                            <option>Compliance Kit</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="quantity" class="form-label">
                            Quantity
                        </label>
                        <input type="number"
                               id="quantity"
                               class="form-control"
                               value="10"
                               min="1"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label for="deliveryDate" class="form-label">
                            Delivery Date
                        </label>
                        <input type="date"
                               id="deliveryDate"
                               class="form-control"
                               value="2026-09-16"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label for="status" class="form-label">
                            Delivery Status
                        </label>
                        <select id="status" class="form-select" required>
                            <option>Pending</option>
                            <option>In Transit</option>
                            <option selected>Delivered</option>
                            <option>Cancelled</option>
                        </select>
                    </div>

                </div>
            </div>
        </div>

        <!-- Customer Information -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Customer Information</h5>
            </div>

            <div class="card-body">
                <div class="row g-3">

                    <div class="col-md-6">
                        <label for="contactPerson" class="form-label">
                            Contact Person
                        </label>
                        <input type="text"
                               id="contactPerson"
                               class="form-control"
                               value="Sarah Mitchell"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">
                            Email Address
                        </label>
                        <input type="email"
                               id="email"
                               class="form-control"
                               value="sarah@example.com"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label for="phone" class="form-label">
                            Phone Number
                        </label>
                        <input type="tel"
                               id="phone"
                               class="form-control"
                               value="+1 416 555 0124"
                               required>
                    </div>

                    <div class="col-12">
                        <label for="address" class="form-label">
                            Delivery Address
                        </label>
                        <textarea id="address"
                                  class="form-control"
                                  rows="3"
                                  required>125 Water Street, Toronto, Ontario, Canada</textarea>
                    </div>

                </div>
            </div>
        </div>

        <!-- Kit and Technician Details -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Kit and Technician Details</h5>
            </div>

            <div class="card-body">
                <div class="row g-3">

                    <div class="col-md-6">
                        <label for="batchNumber" class="form-label">
                            Batch Number
                        </label>
                        <input type="text"
                               id="batchNumber"
                               class="form-control"
                               value="WTK-2026-0916">
                    </div>

                    <div class="col-md-6">
                        <label for="technician" class="form-label">
                            Assigned Technician
                        </label>
                        <select id="technician" class="form-select">
                            <option selected>Daniel Wilson</option>
                            <option>Sophia Martin</option>
                            <option>Michael Brown</option>
                            <option>Emily Johnson</option>
                            <option>Not Assigned</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="notes" class="form-label">
                            Delivery Notes
                        </label>
                        <textarea id="notes"
                                  class="form-control"
                                  rows="3">Water testing kits delivered to the customer facility.</textarea>
                    </div>

                </div>
            </div>
        </div>

        <!-- Tracking Information -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Tracking Information</h5>
            </div>

            <div class="card-body">
                <div class="row g-3">

                    <div class="col-md-6">
                        <label for="courier" class="form-label">
                            Courier Name
                        </label>
                        <input type="text"
                               id="courier"
                               class="form-control"
                               value="Canada Post">
                    </div>

                    <div class="col-md-6">
                        <label for="trackingNumber" class="form-label">
                            Tracking Number
                        </label>
                        <input type="text"
                               id="trackingNumber"
                               class="form-control"
                               value="CP123456789CA">
                    </div>

                    <div class="col-md-6">
                        <label for="dispatchDate" class="form-label">
                            Dispatch Date
                        </label>
                        <input type="date"
                               id="dispatchDate"
                               class="form-control"
                               value="2026-09-15">
                    </div>

                    <div class="col-md-6">
                        <label for="deliveredDate" class="form-label">
                            Delivered Date
                        </label>
                        <input type="date"
                               id="deliveredDate"
                               class="form-control"
                               value="2026-09-16">
                    </div>

                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="d-flex flex-wrap justify-content-end gap-2">
            <a href="kit-delivery.html" class="btn btn-light border">
                Cancel
            </a>

            <button type="reset" class="btn btn-outline-secondary">
                <i class="fas fa-undo me-2"></i>
                Reset
            </button>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>
                Update Delivery
            </button>
        </div>

    </form>

</div>
            <!-- ========== DASHBOARD CONTENT END ========== -->
        </div>
        <!-- ========== MAIN CONTENT END ========== -->
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="script.js"></script>
</body>

</html>