@include('admin.include.header')

            <!-- ========== DASHBOARD CONTENT START ========== -->
           <div class="content-area">

    <!-- PAGE HEADER -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">

        <div>
            <h3 class="mb-1">Create Chemical Kit</h3>
            <p class="text-muted mb-0" style="font-size: 13px;">
                Add a new chemical kit and manage its inventory and assignment details.
            </p>
        </div>

        <a href="chemical-kits.html"
           class="btn btn-primary btn-sm mt-3 mt-md-0">
            <i class="fas fa-arrow-left me-2"></i>
            Back to Chemical Kits
        </a>

    </div>


    <div class="row">

        <!-- LEFT SIDE -->
        <div class="col-lg-8 mb-4">

            <!-- KIT INFORMATION -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-3">

                    <h5 class="mb-1" style="font-size: 17px;">
                        <i class="fas fa-flask text-primary me-2"></i>
                        Kit Information
                    </h5>

                    <p class="text-muted mb-0" style="font-size: 12px;">
                        Enter the basic information for the chemical kit.
                    </p>

                </div>


                <div class="card-body p-3">

                    <div class="row g-3">

                        <!-- KIT ID -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Kit ID
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                   class="form-control form-control-sm"
                                   placeholder="e.g. CK-2025-003">

                            <small class="text-muted" style="font-size: 11px;">
                                Enter a unique kit identification number.
                            </small>

                        </div>


                        <!-- KIT TYPE -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Kit Type
                                <span class="text-danger">*</span>
                            </label>

                            <select class="form-select form-select-sm">

                                <option selected disabled>
                                    Select kit type
                                </option>

                                <option>Standard Kit</option>
                                <option>Professional Kit</option>
                                <option>Advanced Kit</option>
                                <option>Compliance Kit</option>
                                <option>Custom Kit</option>

                            </select>

                        </div>


                        <!-- KIT NAME -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Kit Name
                            </label>

                            <input type="text"
                                   class="form-control form-control-sm"
                                   placeholder="Enter kit name">

                        </div>


                        <!-- BATCH NUMBER -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Batch Number
                            </label>

                            <input type="text"
                                   class="form-control form-control-sm"
                                   placeholder="Enter batch number">

                        </div>

                    </div>

                </div>

            </div>


            <!-- CHEMICAL INVENTORY -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-3">

                    <h5 class="mb-1" style="font-size: 17px;">
                        <i class="fas fa-vial text-primary me-2"></i>
                        Chemical Inventory
                    </h5>

                    <p class="text-muted mb-0" style="font-size: 12px;">
                        Specify the chemicals included in this kit.
                    </p>

                </div>


                <div class="card-body p-3">

                    <div class="row g-3">

                        <!-- TOTAL CHEMICALS -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Total Chemicals
                                <span class="text-danger">*</span>
                            </label>

                            <input type="number"
                                   class="form-control form-control-sm"
                                   min="1"
                                   placeholder="Enter number of chemicals">

                        </div>


                        <!-- AVAILABLE CHEMICALS -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Available Chemicals
                            </label>

                            <input type="number"
                                   class="form-control form-control-sm"
                                   min="0"
                                   placeholder="Enter available quantity">

                        </div>


                        <!-- CHEMICAL DETAILS -->
                        <div class="col-md-12">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Chemical Details
                            </label>

                            <textarea class="form-control"
                                      rows="3"
                                      style="font-size: 13px;"
                                      placeholder="Enter chemical names, quantities, or other inventory details"></textarea>

                        </div>


                        <!-- USAGE INFORMATION -->
                        <div class="col-md-12">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Chemical Usage Information
                            </label>

                            <textarea class="form-control"
                                      rows="3"
                                      style="font-size: 13px;"
                                      placeholder="Enter usage or handling information"></textarea>

                        </div>

                    </div>

                </div>

            </div>


            <!-- ASSIGNMENT -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-3">

                    <h5 class="mb-1" style="font-size: 17px;">
                        <i class="fas fa-user-tag text-primary me-2"></i>
                        Kit Assignment
                    </h5>

                    <p class="text-muted mb-0" style="font-size: 12px;">
                        Assign the chemical kit to a customer when required.
                    </p>

                </div>


                <div class="card-body p-3">

                    <div class="row g-3">

                        <!-- ASSIGNMENT STATUS -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Assignment Status
                            </label>

                            <select class="form-select form-select-sm">

                                <option selected>Available</option>
                                <option>Assigned</option>
                                <option>Reserved</option>

                            </select>

                        </div>


                        <!-- CUSTOMER -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Assigned Customer
                            </label>

                            <select class="form-select form-select-sm">

                                <option selected disabled>
                                    Select customer
                                </option>

                                <option>Blue Haven Spa</option>
                                <option>Maple Brewery</option>
                                <option>Crystal Waters</option>
                                <option>Green Valley Spa</option>

                            </select>

                        </div>


                        <!-- ASSIGNMENT DATE -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Assignment Date
                            </label>

                            <input type="date"
                                   class="form-control form-control-sm">

                        </div>


                        <!-- EXPECTED DELIVERY -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Expected Delivery Date
                            </label>

                            <input type="date"
                                   class="form-control form-control-sm">

                        </div>

                    </div>

                </div>

            </div>


            <!-- DELIVERY INFORMATION -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-3">

                    <h5 class="mb-1" style="font-size: 17px;">
                        <i class="fas fa-truck text-primary me-2"></i>
                        Delivery Information
                    </h5>

                    <p class="text-muted mb-0" style="font-size: 12px;">
                        Add delivery and shipment information for the kit.
                    </p>

                </div>


                <div class="card-body p-3">

                    <div class="row g-3">

                        <!-- DELIVERY STATUS -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Delivery Status
                            </label>

                            <select class="form-select form-select-sm">

                                <option selected>Pending Delivery</option>
                                <option>In Transit</option>
                                <option>Delivered</option>
                                <option>Cancelled</option>

                            </select>

                        </div>


                        <!-- LAST DELIVERY -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Delivery Date
                            </label>

                            <input type="date"
                                   class="form-control form-control-sm">

                        </div>


                        <!-- TRACKING NUMBER -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Tracking Number
                            </label>

                            <input type="text"
                                   class="form-control form-control-sm"
                                   placeholder="Enter tracking number">

                        </div>


                        <!-- DELIVERY NOTES -->
                        <div class="col-md-12">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Delivery Notes
                            </label>

                            <textarea class="form-control"
                                      rows="3"
                                      style="font-size: 13px;"
                                      placeholder="Enter delivery instructions or notes"></textarea>

                        </div>

                    </div>

                </div>

            </div>


            <!-- STATUS & NOTES -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-3">

                    <h5 class="mb-1" style="font-size: 17px;">
                        <i class="fas fa-circle-info text-primary me-2"></i>
                        Status & Notes
                    </h5>

                </div>


                <div class="card-body p-3">

                    <div class="row g-3">

                        <!-- KIT STATUS -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Kit Status
                                <span class="text-danger">*</span>
                            </label>

                            <select class="form-select form-select-sm">

                                <option selected>Active</option>
                                <option>Inactive</option>
                                <option>Low Stock</option>
                                <option>Delivered</option>

                            </select>

                        </div>


                        <!-- EXPIRY DATE -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Expiry Date
                            </label>

                            <input type="date"
                                   class="form-control form-control-sm">

                        </div>


                        <!-- NOTES -->
                        <div class="col-md-12">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Additional Notes
                            </label>

                            <textarea class="form-control"
                                      rows="3"
                                      style="font-size: 13px;"
                                      placeholder="Enter additional notes"></textarea>

                        </div>

                    </div>

                </div>

            </div>


            <!-- ACTION BUTTONS -->
            <div class="card border-0 shadow-sm">

                <div class="card-body p-3">

                    <div class="d-flex justify-content-end gap-2">

                        <a href="chemical-kits.html"
                           class="btn btn-light border btn-sm">
                            Cancel
                        </a>

                        <button type="button"
                                class="btn btn-primary btn-sm">

                            <i class="fas fa-plus me-2"></i>
                            Create Chemical Kit

                        </button>

                    </div>

                </div>

            </div>

        </div>


        <!-- RIGHT SIDE -->
        <div class="col-lg-4 mb-4">

            <!-- KIT SUMMARY -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-3">

                    <h5 class="mb-0" style="font-size: 17px;">
                        Chemical Kit Summary
                    </h5>

                </div>


                <div class="card-body p-3">

                    <div class="bg-light rounded p-3">

                        <div class="d-flex justify-content-between mb-3">

                            <span class="text-muted"
                                  style="font-size: 12px;">
                                Kit ID
                            </span>

                            <strong style="font-size: 12px;">
                                Auto Generated
                            </strong>

                        </div>


                        <div class="d-flex justify-content-between mb-3">

                            <span class="text-muted"
                                  style="font-size: 12px;">
                                Kit Type
                            </span>

                            <span style="font-size: 12px;">
                                Not selected
                            </span>

                        </div>


                        <div class="d-flex justify-content-between mb-3">

                            <span class="text-muted"
                                  style="font-size: 12px;">
                                Inventory
                            </span>

                            <span style="font-size: 12px;">
                                -- / --
                            </span>

                        </div>


                        <div class="d-flex justify-content-between mb-3">

                            <span class="text-muted"
                                  style="font-size: 12px;">
                                Assignment
                            </span>

                            <span class="badge bg-secondary"
                                  style="font-size: 10px;">
                                Available
                            </span>

                        </div>


                        <div class="d-flex justify-content-between">

                            <span class="text-muted"
                                  style="font-size: 12px;">
                                Status
                            </span>

                            <span class="badge bg-success"
                                  style="font-size: 10px;">
                                Active
                            </span>

                        </div>

                    </div>

                </div>

            </div>


            <!-- KIT WORKFLOW -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-3">

                    <h5 class="mb-0" style="font-size: 17px;">
                        Chemical Kit Workflow
                    </h5>

                </div>


                <div class="card-body p-3">

                    <!-- STEP 1 -->
                    <div class="d-flex align-items-start mb-4">

                        <div class="bg-primary text-white rounded-circle
                                    d-flex align-items-center justify-content-center
                                    me-3"
                             style="width:36px;height:36px;min-width:36px;">

                            <i class="fas fa-flask"
                               style="font-size: 13px;"></i>

                        </div>


                        <div>

                            <h6 class="fw-semibold mb-1"
                                style="font-size: 13px;">
                                1. Kit Created
                            </h6>

                            <p class="text-muted mb-0"
                               style="font-size: 11px;">
                                Add the kit and chemical inventory information.
                            </p>

                        </div>

                    </div>


                    <!-- STEP 2 -->
                    <div class="d-flex align-items-start mb-4">

                        <div class="bg-warning text-dark rounded-circle
                                    d-flex align-items-center justify-content-center
                                    me-3"
                             style="width:36px;height:36px;min-width:36px;">

                            <i class="fas fa-user-tag"
                               style="font-size: 13px;"></i>

                        </div>


                        <div>

                            <h6 class="fw-semibold mb-1"
                                style="font-size: 13px;">
                                2. Kit Assigned
                            </h6>

                            <p class="text-muted mb-0"
                               style="font-size: 11px;">
                                Assign the kit to a customer when required.
                            </p>

                        </div>

                    </div>


                    <!-- STEP 3 -->
                    <div class="d-flex align-items-start">

                        <div class="bg-success text-white rounded-circle
                                    d-flex align-items-center justify-content-center
                                    me-3"
                             style="width:36px;height:36px;min-width:36px;">

                            <i class="fas fa-truck"
                               style="font-size: 13px;"></i>

                        </div>


                        <div>

                            <h6 class="fw-semibold mb-1"
                                style="font-size: 13px;">
                                3. Delivery
                            </h6>

                            <p class="text-muted mb-0"
                               style="font-size: 11px;">
                                Track the kit until it is delivered to the customer.
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            <!-- INVENTORY STATUS -->
            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white border-0 p-3">

                    <h5 class="mb-0" style="font-size: 17px;">
                        Inventory Status
                    </h5>

                </div>


                <div class="card-body p-3">

                    <div class="d-flex align-items-center mb-3">

                        <div class="rounded-circle bg-success bg-opacity-10
                                    text-success d-flex align-items-center
                                    justify-content-center me-3"
                             style="width:34px;height:34px;">

                            <i class="fas fa-check"
                               style="font-size: 12px;"></i>

                        </div>

                        <div>

                            <div class="fw-semibold"
                                 style="font-size: 13px;">
                                Active Inventory
                            </div>

                            <small class="text-muted"
                                   style="font-size: 11px;">
                                Kit is available for assignment.
                            </small>

                        </div>

                    </div>


                    <div class="d-flex align-items-center">

                        <div class="rounded-circle bg-warning bg-opacity-10
                                    text-warning d-flex align-items-center
                                    justify-content-center me-3"
                             style="width:34px;height:34px;">

                            <i class="fas fa-exclamation"
                               style="font-size: 12px;"></i>

                        </div>

                        <div>

                            <div class="fw-semibold"
                                 style="font-size: 13px;">
                                Low Stock
                            </div>

                            <small class="text-muted"
                                   style="font-size: 11px;">
                                Monitor chemical quantities regularly.
                            </small>

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
    <!-- DELETE CHEMICAL KIT MODAL -->
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


                    <h5 class="mb-2">
                        Delete this chemical kit?
                    </h5>


                    <p class="text-muted mb-0">

                        You are about to delete
                        <strong>CK-2025-001</strong>.

                        This action cannot be undone.

                    </p>

                </div>


                <!-- FOOTER -->
                <div class="modal-footer justify-content-center">

                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">

                        Cancel

                    </button>


                    <button type="button" class="btn btn-danger">

                        <i class="fas fa-trash me-2"></i>

                        Yes, Delete

                    </button>

                </div>

            </div>

        </div>

    </div>
 @include('admin.include.footer')