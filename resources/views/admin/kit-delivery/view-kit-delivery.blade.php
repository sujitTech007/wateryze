@include('admin.include.header')

            <!-- ========== DASHBOARD CONTENT START ========== -->
           
<div class="content-area">

    <!-- Page Header -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1">View Kit Delivery</h4>
            <p class="text-muted mb-0">
                View chemical kit delivery details and tracking information.
            </p>
        </div>

        <div class="mt-2 mt-md-0">
            <a href="edit-kit-delivery.html" class="btn btn-primary me-2">
                <i class="fas fa-edit me-2"></i>
                Edit Delivery
            </a>

            <a href="kit-delivery.html" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>
                Back
            </a>
        </div>
    </div>

    <!-- Delivery Overview -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white">
            <h5 class="mb-0">Delivery Overview</h5>
        </div>

        <div class="card-body">
            <div class="row g-4">

                <div class="col-md-6">
                    <small class="text-muted d-block">Delivery ID</small>
                    <h6>#DEL-1001</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Delivery Status</small>
                    <span class="badge bg-success">Delivered</span>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Customer</small>
                    <h6>Green Valley Spa</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Delivery Date</small>
                    <h6>September 16, 2026</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Kit Type</small>
                    <h6>Water Testing Kit</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Quantity</small>
                    <h6>10 Kits</h6>
                </div>

            </div>
        </div>
    </div>

    <!-- Customer Information -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white">
            <h5 class="mb-0">Customer Information</h5>
        </div>

        <div class="card-body">
            <div class="row g-4">

                <div class="col-md-6">
                    <small class="text-muted d-block">Customer Name</small>
                    <h6>Green Valley Spa</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Contact Person</small>
                    <h6>Sarah Mitchell</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Email Address</small>
                    <h6>sarah@example.com</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Phone Number</small>
                    <h6>+1 416 555 0124</h6>
                </div>

                <div class="col-12">
                    <small class="text-muted d-block">Delivery Address</small>
                    <h6>125 Water Street, Toronto, Ontario, Canada</h6>
                </div>

            </div>
        </div>
    </div>

    <!-- Kit Information -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white">
            <h5 class="mb-0">Kit Information</h5>
        </div>

        <div class="card-body">
            <div class="row g-4">

                <div class="col-md-6">
                    <small class="text-muted d-block">Kit Type</small>
                    <h6>Water Testing Kit</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Quantity</small>
                    <h6>10</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Batch Number</small>
                    <h6>WTK-2026-0916</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Assigned Technician</small>
                    <h6>Daniel Wilson</h6>
                </div>

                <div class="col-12">
                    <small class="text-muted d-block">Delivery Notes</small>
                    <p class="mb-0">
                        Water testing kits delivered to the customer facility.
                    </p>
                </div>

            </div>
        </div>
    </div>

    <!-- Delivery Tracking -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white">
            <h5 class="mb-0">Delivery Tracking</h5>
        </div>

        <div class="card-body">
            <div class="row g-4">

                <div class="col-md-6">
                    <small class="text-muted d-block">Courier Name</small>
                    <h6>Canada Post</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Tracking Number</small>
                    <h6>CP123456789CA</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Dispatch Date</small>
                    <h6>September 15, 2026</h6>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Delivered Date</small>
                    <h6>September 16, 2026</h6>
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