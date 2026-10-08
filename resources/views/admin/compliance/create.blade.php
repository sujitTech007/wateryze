@include('admin.include.header')

            <!-- ========== DASHBOARD CONTENT START ========== -->
            <div class="content-area">

    <!-- PAGE HEADER -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">

        <div>
            <h3 class="mb-1">Create Compliance Record</h3>
            <p class="text-muted mb-0" style="font-size: 13px;">
                Add and verify a wastewater treatment compliance record.
            </p>
        </div>

        <a href="compliance.html"
           class="btn btn-primary btn-sm mt-3 mt-md-0">
            <i class="fas fa-arrow-left me-2"></i>
            Back to Compliance
        </a>

    </div>


    <div class="row">

        <!-- LEFT SIDE -->
        <div class="col-lg-8 mb-4">

            <!-- CUSTOMER & SITE INFORMATION -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-3">

                    <h5 class="mb-1" style="font-size: 17px;">
                        <i class="fas fa-building text-primary me-2"></i>
                        Customer & Site Information
                    </h5>

                    <p class="text-muted mb-0" style="font-size: 12px;">
                        Select the customer and wastewater treatment site.
                    </p>

                </div>


                <div class="card-body p-3">

                    <div class="row g-3">

                        <!-- CUSTOMER -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Customer <span class="text-danger">*</span>
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


                        <!-- SITE ID -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Site ID <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                   class="form-control form-control-sm"
                                   placeholder="e.g. WZ-2025-001">

                        </div>


                        <!-- SITE NAME -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Site Name
                            </label>

                            <input type="text"
                                   class="form-control form-control-sm"
                                   placeholder="Enter site name">

                        </div>


                        <!-- LOCATION -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Location
                            </label>

                            <input type="text"
                                   class="form-control form-control-sm"
                                   placeholder="City, Province">

                        </div>

                    </div>

                </div>

            </div>


            <!-- COMPLIANCE INFORMATION -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-3">

                    <h5 class="mb-1" style="font-size: 17px;">
                        <i class="fas fa-clipboard-check text-primary me-2"></i>
                        Compliance Information
                    </h5>

                    <p class="text-muted mb-0" style="font-size: 12px;">
                        Enter the compliance assessment details.
                    </p>

                </div>


                <div class="card-body p-3">

                    <div class="row g-3">

                        <!-- COMPLIANCE SCORE -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Compliance Score
                                <span class="text-danger">*</span>
                            </label>

                            <div class="input-group input-group-sm">

                                <input type="number"
                                       class="form-control"
                                       min="0"
                                       max="100"
                                       placeholder="Enter score">

                                <span class="input-group-text">
                                    %
                                </span>

                            </div>

                            <small class="text-muted" style="font-size: 11px;">
                                Enter a score between 0 and 100.
                            </small>

                        </div>


                        <!-- COMPLIANCE STATUS -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Compliance Status
                                <span class="text-danger">*</span>
                            </label>

                            <select class="form-select form-select-sm">

                                <option selected disabled>
                                    Select status
                                </option>

                                <option>Compliant</option>
                                <option>Warning</option>
                                <option>Non-Compliant</option>

                            </select>

                        </div>


                        <!-- VERIFICATION -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Verification
                            </label>

                            <select class="form-select form-select-sm">

                                <option selected>
                                    Pending
                                </option>

                                <option>Verified</option>
                                <option>Review Required</option>
                                <option>Rejected</option>

                            </select>

                        </div>


                        <!-- LAST AUDIT -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Last Audit Date
                            </label>

                            <input type="date"
                                   class="form-control form-control-sm">

                        </div>


                        <!-- NEXT AUDIT -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Next Audit Date
                            </label>

                            <input type="date"
                                   class="form-control form-control-sm">

                        </div>


                        <!-- AUDIT TYPE -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Audit Type
                            </label>

                            <select class="form-select form-select-sm">

                                <option selected disabled>
                                    Select audit type
                                </option>

                                <option>Routine Audit</option>
                                <option>Compliance Audit</option>
                                <option>Environmental Audit</option>
                                <option>Follow-up Audit</option>

                            </select>

                        </div>

                    </div>

                </div>

            </div>


            <!-- WATER QUALITY & AUDIT DETAILS -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-3">

                    <h5 class="mb-1" style="font-size: 17px;">
                        <i class="fas fa-water text-primary me-2"></i>
                        Audit Details
                    </h5>

                    <p class="text-muted mb-0" style="font-size: 12px;">
                        Add observations and compliance notes.
                    </p>

                </div>


                <div class="card-body p-3">

                    <div class="row g-3">

                        <!-- OBSERVATIONS -->
                        <div class="col-md-12">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Audit Observations
                            </label>

                            <textarea class="form-control"
                                      rows="3"
                                      style="font-size: 13px;"
                                      placeholder="Enter audit observations"></textarea>

                        </div>


                        <!-- NON COMPLIANCE ISSUES -->
                        <div class="col-md-12">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Non-Compliance Issues
                            </label>

                            <textarea class="form-control"
                                      rows="3"
                                      style="font-size: 13px;"
                                      placeholder="Enter any identified compliance issues"></textarea>

                        </div>


                        <!-- CORRECTIVE ACTION -->
                        <div class="col-md-12">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Corrective Action
                            </label>

                            <textarea class="form-control"
                                      rows="3"
                                      style="font-size: 13px;"
                                      placeholder="Enter required corrective actions"></textarea>

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


            <!-- VERIFICATION INFORMATION -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-3">

                    <h5 class="mb-1" style="font-size: 17px;">
                        <i class="fas fa-user-check text-primary me-2"></i>
                        Verification Information
                    </h5>

                    <p class="text-muted mb-0" style="font-size: 12px;">
                        Record the administrator verification details.
                    </p>

                </div>


                <div class="card-body p-3">

                    <div class="row g-3">

                        <!-- VERIFIED BY -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Verified By
                            </label>

                            <input type="text"
                                   class="form-control form-control-sm"
                                   placeholder="Enter administrator name">

                        </div>


                        <!-- VERIFICATION DATE -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Verification Date
                            </label>

                            <input type="date"
                                   class="form-control form-control-sm">

                        </div>

                    </div>

                </div>

            </div>


            <!-- ACTION BUTTONS -->
            <div class="card border-0 shadow-sm">

                <div class="card-body p-3">

                    <div class="d-flex justify-content-end gap-2">

                        <a href="compliance.html"
                           class="btn btn-light border btn-sm">
                            Cancel
                        </a>

                        <button type="button"
                                class="btn btn-primary btn-sm">

                            <i class="fas fa-plus me-2"></i>
                            Create Compliance Record

                        </button>

                    </div>

                </div>

            </div>

        </div>


        <!-- RIGHT SIDE -->
        <div class="col-lg-4 mb-4">

            <!-- RECORD SUMMARY -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-3">

                    <h5 class="mb-0" style="font-size: 17px;">
                        Compliance Summary
                    </h5>

                </div>


                <div class="card-body p-3">

                    <div class="bg-light rounded p-3">

                        <div class="d-flex justify-content-between mb-3">

                            <span class="text-muted"
                                  style="font-size: 12px;">
                                Record ID
                            </span>

                            <strong style="font-size: 12px;">
                                Auto Generated
                            </strong>

                        </div>


                        <div class="d-flex justify-content-between mb-3">

                            <span class="text-muted"
                                  style="font-size: 12px;">
                                Compliance Score
                            </span>

                            <strong style="font-size: 13px;">
                                -- %
                            </strong>

                        </div>


                        <div class="d-flex justify-content-between mb-3">

                            <span class="text-muted"
                                  style="font-size: 12px;">
                                Verification
                            </span>

                            <span class="badge bg-warning text-dark"
                                  style="font-size: 10px;">
                                Pending
                            </span>

                        </div>


                        <div class="d-flex justify-content-between">

                            <span class="text-muted"
                                  style="font-size: 12px;">
                                Status
                            </span>

                            <span class="badge bg-secondary"
                                  style="font-size: 10px;">
                                Not Set
                            </span>

                        </div>

                    </div>

                </div>

            </div>


            <!-- COMPLIANCE WORKFLOW -->
            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white border-0 p-3">

                    <h5 class="mb-0" style="font-size: 17px;">
                        Compliance Workflow
                    </h5>

                </div>


                <div class="card-body p-3">

                    <!-- STEP 1 -->
                    <div class="d-flex align-items-start mb-4">

                        <div class="bg-primary text-white rounded-circle
                                    d-flex align-items-center justify-content-center
                                    me-3"
                             style="width:36px;height:36px;min-width:36px;">

                            <i class="fas fa-file-circle-plus"
                               style="font-size: 13px;"></i>

                        </div>


                        <div>

                            <h6 class="fw-semibold mb-1"
                                style="font-size: 13px;">
                                1. Record Created
                            </h6>

                            <p class="text-muted mb-0"
                               style="font-size: 11px;">
                                Add the customer and compliance information.
                            </p>

                        </div>

                    </div>


                    <!-- STEP 2 -->
                    <div class="d-flex align-items-start mb-4">

                        <div class="bg-warning text-dark rounded-circle
                                    d-flex align-items-center justify-content-center
                                    me-3"
                             style="width:36px;height:36px;min-width:36px;">

                            <i class="fas fa-clock"
                               style="font-size: 13px;"></i>

                        </div>


                        <div>

                            <h6 class="fw-semibold mb-1"
                                style="font-size: 13px;">
                                2. Verification
                            </h6>

                            <p class="text-muted mb-0"
                               style="font-size: 11px;">
                                Compliance data is reviewed by the administrator.
                            </p>

                        </div>

                    </div>


                    <!-- STEP 3 -->
                    <div class="d-flex align-items-start">

                        <div class="bg-success text-white rounded-circle
                                    d-flex align-items-center justify-content-center
                                    me-3"
                             style="width:36px;height:36px;min-width:36px;">

                            <i class="fas fa-check"
                               style="font-size: 13px;"></i>

                        </div>


                        <div>

                            <h6 class="fw-semibold mb-1"
                                style="font-size: 13px;">
                                3. Compliance Verified
                            </h6>

                            <p class="text-muted mb-0"
                               style="font-size: 11px;">
                                Verified records become part of the compliance history.
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

   @include('admin.include.footer')