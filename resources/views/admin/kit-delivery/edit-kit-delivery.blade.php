@include('admin.include.header')

            <!-- ========== DASHBOARD CONTENT START ========== -->
           
<div class="content-area">

    <!-- Page Header -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1">Edit Kit Delivery</h4>
            <p class="text-muted mb-0">
                Update chemical kit delivery and tracking information.
            </p>
        </div>

        <a href="kit-delivery.html" class="btn btn-outline-secondary mt-2 mt-md-0">
            <i class="fas fa-arrow-left me-2"></i>
            Back to Deliveries
        </a>
    </div>

    <form action="#" method="post">

        <!-- Delivery Information -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Delivery Information</h5>
            </div>

            <div class="card-body">
                <div class="row g-3">

                    <div class="col-md-6">
                        <label for="deliveryId" class="form-label">
                            Delivery ID
                        </label>
                        <input type="text"
                               id="deliveryId"
                               class="form-control"
                               value="DEL-1001"
                               readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="customer" class="form-label">
                            Customer
                        </label>
                        <select id="customer" class="form-select" required>
                            <option selected>Green Valley Spa</option>
                            <option>Pure Brew Brewery</option>
                            <option>Fresh Life FMCG</option>
                            <option>Clear Water Spa</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="kitType" class="form-label">
                            Kit Type
                        </label>
                        <select id="kitType" class="form-select" required>
                            <option selected>Water Testing Kit</option>
                            <option>Chemical Testing Kit</option>
                            <option>Compliance Kit</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="quantity" class="form-label">
                            Quantity
                        </label>
                        <input type="number"
                               id="quantity"
                               class="form-control"
                               value="10"
                               min="1"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label for="deliveryDate" class="form-label">
                            Delivery Date
                        </label>
                        <input type="date"
                               id="deliveryDate"
                               class="form-control"
                               value="2026-09-16"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label for="status" class="form-label">
                            Delivery Status
                        </label>
                        <select id="status" class="form-select" required>
                            <option>Pending</option>
                            <option>In Transit</option>
                            <option selected>Delivered</option>
                            <option>Cancelled</option>
                        </select>
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
                <div class="row g-3">

                    <div class="col-md-6">
                        <label for="contactPerson" class="form-label">
                            Contact Person
                        </label>
                        <input type="text"
                               id="contactPerson"
                               class="form-control"
                               value="Sarah Mitchell"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">
                            Email Address
                        </label>
                        <input type="email"
                               id="email"
                               class="form-control"
                               value="sarah@example.com"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label for="phone" class="form-label">
                            Phone Number
                        </label>
                        <input type="tel"
                               id="phone"
                               class="form-control"
                               value="+1 416 555 0124"
                               required>
                    </div>

                    <div class="col-12">
                        <label for="address" class="form-label">
                            Delivery Address
                        </label>
                        <textarea id="address"
                                  class="form-control"
                                  rows="3"
                                  required>125 Water Street, Toronto, Ontario, Canada</textarea>
                    </div>

                </div>
            </div>
        </div>

        <!-- Kit and Technician Details -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Kit and Technician Details</h5>
            </div>

            <div class="card-body">
                <div class="row g-3">

                    <div class="col-md-6">
                        <label for="batchNumber" class="form-label">
                            Batch Number
                        </label>
                        <input type="text"
                               id="batchNumber"
                               class="form-control"
                               value="WTK-2026-0916">
                    </div>

                    <div class="col-md-6">
                        <label for="technician" class="form-label">
                            Assigned Technician
                        </label>
                        <select id="technician" class="form-select">
                            <option selected>Daniel Wilson</option>
                            <option>Sophia Martin</option>
                            <option>Michael Brown</option>
                            <option>Emily Johnson</option>
                            <option>Not Assigned</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="notes" class="form-label">
                            Delivery Notes
                        </label>
                        <textarea id="notes"
                                  class="form-control"
                                  rows="3">Water testing kits delivered to the customer facility.</textarea>
                    </div>

                </div>
            </div>
        </div>

        <!-- Tracking Information -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Tracking Information</h5>
            </div>

            <div class="card-body">
                <div class="row g-3">

                    <div class="col-md-6">
                        <label for="courier" class="form-label">
                            Courier Name
                        </label>
                        <input type="text"
                               id="courier"
                               class="form-control"
                               value="Canada Post">
                    </div>

                    <div class="col-md-6">
                        <label for="trackingNumber" class="form-label">
                            Tracking Number
                        </label>
                        <input type="text"
                               id="trackingNumber"
                               class="form-control"
                               value="CP123456789CA">
                    </div>

                    <div class="col-md-6">
                        <label for="dispatchDate" class="form-label">
                            Dispatch Date
                        </label>
                        <input type="date"
                               id="dispatchDate"
                               class="form-control"
                               value="2026-09-15">
                    </div>

                    <div class="col-md-6">
                        <label for="deliveredDate" class="form-label">
                            Delivered Date
                        </label>
                        <input type="date"
                               id="deliveredDate"
                               class="form-control"
                               value="2026-09-16">
                    </div>

                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="d-flex flex-wrap justify-content-end gap-2">
            <a href="kit-delivery.html" class="btn btn-light border">
                Cancel
            </a>

            <button type="reset" class="btn btn-outline-secondary">
                <i class="fas fa-undo me-2"></i>
                Reset
            </button>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>
                Update Delivery
            </button>
        </div>

    </form>

</div>
            <!-- ========== DASHBOARD CONTENT END ========== -->
        </div>
        <!-- ========== MAIN CONTENT END ========== -->
    </div>

   @include('admin.include.footer')