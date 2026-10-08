@include('admin.include.header')

            <!-- ========== SUBSCRIPTIONS CONTENT START ========== -->
           <div class="content-area">

    <!-- Page Header -->
    <div class="d-flex flex-column flex-md-row
                justify-content-between
                align-items-md-center
                mb-4">

        <div>
            <h2 class="page-title mb-1">View Subscription</h2>
            <p class="text-muted mb-0">
                View subscription details and billing information
            </p>
        </div>

        <div class="d-flex gap-2 mt-3 mt-md-0">

            <a href="subscriptions.html"
               class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i>
                Back to Subscriptions
            </a>

            <a href="subscription_edit.html"
               class="btn btn-primary">
                <i class="fas fa-edit me-1"></i>
                Edit Subscription
            </a>

        </div>

    </div>


    <!-- Subscription Details -->
    <div class="row g-4">

        <!-- Left Column -->
        <div class="col-md-8">

            <!-- Subscription Information -->
            <div class="card shadow-sm border-0 mb-4">

                <div class="card-header bg-white py-3">
                    <h5 class="mb-1">
                        <i class="fas fa-file-invoice-dollar me-2 text-primary"></i>
                        Subscription Information
                    </h5>

                    <small class="text-muted">
                        Details of the customer's current subscription
                    </small>
                </div>

                <div class="card-body p-4">

                    <div class="row g-4">

                        <!-- Customer -->
                        <div class="col-md-6">
                            <small class="text-muted d-block mb-1">
                                Customer
                            </small>

                            <h6 class="mb-0">
                                John Doe
                            </h6>
                        </div>


                        <!-- Plan -->
                        <div class="col-md-6">
                            <small class="text-muted d-block mb-1">
                                Subscription Plan
                            </small>

                            <span class="badge bg-info px-3 py-2">
                                Professional
                            </span>
                        </div>


                        <!-- Start Date -->
                        <div class="col-md-6">
                            <small class="text-muted d-block mb-1">
                                Start Date
                            </small>

                            <h6 class="mb-0">
                                Dec 1, 2025
                            </h6>
                        </div>


                        <!-- Renewal Date -->
                        <div class="col-md-6">
                            <small class="text-muted d-block mb-1">
                                Renewal Date
                            </small>

                            <h6 class="mb-0">
                                Feb 1, 2026
                            </h6>
                        </div>


                        <!-- Amount -->
                        <div class="col-md-6">
                            <small class="text-muted d-block mb-1">
                                Subscription Amount
                            </small>

                            <h5 class="mb-0">
                                $24.99
                            </h5>
                        </div>


                        <!-- Billing Cycle -->
                        <div class="col-md-6">
                            <small class="text-muted d-block mb-1">
                                Billing Cycle
                            </small>

                            <h6 class="mb-0">
                                Monthly
                            </h6>
                        </div>

                    </div>

                </div>
            </div>


            <!-- Customer Information -->
            <div class="card shadow-sm border-0">

                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">
                        <i class="fas fa-user me-2 text-primary"></i>
                        Customer Information
                    </h5>
                </div>

                <div class="card-body p-4">

                    <div class="row g-4">

                        <div class="col-md-6">
                            <small class="text-muted d-block mb-1">
                                Customer Name
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
                                Account Type
                            </small>

                            <span class="badge bg-primary">
                                Subscriber
                            </span>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted d-block mb-1">
                                Account Status
                            </small>

                            <span class="badge bg-success">
                                Active
                            </span>
                        </div>

                    </div>

                </div>
            </div>

        </div>


        <!-- Right Column -->
        <div class="col-md-4">

            <!-- Subscription Status -->
            <div class="card shadow-sm border-0 mb-4">

                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">
                        Subscription Status
                    </h5>
                </div>

                <div class="card-body text-center py-4">

                    <div class="mb-3">
                        <i class="fas fa-check-circle text-success"
                           style="font-size: 50px;"></i>
                    </div>

                    <h5 class="mb-2">
                        Active
                    </h5>

                    <p class="text-muted mb-0">
                        Subscription is currently active
                    </p>

                </div>
            </div>


            <!-- Subscription Summary -->
            <div class="card shadow-sm border-0">

                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">
                        Subscription Summary
                    </h5>
                </div>

                <div class="card-body">

                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted">
                            Plan
                        </span>

                        <span class="fw-medium">
                            Professional
                        </span>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted">
                            Amount
                        </span>

                        <span class="fw-medium">
                            $24.99
                        </span>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted">
                            Start Date
                        </span>

                        <span>
                            Dec 1, 2025
                        </span>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted">
                            Renewal Date
                        </span>

                        <span>
                            Feb 1, 2026
                        </span>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between">
                        <span class="fw-medium">
                            Status
                        </span>

                        <span class="badge bg-success">
                            Active
                        </span>
                    </div>

                </div>
            </div>

        </div>

    </div>


    <!-- Bottom Buttons -->
    <div class="d-flex justify-content-end gap-2 mt-4">

        <a href="subscriptions.html"
           class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i>
            Back to Subscriptions
        </a>

        <a href="subscription_edit.html"
           class="btn btn-primary px-4">
            <i class="fas fa-edit me-2"></i>
            Edit Subscription
        </a>

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