@include('admin.include.header')


    <!-- ========== EDIT SUBSCRIPTION CONTENT START ========== -->
    <div class="content-area">

        <!-- Page Header -->
         <div class="d-flex justify-content-between align-items-center">
        <div class="mb-4">

           
            <h3 class="mb-1">Edit Subscription</h3>

            <p class="text-muted mb-0">
                Manage subscription plan, billing details and account status.
            </p>

        </div>
         <a href="../subscription/subscriptions.html"
                class="btn btn-sm btn-primary mb-3">

                <i class="fas fa-arrow-left me-1"></i>
                Back to Subscriptions

            </a>
         </div>



        <form>

            <div class="row g-4">

                <!-- LEFT SIDE -->
                <div class="col-lg-8">


                    <!-- Customer Information -->
                    <div class="card border-0 shadow-sm mb-4">

                        <div class="card-header bg-white py-3">

                            <h5 class="mb-1">
                                <i class="fas fa-user me-2 text-primary"></i>
                                Customer Information
                            </h5>

                            <small class="text-muted">
                                Subscription owner details
                            </small>

                        </div>


                        <div class="card-body p-4">

                            <div class="row g-3">

                                <!-- User -->
                                <div class="col-md-6">

                                    <label class="form-label fw-semibold">
                                        Customer
                                    </label>

                                    <select class="form-select">

                                        <option selected>
                                            John Doe
                                        </option>

                                        <option>
                                            Sarah Smith
                                        </option>

                                        <option>
                                            Mike Johnson
                                        </option>

                                        <option>
                                            Emily Davis
                                        </option>

                                    </select>

                                </div>


                                <!-- Email -->
                                <div class="col-md-6">

                                    <label class="form-label fw-semibold">
                                        Email Address
                                    </label>

                                    <input type="email"
                                        class="form-control"
                                        value="john.doe@example.com">

                                </div>

                            </div>

                        </div>

                    </div>



                    <!-- Subscription Plan -->
                    <div class="card border-0 shadow-sm mb-4">

                        <div class="card-header bg-white py-3">

                            <h5 class="mb-1">
                                <i class="fas fa-layer-group me-2 text-primary"></i>
                                Subscription Plan
                            </h5>

                            <small class="text-muted">
                                Select and manage the customer's subscription plan
                            </small>

                        </div>


                        <div class="card-body p-4">

                            <div class="row g-3">


                                <!-- Plan -->
                                <div class="col-md-6">

                                    <label class="form-label fw-semibold">
                                        Subscription Plan
                                    </label>

                                    <select class="form-select">

                                        <option>
                                            Basic
                                        </option>

                                        <option selected>
                                            Professional
                                        </option>

                                        <option>
                                            Enterprise
                                        </option>

                                    </select>

                                </div>


                                <!-- Billing Cycle -->
                                <div class="col-md-6">

                                    <label class="form-label fw-semibold">
                                        Billing Cycle
                                    </label>

                                    <select class="form-select">

                                        <option selected>
                                            Monthly
                                        </option>

                                        <option>
                                            Quarterly
                                        </option>

                                        <option>
                                            Yearly
                                        </option>

                                    </select>

                                </div>


                                <!-- Amount -->
                                <div class="col-md-6">

                                    <label class="form-label fw-semibold">
                                        Subscription Amount
                                    </label>

                                    <div class="input-group">

                                        <span class="input-group-text">
                                            $
                                        </span>

                                        <input type="number"
                                            class="form-control"
                                            value="24.99">

                                    </div>

                                </div>


                                <!-- Status -->
                                <div class="col-md-6">

                                    <label class="form-label fw-semibold">
                                        Subscription Status
                                    </label>

                                    <select class="form-select">

                                        <option selected>
                                            Active
                                        </option>

                                        <option>
                                            Expiring Soon
                                        </option>

                                        <option>
                                            Expired
                                        </option>

                                        <option>
                                            Cancelled
                                        </option>

                                    </select>

                                </div>


                            </div>

                        </div>

                    </div>



                    <!-- Billing Dates -->
                    <div class="card border-0 shadow-sm">

                        <div class="card-header bg-white py-3">

                            <h5 class="mb-1">
                                <i class="fas fa-calendar-alt me-2 text-primary"></i>
                                Billing Information
                            </h5>

                            <small class="text-muted">
                                Manage subscription dates and renewal information
                            </small>

                        </div>


                        <div class="card-body p-4">

                            <div class="row g-3">


                                <!-- Start Date -->
                                <div class="col-md-6">

                                    <label class="form-label fw-semibold">
                                        Start Date
                                    </label>

                                    <input type="date"
                                        class="form-control"
                                        value="2025-12-01">

                                </div>


                                <!-- Renewal Date -->
                                <div class="col-md-6">

                                    <label class="form-label fw-semibold">
                                        Renewal Date
                                    </label>

                                    <input type="date"
                                        class="form-control"
                                        value="2026-02-01">

                                </div>


                                <!-- Auto Renewal -->
                                <div class="col-12">

                                    <div class="form-check form-switch">

                                        <input class="form-check-input"
                                            type="checkbox"
                                            id="autoRenew"
                                            checked>

                                        <label class="form-check-label"
                                            for="autoRenew">

                                            Enable automatic subscription renewal

                                        </label>

                                    </div>

                                </div>


                            </div>

                        </div>

                    </div>

                </div>



                <!-- RIGHT SIDE -->
                <div class="col-lg-4">


                    <!-- Subscription Summary -->
                    <div class="card border-0 shadow-sm mb-4">

                        <div class="card-header bg-white py-3">

                            <h5 class="mb-0">
                                Subscription Summary
                            </h5>

                        </div>


                        <div class="card-body">

                            <!-- Subscription ID -->
                            <div class="mb-3">

                                <small class="text-muted d-block">
                                    Subscription ID
                                </small>

                                <span class="fw-semibold">
                                    #SUB-001
                                </span>

                            </div>


                            <hr>


                            <!-- Customer -->
                            <div class="mb-3">

                                <small class="text-muted d-block">
                                    Customer
                                </small>

                                <span class="fw-semibold">
                                    John Doe
                                </span>

                            </div>


                            <hr>


                            <!-- Current Plan -->
                            <div class="mb-3">

                                <small class="text-muted d-block mb-2">
                                    Current Plan
                                </small>

                                <span class="badge bg-info px-3 py-2">
                                    Professional
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



                    <!-- Payment Information -->
                    <div class="card border-0 shadow-sm">

                        <div class="card-header bg-white py-3">

                            <h5 class="mb-0">
                                Payment Information
                            </h5>

                        </div>


                        <div class="card-body">

                            <div class="mb-3">

                                <small class="text-muted d-block">
                                    Payment Method
                                </small>

                                <span class="fw-semibold">

                                    <i class="far fa-credit-card me-1"></i>
                                    Credit Card

                                </span>

                            </div>


                            <hr>


                            <div class="mb-3">

                                <small class="text-muted d-block">
                                    Last Payment
                                </small>

                                <span class="fw-semibold">
                                    Dec 1, 2025
                                </span>

                            </div>


                            <hr>


                            <div>

                                <small class="text-muted d-block">
                                    Next Payment
                                </small>

                                <span class="fw-semibold">
                                    Feb 1, 2026
                                </span>

                            </div>

                        </div>

                    </div>


                </div>

            </div>



            <!-- ACTION BUTTONS -->
            <div class="d-flex justify-content-end gap-2 mt-4">

                <a href="subscription.html"
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
    <!-- ========== EDIT SUBSCRIPTION CONTENT END ========== -->

</div>
        <!-- ========== MAIN CONTENT END ========== -->
    </div>

  @include('admin.include.footer')