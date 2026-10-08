@include('admin.include.header')


    <!-- ========== EDIT USER CONTENT START ========== -->
  <div class="content-area">

    <!-- Page Header -->
    <div class="d-flex flex-column flex-md-row
                justify-content-between
                align-items-md-center
                mb-4">

        <div>
            <h3 class="mb-1">View User</h3>
            <p class="text-muted mb-0">
                View user information and account details
            </p>
        </div>

        <div class="d-flex gap-2">
            <a href="users.html"
               class="btn btn-sm btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i>
                Back to Users
            </a>

            <a href="edit-user.html"
               class="btn btn-sm btn-primary">
                <i class="fas fa-edit me-1"></i>
                Edit User
            </a>
        </div>

    </div>


    <!-- User Details -->
    <div class="row g-4">

        <!-- Left Column -->
        <div class="col-lg-8">

            <!-- User Information -->
            <div class="card shadow-sm border-0 mb-4">

                <div class="card-header bg-white py-3">
                    <h5 class="mb-1">
                        <i class="fas fa-user me-2 text-primary"></i>
                        User Information
                    </h5>

                    <small class="text-muted">
                        Personal information of the user
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
                            <h5 class="mb-1">
                                John Doe
                            </h5>

                            <small class="text-muted d-block">
                                john.doe@example.com
                            </small>

                            <span class="badge bg-success mt-2">
                                Active
                            </span>
                        </div>

                    </div>


                    <!-- User Information -->
                    <div class="row g-4">

                        <div class="col-md-6">
                            <small class="text-muted d-block mb-1">
                                Full Name
                            </small>
                            <h6 class="mb-0">
                                John Doe
                            </h6>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted d-block mb-1">
                                Email Address
                            </small>
                            <h6 class="mb-0">
                                john.doe@example.com
                            </h6>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted d-block mb-1">
                                Phone Number
                            </small>
                            <h6 class="mb-0">
                                +1 555 123 4567
                            </h6>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted d-block mb-1">
                                Company / Organization
                            </small>
                            <h6 class="mb-0">
                                Wateryze
                            </h6>
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
                        User role and account status
                    </small>

                </div>

                <div class="card-body p-4">

                    <div class="row g-4">

                        <!-- Role -->
                        <div class="col-md-6">
                            <small class="text-muted d-block mb-2">
                                User Role
                            </small>

                            <span class="badge bg-primary px-3 py-2">
                                User
                            </span>
                        </div>


                        <!-- Status -->
                        <div class="col-md-6">
                            <small class="text-muted d-block mb-2">
                                Account Status
                            </small>

                            <span class="badge bg-success px-3 py-2">
                                Active
                            </span>
                        </div>


                        <!-- Notifications -->
                        <div class="col-md-6">
                            <small class="text-muted d-block mb-2">
                                Email Notifications
                            </small>

                            <span class="badge bg-success px-3 py-2">
                                Enabled
                            </span>
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

                        <span class="fw-medium">
                            #USR-001
                        </span>
                    </div>

                    <hr>

                    <!-- Joined -->
                    <div class="mb-3">
                        <small class="text-muted d-block">
                            Joined Date
                        </small>

                        <span class="fw-medium">
                            Jan 2, 2026
                        </span>
                    </div>

                    <hr>

                    <!-- Last Login -->
                    <div class="mb-3">
                        <small class="text-muted d-block">
                            Last Login
                        </small>

                        <span class="fw-medium">
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

                    <!-- Last Login -->
                    <div class="d-flex mb-4">

                        <div class="me-3 text-primary">
                            <i class="fas fa-sign-in-alt"></i>
                        </div>

                        <div>
                            <small class="fw-medium d-block">
                                Last Login
                            </small>

                            <small class="text-muted">
                                Sep 3, 2026 at 10:30 AM
                            </small>
                        </div>

                    </div>


                    <!-- Account Active -->
                    <div class="d-flex">

                        <div class="me-3 text-success">
                            <i class="fas fa-user-check"></i>
                        </div>

                        <div>
                            <small class="fw-medium d-block">
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


    <!-- Bottom Actions -->
    <div class="d-flex justify-content-end gap-2 mt-4">

        <a href="users.html"
           class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i>
            Back to Users
        </a>

        <a href="edit-user.html"
           class="btn btn-primary px-4">
            <i class="fas fa-edit me-2"></i>
            Edit User
        </a>

    </div>

</div>
    <!-- ========== EDIT USER CONTENT END ========== -->

</div>
        <!-- ========== MAIN CONTENT END ========== -->
    </div>

 @include('admin.include.footer')