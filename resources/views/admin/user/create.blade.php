@include('admin.include.header')

            <!-- ========== USERS CONTENT START ========== -->
            <!-- CREATE USER PAGE -->
<div class="content-area">

    <!-- Page Header -->
    <div class="page-header mb-4">
        <div class="row align-items-center">

            <div class="col-md-7">
                <h3 class="mb-1">Create New User</h3>
                <small class="text-muted">
                    Add a new system user and configure their account permissions.
                </small>
            </div>

            <div class="col-md-5 text-md-end mt-3 mt-md-0">
                <a href="users.html" class="btn btn-primary btn-sm">
                    <i class="fas fa-arrow-left me-2"></i>
                    Back to Users
                </a>
            </div>

        </div>
    </div>


    <div class="row g-4">

        <!-- LEFT SIDE -->
        <div class="col-lg-8">

            <!-- Personal Information -->
            <div class="card mb-4">

                <div class="card-header bg-white border-0">
                    <h5 class="mb-1">
                        <i class="fas fa-user text-primary me-2"></i>
                        Personal Information
                    </h5>

                    <small class="text-muted">
                        Enter the user's basic information.
                    </small>
                </div>

                <div class="card-body">

                    <div class="row g-3">

                        <!-- First Name -->
                        <div class="col-md-6">
                            <label class="form-label">
                                First Name <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                   class="form-control"
                                   placeholder="Enter first name">
                        </div>


                        <!-- Last Name -->
                        <div class="col-md-6">
                            <label class="form-label">
                                Last Name <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                   class="form-control"
                                   placeholder="Enter last name">
                        </div>


                        <!-- Email -->
                        <div class="col-md-6">
                            <label class="form-label">
                                Email Address <span class="text-danger">*</span>
                            </label>

                            <input type="email"
                                   class="form-control"
                                   placeholder="user@example.com">
                        </div>


                        <!-- Phone -->
                        <div class="col-md-6">
                            <label class="form-label">
                                Phone Number
                            </label>

                            <input type="text"
                                   class="form-control"
                                   placeholder="+1 416 555 0124">
                        </div>

                    </div>

                </div>
            </div>


            <!-- Account Information -->
            <div class="card mb-4">

                <div class="card-header bg-white border-0">
                    <h5 class="mb-1">
                        <i class="fas fa-user-cog text-primary me-2"></i>
                        Account Information
                    </h5>

                    <small class="text-muted">
                        Configure the user's role and account status.
                    </small>
                </div>

                <div class="card-body">

                    <div class="row g-3">

                        <!-- Role -->
                        <div class="col-md-6">

                            <label class="form-label">
                                User Role <span class="text-danger">*</span>
                            </label>

                            <select class="form-select">
                                <option selected disabled>
                                    Select role
                                </option>
                                <option>Admin</option>
                                <option>User</option>
                                <option>Subscriber</option>
                                <option>Technician</option>
                            </select>

                        </div>


                        <!-- Status -->
                        <div class="col-md-6">

                            <label class="form-label">
                                Account Status
                            </label>

                            <select class="form-select">
                                <option selected>Active</option>
                                <option>Pending</option>
                                <option>Inactive</option>
                            </select>

                        </div>


                        <!-- Username -->
                        <div class="col-md-6">

                            <label class="form-label">
                                Username
                            </label>

                            <input type="text"
                                   class="form-control"
                                   placeholder="Enter username">

                        </div>


                        <!-- Department -->
                        <div class="col-md-6">

                            <label class="form-label">
                                Department
                            </label>

                            <select class="form-select">

                                <option selected disabled>
                                    Select department
                                </option>

                                <option>Administration</option>
                                <option>Operations</option>
                                <option>Compliance</option>
                                <option>Technical Services</option>
                                <option>Customer Support</option>

                            </select>

                        </div>

                    </div>

                </div>
            </div>


            <!-- Login Credentials -->
            <div class="card mb-4">

                <div class="card-header bg-white border-0">

                    <h5 class="mb-1">
                        <i class="fas fa-lock text-primary me-2"></i>
                        Login Credentials
                    </h5>

                    <small class="text-muted">
                        Create secure login credentials for this user.
                    </small>

                </div>

                <div class="card-body">

                    <div class="row g-3">

                        <!-- Password -->
                        <div class="col-md-6">

                            <label class="form-label">
                                Password <span class="text-danger">*</span>
                            </label>

                            <input type="password"
                                   class="form-control"
                                   placeholder="Enter password">

                            <small class="text-muted">
                                Minimum 8 characters.
                            </small>

                        </div>


                        <!-- Confirm Password -->
                        <div class="col-md-6">

                            <label class="form-label">
                                Confirm Password <span class="text-danger">*</span>
                            </label>

                            <input type="password"
                                   class="form-control"
                                   placeholder="Confirm password">

                        </div>

                    </div>

                </div>
            </div>


            <!-- Permissions -->
            <div class="card mb-4">

                <div class="card-header bg-white border-0">

                    <h5 class="mb-1">
                        <i class="fas fa-key text-primary me-2"></i>
                        User Permissions
                    </h5>

                    <small class="text-muted">
                        Select the sections this user can access.
                    </small>

                </div>

                <div class="card-body">

                    <div class="row g-3">

                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input"
                                       type="checkbox"
                                       id="dashboardAccess"
                                       checked>

                                <label class="form-check-label"
                                       for="dashboardAccess">
                                    Dashboard Access
                                </label>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input"
                                       type="checkbox"
                                       id="userManagement">

                                <label class="form-check-label"
                                       for="userManagement">
                                    User Management
                                </label>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input"
                                       type="checkbox"
                                       id="technicianManagement">

                                <label class="form-check-label"
                                       for="technicianManagement">
                                    Technician Management
                                </label>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input"
                                       type="checkbox"
                                       id="partnerLabs">

                                <label class="form-check-label"
                                       for="partnerLabs">
                                    Partner Labs
                                </label>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input"
                                       type="checkbox"
                                       id="compliance">

                                <label class="form-check-label"
                                       for="compliance">
                                    Compliance Management
                                </label>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input"
                                       type="checkbox"
                                       id="chemicalKits">

                                <label class="form-check-label"
                                       for="chemicalKits">
                                    Chemical Kits
                                </label>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input"
                                       type="checkbox"
                                       id="kitDelivery">

                                <label class="form-check-label"
                                       for="kitDelivery">
                                    Kit Delivery
                                </label>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input"
                                       type="checkbox"
                                       id="billing">

                                <label class="form-check-label"
                                       for="billing">
                                    Billing & Payments
                                </label>
                            </div>
                        </div>

                    </div>

                </div>
            </div>


            <!-- Additional Notes -->
            <div class="card mb-4">

                <div class="card-header bg-white border-0">

                    <h5 class="mb-0">
                        <i class="fas fa-note-sticky text-primary me-2"></i>
                        Additional Information
                    </h5>

                </div>

                <div class="card-body">

                    <label class="form-label">
                        Notes
                    </label>

                    <textarea class="form-control"
                              rows="3"
                              placeholder="Enter any additional information..."></textarea>

                </div>

            </div>


            <!-- Form Buttons -->
            <div class="d-flex justify-content-end gap-2 mb-4">

                <a href="users.html"
                   class="btn btn-outline-secondary">

                    <i class="fas fa-times me-1"></i>
                    Cancel

                </a>

                <button type="button"
                        class="btn btn-primary">

                    <i class="fas fa-user-plus me-1"></i>
                    Create User

                </button>

            </div>

        </div>


        <!-- RIGHT SIDE -->
        <div class="col-lg-4">

            <!-- User Preview -->
            <div class="card mb-4">

                <div class="card-header bg-white border-0">
                    <h5 class="mb-0">User Preview</h5>
                </div>

                <div class="card-body text-center">

                    <div class="mb-3">

                        <img src="../assets/images/profile-icon.png"
                             alt="User"
                             class="rounded-circle"
                             style="width:75px;height:75px;object-fit:cover;">

                    </div>

                    <h5 class="mb-1">
                        New User
                    </h5>

                    <p class="text-muted mb-3">
                        user@example.com
                    </p>

                    <span class="badge bg-primary me-1">
                        USER
                    </span>

                    <span class="badge bg-success">
                        ACTIVE
                    </span>

                </div>

            </div>


            <!-- Account Summary -->
            <div class="card mb-4">

                <div class="card-header bg-white border-0">
                    <h5 class="mb-0">Account Summary</h5>
                </div>

                <div class="card-body">

                    <div class="d-flex justify-content-between mb-3">

                        <span class="text-muted">
                            Role
                        </span>

                        <span>
                            Not selected
                        </span>

                    </div>


                    <div class="d-flex justify-content-between mb-3">

                        <span class="text-muted">
                            Status
                        </span>

                        <span class="badge bg-success">
                            Active
                        </span>

                    </div>


                    <div class="d-flex justify-content-between mb-3">

                        <span class="text-muted">
                            Permissions
                        </span>

                        <span>
                            1 selected
                        </span>

                    </div>


                    <div class="d-flex justify-content-between">

                        <span class="text-muted">
                            Account
                        </span>

                        <span class="text-success">
                            Ready
                        </span>

                    </div>

                </div>

            </div>


            <!-- Security -->
            <div class="card mb-4">

                <div class="card-header bg-white border-0">

                    <h5 class="mb-0">
                        <i class="fas fa-shield-halved text-success me-2"></i>
                        Security
                    </h5>

                </div>

                <div class="card-body">

                    <div class="d-flex mb-3">

                        <i class="fas fa-check-circle text-success me-3 mt-1"></i>

                        <div>
                            <strong>Secure Password</strong>

                            <div class="text-muted">
                                Use at least 8 characters.
                            </div>
                        </div>

                    </div>


                    <div class="d-flex mb-3">

                        <i class="fas fa-user-shield text-primary me-3 mt-1"></i>

                        <div>
                            <strong>Role Based Access</strong>

                            <div class="text-muted">
                                Access is controlled through user roles.
                            </div>
                        </div>

                    </div>


                    <div class="d-flex">

                        <i class="fas fa-envelope text-info me-3 mt-1"></i>

                        <div>
                            <strong>Account Notification</strong>

                            <div class="text-muted">
                                Account information can be sent to the user.
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
            <!-- ========== USERS CONTENT END ========== -->
        </div>
        <!-- ========== MAIN CONTENT END ========== -->
    </div>
    <!-- ========== DELETE USER MODAL START ========== -->
<div class="modal fade" id="deleteUserModal" tabindex="-1"
    aria-labelledby="deleteUserModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content border-0 shadow">

            <!-- Modal Header -->
            <div class="modal-header border-0 pb-0">

                <h5 class="modal-title" id="deleteUserModalLabel">
                    Delete User
                </h5>

                <button type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                </button>

            </div>


            <!-- Modal Body -->
            <div class="modal-body text-center px-4 py-4">

                <!-- Warning Icon -->
                <div class="mb-3">

                    <div class="d-inline-flex align-items-center
                        justify-content-center
                        bg-danger bg-opacity-10
                        text-danger rounded-circle"
                        style="width: 70px; height: 70px;">

                        <i class="fas fa-trash-alt fa-2x"></i>

                    </div>

                </div>


                <h5 class="fw-bold mb-2">
                    Are you sure?
                </h5>


                <p class="text-muted mb-0">

                    Are you sure you want to delete
                    <strong id="deleteUserName">John Doe</strong>?

                    <br>

                    This action cannot be undone.

                </p>

            </div>


            <!-- Modal Footer -->
            <div class="modal-footer border-0
                justify-content-center pt-0 pb-4">

                <button type="button"
                    class="btn btn-outline-secondary"
                    data-bs-dismiss="modal">

                    Cancel

                </button>


                <button type="button"
                    class="btn btn-danger">

                    <i class="fas fa-trash me-1"></i>
                    Delete User

                </button>

            </div>

        </div>

    </div>

</div>
@include('admin.include.footer')