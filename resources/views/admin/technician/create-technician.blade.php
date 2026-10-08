@include('admin.include.header')

            <!-- ========== DASHBOARD CONTENT START ========== -->
           

<div class="content-area">

    <!-- PAGE HEADER -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">

        <div>
            <h3 class="mb-1">Create Technician</h3>
            <p class="text-muted mb-0">
                Add a new technician and manage their service information.
            </p>
        </div>

        <a href="../technician/technician.html"
           class="btn btn-primary mt-3 mt-md-0">
            <i class="fas fa-arrow-left me-2"></i>
            Back to Technicians
        </a>

    </div>


    <div class="row">

        <!-- LEFT SIDE -->
        <div class="col-lg-8 mb-4">

            <!-- PERSONAL INFORMATION -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-4">

                    <h5 class="mb-1">
                        <i class="fas fa-user text-primary me-2"></i>
                        Personal Information
                    </h5>

                    <p class="text-muted small mb-0">
                        Enter the technician's basic personal and contact details.
                    </p>

                </div>


                <div class="card-body p-4">

                    <div class="row g-3">

                        <!-- First Name -->
                        <div class="col-md-6">

                            <label class="form-label ">
                                First Name <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                   class="form-control"
                                   placeholder="Enter first name">

                        </div>


                        <!-- Last Name -->
                        <div class="col-md-6">

                            <label class="form-label ">
                                Last Name <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                   class="form-control"
                                   placeholder="Enter last name">

                        </div>


                        <!-- Email -->
                        <div class="col-md-6">

                            <label class="form-label ">
                                Email Address <span class="text-danger">*</span>
                            </label>

                            <input type="email"
                                   class="form-control"
                                   placeholder="Enter email address">

                        </div>


                        <!-- Phone -->
                        <div class="col-md-6">

                            <label class="form-label ">
                                Phone Number <span class="text-danger">*</span>
                            </label>

                            <input type="tel"
                                   class="form-control"
                                   placeholder="Enter phone number">

                        </div>


                        <!-- Date of Birth -->
                        <div class="col-md-6">

                            <label class="form-label ">
                                Date of Birth
                            </label>

                            <input type="date"
                                   class="form-control">

                        </div>


                        <!-- Employee ID -->
                        <div class="col-md-6">

                            <label class="form-label ">
                                Employee ID
                            </label>

                            <input type="text"
                                   class="form-control"
                                   placeholder="Enter employee ID">

                        </div>

                    </div>

                </div>

            </div>


            <!-- ADDRESS INFORMATION -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-4">

                    <h5 class="mb-1">
                        <i class="fas fa-location-dot text-primary me-2"></i>
                        Address Information
                    </h5>

                    <p class="text-muted small mb-0">
                        Enter the technician's residential or service address.
                    </p>

                </div>


                <div class="card-body p-4">

                    <div class="row g-3">

                        <!-- Address -->
                        <div class="col-md-12">

                            <label class="form-label ">
                                Address
                            </label>

                            <textarea class="form-control"
                                      rows="3"
                                      placeholder="Enter complete address"></textarea>

                        </div>


                        <!-- City -->
                        <div class="col-md-4">

                            <label class="form-label ">
                                City
                            </label>

                            <input type="text"
                                   class="form-control"
                                   placeholder="Enter city">

                        </div>


                        <!-- Province -->
                        <div class="col-md-4">

                            <label class="form-label ">
                                Province
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

                            <label class="form-label ">
                                Postal Code
                            </label>

                            <input type="text"
                                   class="form-control"
                                   placeholder="Enter postal code">

                        </div>

                    </div>

                </div>

            </div>


            <!-- PROFESSIONAL INFORMATION -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-4">

                    <h5 class="mb-1">
                        <i class="fas fa-briefcase text-primary me-2"></i>
                        Professional Information
                    </h5>

                    <p class="text-muted small mb-0">
                        Add technician qualifications and service capabilities.
                    </p>

                </div>


                <div class="card-body p-4">

                    <div class="row g-3">

                        <!-- Specialization -->
                        <div class="col-md-6">

                            <label class="form-label ">
                                Specialization
                            </label>

                            <select class="form-select">

                                <option selected disabled>
                                    Select specialization
                                </option>

                                <option>Water Testing</option>
                                <option>Wastewater Treatment</option>
                                <option>Water Quality Inspection</option>
                                <option>Compliance Inspection</option>
                                <option>Equipment Maintenance</option>

                            </select>

                        </div>


                        <!-- Experience -->
                        <div class="col-md-6">

                            <label class="form-label ">
                                Years of Experience
                            </label>

                            <input type="number"
                                   class="form-control"
                                   min="0"
                                   placeholder="Enter years of experience">

                        </div>


                        <!-- Assigned Sites -->
                        <div class="col-md-6">

                            <label class="form-label ">
                                Assigned Sites
                            </label>

                            <input type="number"
                                   class="form-control"
                                   min="0"
                                   placeholder="Enter number of sites">

                        </div>


                        <!-- Availability -->
                        <div class="col-md-6">

                            <label class="form-label ">
                                Availability
                            </label>

                            <select class="form-select">

                                <option selected>Available</option>
                                <option>Unavailable</option>
                                <option>On Leave</option>

                            </select>

                        </div>


                        <!-- Services -->
                        <div class="col-md-12">

                            <label class="form-label ">
                                Services
                            </label>

                            <textarea class="form-control"
                                      rows="3"
                                      placeholder="Enter services the technician can perform"></textarea>

                        </div>

                    </div>

                </div>

            </div>


            <!-- VERIFICATION -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-4">

                    <h5 class="mb-1">
                        <i class="fas fa-user-check text-primary me-2"></i>
                        Verification
                    </h5>

                    <p class="text-muted small mb-0">
                        Set the technician verification status.
                    </p>

                </div>


                <div class="card-body p-4">

                    <div class="row g-3">

                        <!-- Verification Status -->
                        <div class="col-md-6">

                            <label class="form-label ">
                                Verification Status
                            </label>

                            <select class="form-select">

                                <option selected>Pending Verification</option>
                                <option>Verified</option>
                                <option>Rejected</option>

                            </select>

                        </div>


                        <!-- Verification Date -->
                        <div class="col-md-6">

                            <label class="form-label ">
                                Verification Date
                            </label>

                            <input type="date"
                                   class="form-control">

                        </div>


                        <!-- Notes -->
                        <div class="col-md-12">

                            <label class="form-label ">
                                Verification Notes
                            </label>

                            <textarea class="form-control"
                                      rows="3"
                                      placeholder="Enter verification notes"></textarea>

                        </div>

                    </div>

                </div>

            </div>


            <!-- ACTION BUTTONS -->
            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-end gap-2">

                        <a href="technicians.html"
                           class="btn btn-light border">
                            Cancel
                        </a>

                        <button type="button"
                                class="btn btn-primary">

                            <i class="fas fa-user-plus me-2"></i>
                            Create Technician

                        </button>

                    </div>

                </div>

            </div>

        </div>


        <!-- RIGHT SIDE -->
        <div class="col-lg-4 mb-4">

            <!-- TECHNICIAN SUMMARY -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-4">

                    <h5 class="mb-0">
                        Technician Summary
                    </h5>

                </div>


                <div class="card-body p-4">

                    <div class="bg-light rounded p-3">

                        <div class="d-flex justify-content-between mb-3">

                            <span class="text-muted">
                                Technician ID
                            </span>

                            <strong>
                                Auto Generated
                            </strong>

                        </div>


                        <div class="d-flex justify-content-between mb-3">

                            <span class="text-muted">
                                Verification
                            </span>

                            <span class="badge bg-warning text-dark">
                                Pending
                            </span>

                        </div>


                        <div class="d-flex justify-content-between mb-3">

                            <span class="text-muted">
                                Availability
                            </span>

                            <span class="badge bg-success">
                                Available
                            </span>

                        </div>


                        <div class="d-flex justify-content-between">

                            <span class="text-muted">
                                Assigned Sites
                            </span>

                            <span>
                                0
                            </span>

                        </div>

                    </div>

                </div>

            </div>


            <!-- TECHNICIAN PROCESS -->
            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white border-0 p-4">

                    <h5 class="mb-0">
                        Technician Process
                    </h5>

                </div>


                <div class="card-body p-4">

                    <!-- STEP 1 -->
                    <div class="d-flex align-items-start mb-4">

                        <div class="bg-primary text-white rounded-circle
                                    d-flex align-items-center justify-content-center
                                    me-3"
                             style="width:40px;height:40px;min-width:40px;">

                            <i class="fas fa-user-plus"></i>

                        </div>


                        <div>

                            <h6 class=" mb-1">
                                1. Technician Created
                            </h6>

                            <p class="text-muted small mb-0">
                                Add the technician's personal and professional information.
                            </p>

                        </div>

                    </div>


                    <!-- STEP 2 -->
                    <div class="d-flex align-items-start mb-4">

                        <div class="bg-warning text-dark rounded-circle
                                    d-flex align-items-center justify-content-center
                                    me-3"
                             style="width:40px;height:40px;min-width:40px;">

                            <i class="fas fa-user-clock"></i>

                        </div>


                        <div>

                            <h6 class=" mb-1">
                                2. Verification
                            </h6>

                            <p class="text-muted small mb-0">
                                Admin reviews and verifies technician information.
                            </p>

                        </div>

                    </div>


                    <!-- STEP 3 -->
                    <div class="d-flex align-items-start">

                        <div class="bg-success text-white rounded-circle
                                    d-flex align-items-center justify-content-center
                                    me-3"
                             style="width:40px;height:40px;min-width:40px;">

                            <i class="fas fa-user-check"></i>

                        </div>


                        <div>

                            <h6 class=" mb-1">
                                3. Ready for Assignment
                            </h6>

                            <p class="text-muted small mb-0">
                                Verified technicians can be assigned to service sites.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- Delete Technician Modal -->
<div class="modal fade" id="deleteTechnicianModal" tabindex="-1"
     aria-labelledby="deleteTechnicianModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="deleteTechnicianModalLabel">
                    Delete Technician
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                </button>
            </div>

            <div class="modal-body">
                Are you sure you want to delete this technician?
                This action cannot be undone.
            </div>

            <div class="modal-footer">
                <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                    Cancel
                </button>

                <a href="delete-technician.html"
                   class="btn btn-danger">
                    Delete Technician
                </a>
            </div>

        </div>
    </div>
</div>
            <!-- ========== DASHBOARD CONTENT END ========== -->
        </div>
        <!-- ========== MAIN CONTENT END ========== -->
    </div>

   @include('admin.include.footer')