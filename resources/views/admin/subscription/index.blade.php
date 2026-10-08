@include('admin.include.header')

            <!-- ========== SUBSCRIPTIONS CONTENT START ========== -->
            <div class="content-area">
                <div class="mb-4">
                    <button class="menu-toggle d-lg-none" id="menuToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h2 class="page-title">Subscriptions</h2>
                </div>

                <!-- Summary Cards -->
                <section class="summary-cards mb-4">
                    <div class="row"> <!-- Active Subscriptions -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card stat-card bg-success-subtle border border-success-subtle shadow rounded-3">
                                <div class="card-body">
                                    <div class="stat-icon bg-success"> <i class="fas fa-check-circle"></i> </div>
                                    <div class="stat-content">
                                        <p class="stat-label">Active Subscriptions</p>
                                        <h3 class="stat-value">847</h3> <small class="stat-change positive"> <i
                                                class="fas fa-arrow-up"></i> 23 this month </small>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Expiring Soon -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card stat-card bg-warning-subtle border border-warning-subtle shadow rounded-3">
                                <div class="card-body">
                                    <div class="stat-icon bg-warning"> <i class="fas fa-clock"></i> </div>
                                    <div class="stat-content">
                                        <p class="stat-label">Expiring Soon</p>
                                        <h3 class="stat-value">12</h3> <small class="stat-change negative"> <i
                                                class="fas fa-arrow-down"></i> Within 7 days </small>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Cancelled -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card stat-card bg-danger-subtle border border-danger-subtle shadow rounded-3">
                                <div class="card-body">
                                    <div class="stat-icon bg-danger"> <i class="fas fa-times-circle"></i> </div>
                                    <div class="stat-content">
                                        <p class="stat-label">Cancelled</p>
                                        <h3 class="stat-value">5</h3> <small class="stat-change negative"> <i
                                                class="fas fa-arrow-down"></i> This month </small>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Monthly Revenue -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card stat-card bg-info-subtle border border-info-subtle shadow rounded-3">
                                <div class="card-body">
                                    <div class="stat-icon bg-info"> <i class="fas fa-dollar-sign"></i> </div>
                                    <div class="stat-content">
                                        <p class="stat-label">Monthly Revenue</p>
                                        <h3 class="stat-value">$42.5K</h3> <small class="stat-change positive"> <i
                                                class="fas fa-arrow-up"></i> 15% growth </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

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

                <!-- Active Subscriptions Table -->
                <div class="card table-card">
                    <div class="card-header border-0">
                        <h5 class="card-title mb-0">Active Subscriptions</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr class="table-header-blue">
                                    <th>User</th>
                                    <th>Plan</th>
                                    <th>Start Date</th>
                                    <th>Renewal Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John Doe</td>
                                    <td><span class="badge bg-info">Professional</span></td>
                                    <td>Dec 1, 2025</td>
                                    <td>Feb 1, 2026</td>
                                    <td>$24.99</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>

                                        <div class="d-flex justify-content-center align-items-center gap-2">

                                         <a href="subscriptions-view.html" class="btn btn-sm btn-outline-info">

                                                    <i class="fas fa-eye"></i>

                                                </a>
                                        <button class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" title="Delete"
                                            data-bs-toggle="modal" data-bs-target="#deleteSubscriptionModal">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                         </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sarah Smith</td>
                                    <td><span class="badge bg-primary">Basic</span></td>
                                    <td>Jan 5, 2026</td>
                                    <td>Feb 5, 2026</td>
                                    <td>$9.99</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center gap-2">

                                           
                                                <a href="subscriptions-view.html" class="btn btn-sm btn-outline-info">

                                                    <i class="fas fa-eye"></i>

                                                </a>
                                                <button class="btn btn-sm btn-outline-primary" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger" title="Delete"
                                                    data-bs-toggle="modal" data-bs-target="#deleteSubscriptionModal">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mike Johnson</td>
                                    <td><span class="badge bg-success">Enterprise</span></td>
                                    <td>Nov 15, 2025</td>
                                    <td>Jan 20, 2026</td>
                                    <td>$99.99</td>
                                    <td><span class="badge bg-warning">Expiring Soon</span></td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center gap-2">

                                            <a href="subscriptions-view.html" class="btn btn-sm btn-outline-info">

                                                <i class="fas fa-eye"></i>

                                            </a>
                                            <button class="btn btn-sm btn-outline-primary" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" title="Delete"
                                                data-bs-toggle="modal" data-bs-target="#deleteSubscriptionModal">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Emily Davis</td>
                                    <td><span class="badge bg-info">Professional</span></td>
                                    <td>Dec 20, 2025</td>
                                    <td>Feb 20, 2026</td>
                                    <td>$24.99</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center gap-2">

                                            <a href="subscriptions-view.html" class="btn btn-sm btn-outline-info">

                                                <i class="fas fa-eye"></i>

                                            </a>
                                            <button class="btn btn-sm btn-outline-primary" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" title="Delete"
                                                data-bs-toggle="modal" data-bs-target="#deleteSubscriptionModal">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Robert Brown</td>
                                    <td><span class="badge bg-primary">Basic</span></td>
                                    <td>Dec 10, 2025</td>
                                    <td>Jan 25, 2026</td>
                                    <td>$9.99</td>
                                    <td><span class="badge bg-warning">Expiring Soon</span></td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center gap-2">

                                            <a href="subscriptions-view.html" class="btn btn-sm btn-outline-info">

                                                <i class="fas fa-eye"></i>

                                            </a>
                                            <button class="btn btn-sm btn-outline-primary" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" title="Delete"
                                                data-bs-toggle="modal" data-bs-target="#deleteSubscriptionModal">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- ========== SUBSCRIPTIONS CONTENT END ========== -->
        </div>
        <!-- ========== MAIN CONTENT END ========== -->
    </div>
    <!-- ========== DELETE SUBSCRIPTION MODAL START ========== -->
    <div class="modal fade" id="deleteSubscriptionModal" tabindex="-1" aria-labelledby="deleteSubscriptionModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content border-0 shadow">

                <!-- Modal Header -->
                <div class="modal-header border-0 pb-0">

                    <!-- <h5 class="modal-title"
                    id="deleteSubscriptionModalLabel">

                    Delete Subscription

                </h5> -->

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>

                </div>


                <!-- Modal Body -->
                <div class="modal-body text-center px-4 py-4">

                    <!-- Delete Icon -->
                    <div class="d-inline-flex
                            align-items-center
                            justify-content-center
                            bg-danger
                            bg-opacity-10
                            text-danger
                            rounded-circle
                            mb-3" style="width: 70px; height: 70px;">

                        <i class="fas fa-trash-alt fa-2x"></i>

                    </div>


                    <h5 class="fw-bold mb-2" style="font-size: 12px;">
                        Are you sure?
                    </h5>


                    <p class="text-muted mb-0" style="font-size: 12px;">

                        Are you sure you want to delete the subscription
                        for

                        <strong id="deleteSubscriptionUser" style="font-size: 12px;">
                            John Doe
                        </strong>?

                        <br>

                        This action cannot be undone.

                    </p>

                </div>


                <!-- Modal Footer -->
                <div class="modal-footer
                        border-0
                        justify-content-center
                        pt-0
                        pb-4">

                    <!-- Cancel -->
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">

                        Cancel

                    </button>


                    <!-- Delete -->
                    <button type="button" class="btn btn-danger px-4 btn-sm">

                        <i class="fas fa-trash me-1"></i>

                        Delete Subscription

                    </button>

                </div>

            </div>

        </div>

    </div>
 @include('admin.include.footer')