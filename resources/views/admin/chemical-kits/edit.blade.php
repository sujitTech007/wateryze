@include('admin.include.header')
            <!-- ========== DASHBOARD CONTENT START ========== -->
           <div class="content-area">

    <!-- Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">

        <div>
            <h3 class="mb-1">Edit Chemical Kit</h3>
            <p class="text-muted mb-0">
                Update chemical kit information and inventory details.
            </p>
        </div>

        <a href="chemical-kits.html"
           class="btn btn-primary mt-3 mt-md-0">

            <i class="fas fa-arrow-left me-2"></i>
            Back

        </a>

    </div>


    <form>

        <div class="row">

            <!-- Main Information -->
            <div class="col-lg-8 mb-4">

                <div class="card chart-card">

                    <div class="card-header bg-transparent">
                        <h5 class="mb-0">Kit Information</h5>
                    </div>


                    <div class="card-body">

                        <div class="row g-3">

                            <!-- Kit ID -->
                            <div class="col-md-6">

                                <label class="form-label">
                                    Kit ID
                                </label>

                                <input type="text"
                                       class="form-control"
                                       value="CK-2025-001">

                            </div>


                            <!-- Kit Type -->
                            <div class="col-md-6">

                                <label class="form-label">
                                    Kit Type
                                </label>

                                <select class="form-select">

                                    <option selected>
                                        Standard Kit
                                    </option>

                                    <option>
                                        Professional Kit
                                    </option>

                                    <option>
                                        Enterprise Kit
                                    </option>

                                </select>

                            </div>


                            <!-- Customer -->
                            <div class="col-md-6">

                                <label class="form-label">
                                    Assigned Customer
                                </label>

                                <select class="form-select">

                                    <option selected>
                                        Blue Haven Spa
                                    </option>

                                    <option>
                                        Maple Brewery
                                    </option>

                                    <option>
                                        Crystal Waters
                                    </option>

                                    <option>
                                        FreshFlow Foods
                                    </option>

                                </select>

                            </div>


                            <!-- Status -->
                            <div class="col-md-6">

                                <label class="form-label">
                                    Status
                                </label>

                                <select class="form-select">

                                    <option selected>
                                        Active
                                    </option>

                                    <option>
                                        Delivered
                                    </option>

                                    <option>
                                        Low Stock
                                    </option>

                                    <option>
                                        Pending Delivery
                                    </option>

                                </select>

                            </div>


                            <!-- Delivery -->
                            <div class="col-md-6">

                                <label class="form-label">
                                    Last Delivery Date
                                </label>

                                <input type="date"
                                       class="form-control"
                                       value="2025-12-18">

                            </div>


                            <!-- Refill -->
                            <div class="col-md-6">

                                <label class="form-label">
                                    Next Refill Date
                                </label>

                                <input type="date"
                                       class="form-control"
                                       value="2026-02-18">

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <!-- Status Summary -->
            <div class="col-lg-4 mb-4">

                <div class="card chart-card h-100">

                    <div class="card-header bg-transparent">
                        <h5 class="mb-0">
                            Inventory Summary
                        </h5>
                    </div>


                    <div class="card-body">

                        <div class="mb-3">

                            <small class="text-muted">
                                Available Chemicals
                            </small>

                            <h2 class="mt-1">
                                3 / 4
                            </h2>

                        </div>


                        <div class="progress mb-4">

                            <div class="progress-bar bg-primary"
                                 style="width: 75%">

                            </div>

                        </div>


                        <div class="alert alert-success mb-0">

                            <i class="fas fa-check-circle me-2"></i>

                            Inventory level is currently stable.

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- Chemical Inventory -->

        <div class="card chart-card mb-4">

            <div class="card-header bg-transparent">

                <h5 class="mb-0">
                    Chemical Inventory
                </h5>

            </div>


            <div class="card-body">

                <div class="row g-3">

                    <!-- Chemical 1 -->

                    <div class="col-lg-6">

                        <div class="border rounded p-3">

                            <h6>
                                Coagulant
                            </h6>

                            <div class="row">

                                <div class="col-6">

                                    <label class="form-label">
                                        Total
                                    </label>

                                    <input type="number"
                                           class="form-control"
                                           value="5">

                                </div>


                                <div class="col-6">

                                    <label class="form-label">
                                        Remaining
                                    </label>

                                    <input type="number"
                                           class="form-control"
                                           value="4.2">

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- Chemical 2 -->

                    <div class="col-lg-6">

                        <div class="border rounded p-3">

                            <h6>
                                Disinfectant
                            </h6>

                            <div class="row">

                                <div class="col-6">

                                    <label class="form-label">
                                        Total
                                    </label>

                                    <input type="number"
                                           class="form-control"
                                           value="5">

                                </div>


                                <div class="col-6">

                                    <label class="form-label">
                                        Remaining
                                    </label>

                                    <input type="number"
                                           class="form-control"
                                           value="3.8">

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- Chemical 3 -->

                    <div class="col-lg-6">

                        <div class="border rounded p-3">

                            <h6>
                                pH Neutralizer
                            </h6>

                            <div class="row">

                                <div class="col-6">

                                    <label class="form-label">
                                        Total
                                    </label>

                                    <input type="number"
                                           class="form-control"
                                           value="5">

                                </div>


                                <div class="col-6">

                                    <label class="form-label">
                                        Remaining
                                    </label>

                                    <input type="number"
                                           class="form-control"
                                           value="2.5">

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- Chemical 4 -->

                    <div class="col-lg-6">

                        <div class="border rounded p-3">

                            <h6>
                                Backup Chemical
                            </h6>

                            <div class="row">

                                <div class="col-6">

                                    <label class="form-label">
                                        Total
                                    </label>

                                    <input type="number"
                                           class="form-control"
                                           value="5">

                                </div>


                                <div class="col-6">

                                    <label class="form-label">
                                        Remaining
                                    </label>

                                    <input type="number"
                                           class="form-control"
                                           value="0">

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- BUTTONS -->

        <div class="d-flex justify-content-end gap-2 mb-4">

            <a href="chemical-kits.html"
               class="btn btn-outline-secondary">

                Cancel

            </a>


            <button type="submit"
                    class="btn btn-primary">

                <i class="fas fa-save me-2"></i>

                Save Changes

            </button>

        </div>

    </form>

</div>
            <!-- ========== DASHBOARD CONTENT END ========== -->
        </div>
        <!-- ========== MAIN CONTENT END ========== -->
    </div>

    @include('admin.include.footer')