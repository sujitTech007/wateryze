@include('admin.include.header')

            <!-- ========== DASHBOARD CONTENT START ========== -->
           <div class="content-area">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="mb-1" style="font-size: 25px;">Edit Compliance Record</h2>
            <p class="text-muted mb-0">
                Update customer compliance and verification information.
            </p>
        </div>

        <a href="../compliance/compliance.html"
            class="btn btn-primary">

            <i class="fas fa-arrow-left me-1"></i>
            Back

        </a>

    </div>


    <form>

        <div class="row">

            <!-- Left Section -->
            <div class="col-lg-8">


                <!-- Customer Information -->
                <div class="card shadow-sm border-0 mb-4">

                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0">
                            <i class="fas fa-user text-primary me-2"></i>
                            Customer Information
                        </h5>
                    </div>


                    <div class="card-body">

                        <div class="row g-3">

                            <div class="col-md-6">

                                <label class="form-label">
                                    Customer
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


                            <div class="col-md-6">

                                <label class="form-label">
                                    Site ID
                                </label>

                                <input type="text"
                                    class="form-control"
                                    value="WZ-2025-001">

                            </div>


                            <div class="col-12">

                                <label class="form-label">
                                    Location
                                </label>

                                <input type="text"
                                    class="form-control"
                                    value="Ontario">

                            </div>

                        </div>

                    </div>

                </div>



                <!-- Compliance Details -->
                <div class="card shadow-sm border-0 mb-4">

                    <div class="card-header bg-white py-3">

                        <h5 class="mb-0">
                            <i class="fas fa-clipboard-check text-primary me-2"></i>
                            Compliance Details
                        </h5>

                    </div>


                    <div class="card-body">

                        <div class="row g-3">

                            <div class="col-md-6">

                                <label class="form-label">
                                    Compliance Score (%)
                                </label>

                                <input type="number"
                                    class="form-control"
                                    value="92">

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    Compliance Status
                                </label>

                                <select class="form-select">

                                    <option selected>
                                        Compliant
                                    </option>

                                    <option>
                                        Warning
                                    </option>

                                    <option>
                                        Non-Compliant
                                    </option>

                                </select>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    Verification Status
                                </label>

                                <select class="form-select">

                                    <option selected>
                                        Verified
                                    </option>

                                    <option>
                                        Pending
                                    </option>

                                    <option>
                                        Review Required
                                    </option>

                                    <option>
                                        Failed
                                    </option>

                                </select>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    Last Audit Date
                                </label>

                                <input type="date"
                                    class="form-control"
                                    value="2026-01-02">

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    Next Audit Date
                                </label>

                                <input type="date"
                                    class="form-control"
                                    value="2026-07-02">

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    Audit Reference
                                </label>

                                <input type="text"
                                    class="form-control"
                                    value="AUD-2026-001">

                            </div>

                        </div>

                    </div>

                </div>



                <!-- Water Quality -->
                <div class="card shadow-sm border-0 mb-4">

                    <div class="card-header bg-white py-3">

                        <h5 class="mb-0">
                            <i class="fas fa-droplet text-primary me-2"></i>
                            Water Quality Parameters
                        </h5>

                    </div>


                    <div class="card-body">

                        <div class="row g-3">

                            <div class="col-md-4">

                                <label class="form-label">
                                    pH Level
                                </label>

                                <input type="number"
                                    step="0.1"
                                    class="form-control"
                                    value="7.1">

                            </div>


                            <div class="col-md-4">

                                <label class="form-label">
                                    TDS (ppm)
                                </label>

                                <input type="number"
                                    class="form-control"
                                    value="380">

                            </div>


                            <div class="col-md-4">

                                <label class="form-label">
                                    Turbidity (NTU)
                                </label>

                                <input type="number"
                                    class="form-control"
                                    value="8">

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    COD (mg/L)
                                </label>

                                <input type="number"
                                    class="form-control"
                                    value="320">

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    BOD (mg/L)
                                </label>

                                <input type="number"
                                    class="form-control"
                                    value="140">

                            </div>

                        </div>

                    </div>

                </div>



                <!-- Audit Notes -->
                <div class="card shadow-sm border-0 mb-4">

                    <div class="card-header bg-white py-3">

                        <h5 class="mb-0">
                            <i class="fas fa-file-alt text-primary me-2"></i>
                            Audit Notes
                        </h5>

                    </div>


                    <div class="card-body">

                        <label class="form-label">
                            Compliance Notes
                        </label>

                        <textarea class="form-control"
                            rows="6">The wastewater treatment system is operating within the acceptable compliance range. All major water quality parameters have passed the latest audit.</textarea>

                    </div>

                </div>

            </div>



            <!-- Right Sidebar -->
            <div class="col-lg-4">


                <!-- Record Status -->
                <div class="card shadow-sm border-0 mb-4">

                    <div class="card-header bg-white py-3">

                        <h6 class="mb-0">
                            Record Status
                        </h6>

                    </div>


                    <div class="card-body">

                        <div class="form-check form-switch">

                            <input class="form-check-input"
                                type="checkbox"
                                checked
                                id="recordStatus">

                            <label class="form-check-label"
                                for="recordStatus">

                                Compliance Record Active

                            </label>

                        </div>

                        <small class="text-muted d-block mt-3">

                            Disable this record if the customer
                            compliance monitoring is no longer active.

                        </small>

                    </div>

                </div>



                <!-- Auditor -->
                <div class="card shadow-sm border-0 mb-4">

                    <div class="card-header bg-white py-3">

                        <h6 class="mb-0">
                            Auditor Information
                        </h6>

                    </div>


                    <div class="card-body">

                        <label class="form-label">
                            Auditor Name
                        </label>

                        <input type="text"
                            class="form-control"
                            value="Michael Anderson">

                    </div>

                </div>



                <!-- Actions -->
                <div class="card shadow-sm border-0">

                    <div class="card-body">

                        <button type="submit"
                            class="btn btn-primary w-100 mb-2">

                            <i class="fas fa-save me-2"></i>
                            Save Changes

                        </button>


                        <a href="compliance-view.html"
                            class="btn btn-outline-secondary w-100">

                            Cancel

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </form>

</div>
            <!-- ========== DASHBOARD CONTENT END ========== -->
        </div>
        <!-- ========== MAIN CONTENT END ========== -->
    </div>

 @include('admin.include.footer')