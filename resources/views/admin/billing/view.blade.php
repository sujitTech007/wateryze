@include('admin.include.header')


            <!-- ========== DASHBOARD CONTENT START ========== -->
           

<div class="content-area">

    <!-- Page Header -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1">View Invoice</h4>
            <p class="text-muted mb-0">
                View invoice details, customer information, and payment status.
            </p>
        </div>

        <div class="mt-2 mt-md-0">
            <a href="edit-invoice.html" class="btn btn-primary me-2">
                <i class="fas fa-edit me-2"></i>
                Edit Invoice
            </a>

            <a href="billing.html" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>
                Back
            </a>
        </div>
    </div>

    <!-- Invoice Summary -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">

            <div class="row g-4 align-items-center">

                <div class="col-md-6">
                    <h5 class="mb-2">Invoice #INV-1001</h5>
                    <p class="text-muted mb-1">Issued on September 01, 2026</p>
                    <p class="text-muted mb-0">Due date: September 15, 2026</p>
                </div>

                <div class="col-md-6 text-md-end">
                    <h3 class="mb-2">CAD 299.00</h3>
                    <span class="badge bg-success">PAID</span>
                </div>

            </div>

        </div>
    </div>

    <!-- Customer and Billing Details -->
    <div class="row g-4 mb-4">

        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Customer Information</h5>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <small class="text-muted d-block">Customer Name</small>
                        <h6 class="mb-0">Green Valley Spa</h6>
                    </div>

                    <div class="mb-3">
                        <small class="text-muted d-block">Contact Person</small>
                        <h6 class="mb-0">Sarah Mitchell</h6>
                    </div>

                    <div class="mb-3">
                        <small class="text-muted d-block">Email Address</small>
                        <h6 class="mb-0">sarah@example.com</h6>
                    </div>

                    <div>
                        <small class="text-muted d-block">Phone Number</small>
                        <h6 class="mb-0">+1 416 555 0124</h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Billing Address</h5>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <small class="text-muted d-block">Company</small>
                        <h6 class="mb-0">Green Valley Spa</h6>
                    </div>

                    <div class="mb-3">
                        <small class="text-muted d-block">Address</small>
                        <h6 class="mb-0">125 Water Street</h6>
                    </div>

                    <div class="mb-3">
                        <small class="text-muted d-block">City and Province</small>
                        <h6 class="mb-0">Toronto, Ontario</h6>
                    </div>

                    <div>
                        <small class="text-muted d-block">Country and Postal Code</small>
                        <h6 class="mb-0">Canada, M5V 2N8</h6>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Invoice Details -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white">
            <h5 class="mb-0">Invoice Details</h5>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">

                <table class="table table-bordered align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Description</th>
                            <th>Plan</th>
                            <th>Billing Period</th>
                            <th class="text-end">Amount</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>
                                <h6 class="mb-1">Wateryze Subscription</h6>
                                <small class="text-muted">
                                    Monthly wastewater compliance subscription
                                </small>
                            </td>
                            <td>Starter</td>
                            <td>September 2026</td>
                            <td class="text-end">CAD 299.00</td>
                        </tr>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-end">Subtotal</th>
                            <td class="text-end">CAD 299.00</td>
                        </tr>

                        <tr>
                            <th colspan="3" class="text-end">Tax</th>
                            <td class="text-end">CAD 0.00</td>
                        </tr>

                        <tr>
                            <th colspan="3" class="text-end">Total Amount</th>
                            <th class="text-end">CAD 299.00</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>

    <!-- Payment Information -->
    <div class="row g-4 mb-4">

        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Payment Information</h5>
                </div>

                <div class="card-body">

                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted">Payment Status</span>
                        <span class="badge bg-success">Paid</span>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted">Payment Method</span>
                        <strong>Visa</strong>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted">Card Number</span>
                        <strong>•••• 4582</strong>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted">Transaction ID</span>
                        <strong>TXN-2026-1001</strong>
                    </div>

                    <div class="d-flex justify-content-between">
                        <span class="text-muted">Payment Date</span>
                        <strong>September 10, 2026</strong>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Invoice Notes</h5>
                </div>

                <div class="card-body">
                    <p class="text-muted mb-0">
                        Thank you for using Wateryze. This invoice covers the monthly
                        Starter subscription plan for September 2026.
                    </p>
                </div>
            </div>
        </div>

    </div>

    <!-- Actions -->
    <div class="d-flex flex-wrap justify-content-end gap-2">

        <a href="download-invoice.html" class="btn btn-outline-secondary">
            <i class="fas fa-download me-2"></i>
            Download Invoice
        </a>

        <a href="send-invoice.html" class="btn btn-outline-primary">
            <i class="fas fa-envelope me-2"></i>
            Send Invoice
        </a>

        <a href="billing.html" class="btn btn-primary">
            <i class="fas fa-check me-2"></i>
            Done
        </a>

    </div>

</div>
            <!-- ========== DASHBOARD CONTENT END ========== -->
        </div>
        <!-- ========== MAIN CONTENT END ========== -->
    </div>

  @include('admin.include.footer')