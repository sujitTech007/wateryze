@include('admin.include.header')

            <!-- ========== DASHBOARD CONTENT START ========== -->
           


<div class="content-area">

    <!-- Page Header -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1">View Partner Lab</h4>
            <p class="text-muted mb-0">
                View laboratory partner details and onboarding information.
            </p>
        </div>

        <div class="mt-2 mt-md-0">
            <a href="edit-partner-lab.html" class="btn btn-primary me-2">
                <i class="fas fa-edit me-2"></i>
                Edit Lab
            </a>

            <a href="partner-labs.html" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>
                Back
            </a>
        </div>
    </div>

    <!-- Lab Overview -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white">
            <h5 class="mb-0">Laboratory Overview</h5>
        </div>

        <div class="card-body">
            <div class="row g-4">

                <div class="col-md-6">
                    <small class="text-muted d-block">Lab ID</small>
                    <h6>#LAB-1001</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Laboratory Name</small>
                    <h6>ClearWater Analytics</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Laboratory Type</small>
                    <h6>Water Testing Laboratory</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Status</small>
                    <span class="badge bg-success">Active</span>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Onboarding Date</small>
                    <h6>September 02, 2026</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Last Updated</small>
                    <h6>September 15, 2026</h6>
                </div>

            </div>
        </div>
    </div>

    <!-- Contact Information -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white">
            <h5 class="mb-0">Contact Information</h5>
        </div>

        <div class="card-body">
            <div class="row g-4">

                <div class="col-md-6">
                    <small class="text-muted d-block">Contact Person</small>
                    <h6>Sarah Mitchell</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Email Address</small>
                    <h6>sarah@clearwateranalytics.com</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Phone Number</small>
                    <h6>+1 416 555 0124</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Website</small>
                    <h6>www.clearwateranalytics.com</h6>
                </div>

            </div>
        </div>
    </div>

    <!-- Location Information -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white">
            <h5 class="mb-0">Location Information</h5>
        </div>

        <div class="card-body">
            <div class="row g-4">

                <div class="col-md-6">
                    <small class="text-muted d-block">Address</small>
                    <h6>125 Water Street</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">City</small>
                    <h6>Toronto</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Province</small>
                    <h6>Ontario</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Postal Code</small>
                    <h6>M5V 2N8</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Country</small>
                    <h6>Canada</h6>
                </div>

            </div>
        </div>
    </div>

    <!-- Partnership Details -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white">
            <h5 class="mb-0">Partnership Details</h5>
        </div>

        <div class="card-body">
            <div class="row g-4">

                <div class="col-md-6">
                    <small class="text-muted d-block">Services Offered</small>
                    <p class="mb-0">
                        Water quality testing, wastewater analysis, compliance testing
                    </p>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Assigned Sites</small>
                    <h6>12 Sites</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Verification Status</small>
                    <span class="badge bg-success">Verified</span>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Partnership Notes</small>
                    <p class="mb-0">
                        Approved laboratory partner for Ontario pilot customers.
                    </p>
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