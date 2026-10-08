@include('admin.include.header')

            <!-- ========== DASHBOARD CONTENT START ========== -->
           


<div class="content-area">

    <!-- PAGE HEADER -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">

        <div>
            <h3 class="mb-1">Create Partner Lab</h3>
            <p class="text-muted mb-0">
                Add a new partner laboratory and manage its onboarding details.
            </p>
        </div>

        <a href="../partner-lab/partner-labs.html"
           class="btn btn-primary mt-3 mt-md-0">
            <i class="fas fa-arrow-left me-2"></i>
            Back to Partner Labs
        </a>

    </div>


    <div class="row">

        <!-- LEFT SIDE -->
        <div class="col-lg-8 mb-4">

            <!-- LABORATORY INFORMATION -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-4">

                    <h5 class="mb-1">
                        <i class="fas fa-flask text-primary me-2"></i>
                        Laboratory Information
                    </h5>

                    <p class="text-muted small mb-0">
                        Enter the basic information about the partner laboratory.
                    </p>

                </div>


                <div class="card-body p-4">

                    <div class="row g-3">

                        <!-- Laboratory Name -->
                        <div class="col-md-12">

                            <label class="form-label">
                                Laboratory Name
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                   class="form-control"
                                   placeholder="Enter laboratory name">

                        </div>


                        <!-- Laboratory Type -->
                        <div class="col-md-6">

                            <label class="form-label">
                                Laboratory Type
                                <span class="text-danger">*</span>
                            </label>

                            <select class="form-select">

                                <option selected disabled>
                                    Select laboratory type
                                </option>

                                <option>Water Testing Laboratory</option>
                                <option>Environmental Testing</option>
                                <option>Compliance Laboratory</option>
                                <option>Chemical Testing Laboratory</option>
                                <option>Other</option>

                            </select>

                        </div>


                        <!-- Lab Registration Number -->
                        <div class="col-md-6">

                            <label class="form-label">
                                Registration Number
                            </label>

                            <input type="text"
                                   class="form-control"
                                   placeholder="Enter registration number">

                        </div>


                        <!-- Website -->
                        <div class="col-md-6">

                            <label class="form-label">
                                Website
                            </label>

                            <input type="url"
                                   class="form-control"
                                   placeholder="https://example.com">

                        </div>


                        <!-- Email -->
                        <div class="col-md-6">

                            <label class="form-label">
                                Laboratory Email
                                <span class="text-danger">*</span>
                            </label>

                            <input type="email"
                                   class="form-control"
                                   placeholder="Enter laboratory email">

                        </div>

                    </div>

                </div>

            </div>


            <!-- CONTACT INFORMATION -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-4">

                    <h5 class="mb-1">
                        <i class="fas fa-address-book text-primary me-2"></i>
                        Contact Information
                    </h5>

                    <p class="text-muted small mb-0">
                        Add the primary contact person for the laboratory.
                    </p>

                </div>


                <div class="card-body p-4">

                    <div class="row g-3">

                        <!-- Contact Person -->
                        <div class="col-md-6">

                            <label class="form-label">
                                Contact Person
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                   class="form-control"
                                   placeholder="Enter contact person">

                        </div>


                        <!-- Contact Phone -->
                        <div class="col-md-6">

                            <label class="form-label">
                                Contact Phone
                                <span class="text-danger">*</span>
                            </label>

                            <input type="tel"
                                   class="form-control"
                                   placeholder="Enter phone number">

                        </div>


                        <!-- Contact Email -->
                        <div class="col-md-6">

                            <label class="form-label">
                                Contact Email
                            </label>

                            <input type="email"
                                   class="form-control"
                                   placeholder="Enter contact email">

                        </div>


                        <!-- Position -->
                        <div class="col-md-6">

                            <label class="form-label">
                                Position / Role
                            </label>

                            <input type="text"
                                   class="form-control"
                                   placeholder="e.g. Laboratory Manager">

                        </div>

                    </div>

                </div>

            </div>


            <!-- LOCATION INFORMATION -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-4">

                    <h5 class="mb-1">
                        <i class="fas fa-location-dot text-primary me-2"></i>
                        Laboratory Location
                    </h5>

                    <p class="text-muted small mb-0">
                        Enter the physical location of the partner laboratory.
                    </p>

                </div>


                <div class="card-body p-4">

                    <div class="row g-3">

                        <!-- Address -->
                        <div class="col-md-12">

                            <label class="form-label">
                                Address
                                <span class="text-danger">*</span>
                            </label>

                            <textarea class="form-control"
                                      rows="3"
                                      placeholder="Enter complete laboratory address"></textarea>

                        </div>


                        <!-- City -->
                        <div class="col-md-4">

                            <label class="form-label">
                                City
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                   class="form-control"
                                   placeholder="Enter city">

                        </div>


                        <!-- Province -->
                        <div class="col-md-4">

                            <label class="form-label">
                                Province
                                <span class="text-danger">*</span>
                            </label>

                            <select class="form-select">

                                <option selected disabled>
                                    Select province
                                </option>

                                <option>Ontario</option>
                                <option>British Columbia</option>
                                <option>Alberta</option>
                                <option>Quebec</option>
                                <option>Manitoba</option>
                                <option>Saskatchewan</option>

                            </select>

                        </div>


                        <!-- Postal Code -->
                        <div class="col-md-4">

                            <label class="form-label">
                                Postal Code
                            </label>

                            <input type="text"
                                   class="form-control"
                                   placeholder="Enter postal code">

                        </div>

                    </div>

                </div>

            </div>


            <!-- ONBOARDING & VERIFICATION -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-4">

                    <h5 class="mb-1">
                        <i class="fas fa-user-check text-primary me-2"></i>
                        Onboarding & Verification
                    </h5>

                    <p class="text-muted small mb-0">
                        Manage the laboratory onboarding and verification status.
                    </p>

                </div>


                <div class="card-body p-4">

                    <div class="row g-3">

                        <!-- Status -->
                        <div class="col-md-6">

                            <label class="form-label">
                                Status
                            </label>

                            <select class="form-select">

                                <option selected>Pending Verification</option>
                                <option>Active</option>
                                <option>Inactive</option>
                                <option>Rejected</option>

                            </select>

                        </div>


                        <!-- Onboarding Date -->
                        <div class="col-md-6">

                            <label class="form-label">
                                Onboarding Date
                            </label>

                            <input type="date"
                                   class="form-control">

                        </div>


                        <!-- Verification Date -->
                        <div class="col-md-6">

                            <label class="form-label">
                                Verification Date
                            </label>

                            <input type="date"
                                   class="form-control">

                        </div>


                        <!-- Verification Contact -->
                        <div class="col-md-6">

                            <label class="form-label">
                                Verified By
                            </label>

                            <input type="text"
                                   class="form-control"
                                   placeholder="Enter admin name">

                        </div>


                        <!-- Notes -->
                        <div class="col-md-12">

                            <label class="form-label">
                                Notes
                            </label>

                            <textarea class="form-control"
                                      rows="4"
                                      placeholder="Enter onboarding or verification notes"></textarea>

                        </div>

                    </div>

                </div>

            </div>


            <!-- ACTION BUTTONS -->
            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-end gap-2">

                        <a href="partner-labs.html"
                           class="btn btn-light border">
                            Cancel
                        </a>

                        <button type="button"
                                class="btn btn-primary">

                            <i class="fas fa-plus me-2"></i>
                            Create Partner Lab

                        </button>

                    </div>

                </div>

            </div>

        </div>


        <!-- RIGHT SIDE -->
        <div class="col-lg-4 mb-4">

            <!-- LAB SUMMARY -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-4">

                    <h5 class="mb-0">
                        Partner Lab Summary
                    </h5>

                </div>


                <div class="card-body p-4">

                    <div class="bg-light rounded p-3">

                        <div class="d-flex justify-content-between mb-3">

                            <span class="text-muted">
                                Lab ID
                            </span>

                            <strong>
                                Auto Generated
                            </strong>

                        </div>


                        <div class="d-flex justify-content-between mb-3">

                            <span class="text-muted">
                                Status
                            </span>

                            <span class="badge bg-warning text-dark">
                                Pending
                            </span>

                        </div>


                        <div class="d-flex justify-content-between mb-3">

                            <span class="text-muted">
                                Laboratory Type
                            </span>

                            <span>
                                Not selected
                            </span>

                        </div>


                        <div class="d-flex justify-content-between">

                            <span class="text-muted">
                                Location
                            </span>

                            <span>
                                Not specified
                            </span>

                        </div>

                    </div>

                </div>

            </div>


            <!-- ONBOARDING PROCESS -->
            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white border-0 p-4">

                    <h5 class="mb-0">
                        Lab Onboarding Process
                    </h5>

                </div>


                <div class="card-body p-4">

                    <!-- STEP 1 -->
                    <div class="d-flex align-items-start mb-4">

                        <div class="bg-primary text-white rounded-circle
                                    d-flex align-items-center justify-content-center
                                    me-3"
                             style="width:40px;height:40px;min-width:40px;">

                            <i class="fas fa-plus"></i>

                        </div>


                        <div>

                            <h6 class= mb-1">
                                1. Lab Added
                            </h6>

                            <p class="text-muted small mb-0">
                                Enter the laboratory and contact information.
                            </p>

                        </div>

                    </div>


                    <!-- STEP 2 -->
                    <div class="d-flex align-items-start mb-4">

                        <div class="bg-warning text-dark rounded-circle
                                    d-flex align-items-center justify-content-center
                                    me-3"
                             style="width:40px;height:40px;min-width:40px;">

                            <i class="fas fa-clock"></i>

                        </div>


                        <div>

                            <h6 class= mb-1">
                                2. Verification
                            </h6>

                            <p class="text-muted small mb-0">
                                Admin reviews the laboratory information.
                            </p>

                        </div>

                    </div>


                    <!-- STEP 3 -->
                    <div class="d-flex align-items-start">

                        <div class="bg-success text-white rounded-circle
                                    d-flex align-items-center justify-content-center
                                    me-3"
                             style="width:40px;height:40px;min-width:40px;">

                            <i class="fas fa-check"></i>

                        </div>


                        <div>

                            <h6 class= mb-1">
                                3. Lab Activated
                            </h6>

                            <p class="text-muted small mb-0">
                                Verified labs become active partners.
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