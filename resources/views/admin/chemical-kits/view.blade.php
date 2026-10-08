@include('admin.include.header')

            <!-- ========== DASHBOARD CONTENT START ========== -->
          <div class="content-area">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-1">Chemical Kit Details</h3>
            <p class="text-muted mb-0">View complete information about this chemical kit.</p>
        </div>

        <a href="chemical-kits.html" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back
        </a>
    </div>


    <div class="row">

        <!-- Kit Information -->
        <div class="col-lg-8 mb-4">

            <div class="card chart-card h-100">

                <div class="card-header bg-transparent">
                    <h5 class="mb-0">Kit Information</h5>
                </div>

                <div class="card-body">

                    <div class="row g-4">

                        <div class="col-md-6">
                            <small class="text-muted d-block mb-1">Kit ID</small>
                            <h6>CK-2025-001</h6>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted d-block mb-1">Kit Type</small>
                            <h6>Standard Kit</h6>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted d-block mb-1">Assigned Customer</small>
                            <h6>Blue Haven Spa</h6>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted d-block mb-1">Status</small>
                            <span class="badge bg-success">Active</span>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted d-block mb-1">Last Delivery</small>
                            <h6>Dec 18, 2025</h6>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted d-block mb-1">Next Refill</small>
                            <h6>Feb 18, 2026</h6>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- Usage -->
        <div class="col-lg-4 mb-4">

            <div class="card chart-card h-100">

                <div class="card-header bg-transparent">
                    <h5 class="mb-0">Chemical Usage</h5>
                </div>

                <div class="card-body text-center">

                    <h1 class="mb-2">3 / 4</h1>

                    <p class="text-muted">
                        Chemicals Available
                    </p>

                    <div class="progress mb-3">
                        <div class="progress-bar bg-primary"
                             role="progressbar"
                             style="width: 75%">
                        </div>
                    </div>

                    <span class="badge bg-success">
                        Good Stock Level
                    </span>

                </div>

            </div>

        </div>

    </div>


    <!-- Chemical Details -->

    <div class="card chart-card mb-4">

        <div class="card-header bg-transparent">
            <h5 class="mb-0">Chemicals Included</h5>
        </div>


        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">
                    <tr>
                        <th>Chemical</th>
                        <th>Quantity</th>
                        <th>Remaining</th>
                        <th>Status</th>
                    </tr>
                </thead>


                <tbody>

                    <tr>
                        <td>
                            <strong>Coagulant</strong>
                        </td>

                        <td>5 L</td>

                        <td>4.2 L</td>

                        <td>
                            <span class="badge bg-success">
                                Available
                            </span>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <strong>Disinfectant</strong>
                        </td>

                        <td>5 L</td>

                        <td>3.8 L</td>

                        <td>
                            <span class="badge bg-success">
                                Available
                            </span>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <strong>pH Neutralizer</strong>
                        </td>

                        <td>5 L</td>

                        <td>2.5 L</td>

                        <td>
                            <span class="badge bg-warning text-dark">
                                Low
                            </span>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <strong>Backup Chemical</strong>
                        </td>

                        <td>5 L</td>

                        <td>0 L</td>

                        <td>
                            <span class="badge bg-danger">
                                Empty
                            </span>
                        </td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>


    <!-- Activity -->

    <div class="card chart-card">

        <div class="card-header bg-transparent">
            <h5 class="mb-0">Kit Activity</h5>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-4 mb-3">

                    <small class="text-muted d-block">
                        Last Updated
                    </small>

                    <small>Jan 14, 2026</small>

                </div>


                <div class="col-md-4 mb-3">

                    <small class="text-muted d-block">
                        Last Delivery
                    </small>

                    <small>Dec 18, 2025</small>

                </div>


                <div class="col-md-4 mb-3">

                    <small class="text-muted d-block">
                        Assigned Since
                    </small>

                    <small>Nov 10, 2025</small>

                </div>

            </div>

        </div>

    </div>

</div>
            <!-- ========== DASHBOARD CONTENT END ========== -->
        </div>
        <!-- ========== MAIN CONTENT END ========== -->
    </div>

   @include('admin.include.footer')