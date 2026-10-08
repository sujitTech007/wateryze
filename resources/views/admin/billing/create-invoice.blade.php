@include('admin.include.header')

            <!-- ========== DASHBOARD CONTENT START ========== -->
           

<div class="content-area">

    <!-- Page Header -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">

        <div>
            <h3 class="mb-1">Create Invoice</h3>
            <p class="text-muted mb-0" style="font-size: 13px;">
                Create and issue a new invoice for a customer subscription or service.
            </p>
        </div>

        <a href="../billing/billing.html"
           class="btn btn-primary btn-sm mt-3 mt-md-0">
            <i class="fas fa-arrow-left me-2"></i>
            Back to Billing
        </a>

    </div>


    <div class="row g-4">

        <!-- LEFT SIDE -->
        <div class="col-lg-8">

            <!-- Customer Information -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-3">

                    <h5 class="mb-1" style="font-size: 17px;">
                        <i class="fas fa-user text-primary me-2"></i>
                        Customer Information
                    </h5>

                    <small class="text-muted" style="font-size: 12px;">
                        Select the customer for this invoice.
                    </small>

                </div>

                <div class="card-body p-3">

                    <div class="row g-3">

                        <div class="col-md-8">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Customer
                                <span class="text-danger">*</span>
                            </label>

                            <select class="form-select form-select-sm">

                                <option selected disabled>
                                    Select customer
                                </option>

                                <option>Blue Haven Spa</option>
                                <option>Maple Brewery</option>
                                <option>Green Valley Spa</option>
                                <option>Pure Brew Brewery</option>
                                <option>Fresh Life FMCG</option>

                            </select>

                        </div>


                        <div class="col-md-4">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Invoice Date
                            </label>

                            <input type="date"
                                   class="form-control form-control-sm">

                        </div>


                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Billing Email
                            </label>

                            <input type="email"
                                   class="form-control form-control-sm"
                                   placeholder="customer@example.com">

                        </div>


                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Phone Number
                            </label>

                            <input type="text"
                                   class="form-control form-control-sm"
                                   placeholder="+1 416 555 0124">

                        </div>

                    </div>

                </div>

            </div>


            <!-- Billing Details -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-3">

                    <h5 class="mb-1" style="font-size: 17px;">
                        <i class="fas fa-file-invoice text-primary me-2"></i>
                        Billing Details
                    </h5>

                    <small class="text-muted" style="font-size: 12px;">
                        Enter the invoice billing information.
                    </small>

                </div>

                <div class="card-body p-3">

                    <div class="row g-3">

                        <!-- Invoice Number -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Invoice Number
                            </label>

                            <input type="text"
                                   class="form-control form-control-sm"
                                   value="INV-2026-00125">

                        </div>


                        <!-- Due Date -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Due Date
                                <span class="text-danger">*</span>
                            </label>

                            <input type="date"
                                   class="form-control form-control-sm">

                        </div>


                        <!-- Billing Address -->
                        <div class="col-12">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Billing Address
                            </label>

                            <textarea class="form-control"
                                      rows="2"
                                      style="font-size: 13px;"
                                      placeholder="Enter billing address"></textarea>

                        </div>


                        <!-- City -->
                        <div class="col-md-4">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                City
                            </label>

                            <input type="text"
                                   class="form-control form-control-sm"
                                   placeholder="Toronto">

                        </div>


                        <!-- Province -->
                        <div class="col-md-4">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Province
                            </label>

                            <select class="form-select form-select-sm">

                                <option selected disabled>
                                    Select province
                                </option>

                                <option>Ontario</option>
                                <option>British Columbia</option>
                                <option>Alberta</option>
                                <option>Quebec</option>
                                <option>Manitoba</option>

                            </select>

                        </div>


                        <!-- Postal Code -->
                        <div class="col-md-4">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Postal Code
                            </label>

                            <input type="text"
                                   class="form-control form-control-sm"
                                   placeholder="M5V 2T6">

                        </div>

                    </div>

                </div>

            </div>


            <!-- Invoice Items -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-3">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h5 class="mb-1" style="font-size: 17px;">
                                <i class="fas fa-list text-primary me-2"></i>
                                Invoice Items
                            </h5>

                            <small class="text-muted"
                                   style="font-size: 12px;">
                                Add services or subscription charges.
                            </small>

                        </div>

                        <button type="button"
                                class="btn btn-primary btn-sm">

                            <i class="fas fa-plus me-1"></i>
                            Add Item

                        </button>

                    </div>

                </div>


                <div class="card-body p-3">

                    <div class="table-responsive">

                        <table class="table table-bordered align-middle mb-0">

                            <thead class="table-light">

                                <tr>

                                    <th style="font-size: 12px;">
                                        Description
                                    </th>

                                    <th width="100"
                                        style="font-size: 12px;">
                                        Qty
                                    </th>

                                    <th width="140"
                                        style="font-size: 12px;">
                                        Unit Price
                                    </th>

                                    <th width="140"
                                        style="font-size: 12px;">
                                        Amount
                                    </th>

                                    <th width="50"></th>

                                </tr>

                            </thead>

                            <tbody>

                                <tr>

                                    <td>

                                        <input type="text"
                                               class="form-control form-control-sm"
                                               placeholder="Monthly wastewater monitoring">

                                    </td>

                                    <td>

                                        <input type="number"
                                               class="form-control form-control-sm"
                                               value="1">

                                    </td>

                                    <td>

                                        <input type="number"
                                               class="form-control form-control-sm"
                                               placeholder="0.00">

                                    </td>

                                    <td>

                                        <input type="text"
                                               class="form-control form-control-sm"
                                               value="CAD 0.00"
                                               readonly>

                                    </td>

                                    <td class="text-center">

                                        <button type="button"
                                                class="btn btn-outline-danger btn-sm">

                                            <i class="fas fa-trash"></i>

                                        </button>

                                    </td>

                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>


            <!-- Payment Information -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-3">

                    <h5 class="mb-1" style="font-size: 17px;">
                        <i class="fas fa-credit-card text-primary me-2"></i>
                        Payment Information
                    </h5>

                    <small class="text-muted" style="font-size: 12px;">
                        Select the preferred payment method.
                    </small>

                </div>


                <div class="card-body p-3">

                    <div class="row g-3">

                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Payment Method
                            </label>

                            <select class="form-select form-select-sm">

                                <option selected>
                                    Visa •••• 4582
                                </option>

                                <option>
                                    Mastercard •••• 7821
                                </option>

                                <option>
                                    Bank Transfer
                                </option>

                            </select>

                        </div>


                        <div class="col-md-6">

                            <label class="form-label fw-semibold"
                                   style="font-size: 13px;">
                                Payment Status
                            </label>

                            <select class="form-select form-select-sm">

                                <option selected>
                                    Pending
                                </option>

                                <option>
                                    Paid
                                </option>

                                <option>
                                    Partially Paid
                                </option>

                            </select>

                        </div>

                    </div>

                </div>

            </div>


            <!-- Notes -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-3">

                    <h5 class="mb-0" style="font-size: 17px;">
                        <i class="fas fa-note-sticky text-primary me-2"></i>
                        Additional Notes
                    </h5>

                </div>

                <div class="card-body p-3">

                    <textarea class="form-control"
                              rows="3"
                              style="font-size: 13px;"
                              placeholder="Add notes or payment instructions..."></textarea>

                </div>

            </div>


            <!-- Buttons -->
            <div class="d-flex justify-content-end gap-2 mb-4">

                <a href="billing.html"
                   class="btn btn-outline-secondary btn-sm">

                    <i class="fas fa-times me-1"></i>
                    Cancel

                </a>

                <button type="button"
                        class="btn btn-primary btn-sm">

                    <i class="fas fa-file-invoice me-1"></i>
                    Create Invoice

                </button>

            </div>

        </div>


        <!-- RIGHT SIDE -->
        <div class="col-lg-4">


            <!-- Invoice Summary -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-3">

                    <h5 class="mb-0" style="font-size: 17px;">
                        Invoice Summary
                    </h5>

                </div>


                <div class="card-body p-3">

                    <div class="d-flex justify-content-between mb-3">

                        <span class="text-muted"
                              style="font-size: 13px;">
                            Subtotal
                        </span>

                        <span style="font-size: 13px;">
                            CAD 0.00
                        </span>

                    </div>


                    <div class="d-flex justify-content-between mb-3">

                        <span class="text-muted"
                              style="font-size: 13px;">
                            Tax
                        </span>

                        <span style="font-size: 13px;">
                            CAD 0.00
                        </span>

                    </div>


                    <div class="d-flex justify-content-between mb-3">

                        <span class="text-muted"
                              style="font-size: 13px;">
                            Discount
                        </span>

                        <span style="font-size: 13px;">
                            CAD 0.00
                        </span>

                    </div>

                    <hr>

                    <div class="d-flex justify-content-between">

                        <strong style="font-size: 15px;">
                            Total
                        </strong>

                        <strong class="text-primary"
                                style="font-size: 18px;">
                            CAD 0.00
                        </strong>

                    </div>

                </div>

            </div>


            <!-- Invoice Settings -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 p-3">

                    <h5 class="mb-0" style="font-size: 17px;">
                        <i class="fas fa-sliders text-primary me-2"></i>
                        Invoice Settings
                    </h5>

                </div>


                <div class="card-body p-3">

                    <div class="mb-3">

                        <label class="form-label fw-semibold"
                               style="font-size: 13px;">
                            Currency
                        </label>

                        <select class="form-select form-select-sm">

                            <option selected>
                                CAD - Canadian Dollar
                            </option>

                            <option>
                                USD - US Dollar
                            </option>

                        </select>

                    </div>


                    <div class="mb-3">

                        <label class="form-label fw-semibold"
                               style="font-size: 13px;">
                            Tax Rate
                        </label>

                        <select class="form-select form-select-sm">

                            <option selected>
                                13% HST
                            </option>

                            <option>
                                5% GST
                            </option>

                            <option>
                                0%
                            </option>

                        </select>

                    </div>


                    <div class="form-check">

                        <input class="form-check-input"
                               type="checkbox"
                               id="sendInvoice"
                               checked>

                        <label class="form-check-label"
                               for="sendInvoice"
                               style="font-size: 13px;">

                            Send invoice to customer

                        </label>

                    </div>

                </div>

            </div>


            <!-- Invoice Status -->
            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white border-0 p-3">

                    <h5 class="mb-0" style="font-size: 17px;">
                        <i class="fas fa-circle-info text-primary me-2"></i>
                        Invoice Status
                    </h5>

                </div>


                <div class="card-body p-3">

                    <div class="d-flex align-items-start mb-3">

                        <i class="fas fa-file-invoice text-primary me-3 mt-1"></i>

                        <div>

                            <strong style="font-size: 13px;">
                                Draft Invoice
                            </strong>

                            <div class="text-muted"
                                 style="font-size: 11px;">
                                The invoice will be created as a draft.
                            </div>

                        </div>

                    </div>


                    <div class="d-flex align-items-start mb-3">

                        <i class="fas fa-envelope text-info me-3 mt-1"></i>

                        <div>

                            <strong style="font-size: 13px;">
                                Customer Notification
                            </strong>

                            <div class="text-muted"
                                 style="font-size: 11px;">
                                The customer can receive the invoice by email.
                            </div>

                        </div>

                    </div>


                    <div class="d-flex align-items-start">

                        <i class="fas fa-shield-halved text-success me-3 mt-1"></i>

                        <div>

                            <strong style="font-size: 13px;">
                                Secure Billing
                            </strong>

                            <div class="text-muted"
                                 style="font-size: 11px;">
                                Billing information is handled securely.
                            </div>

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