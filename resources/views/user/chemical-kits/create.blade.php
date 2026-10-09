@include('user.include.header')

            <!-- ========== DASHBOARD CONTENT START ========== -->
           <div class="content-area">

    <!-- Page Header -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Add Chemical Usage</h2>
            <p class="text-muted mb-0">
                Record chemical usage for your current chemical kit.
            </p>
        </div>

        <a href="{{ route('user.chemical-kits.index') }}" class="btn btn-primary mt-3 mt-md-0">
            <i class="fas fa-arrow-left me-2"></i>
            Back to Usage
        </a>
    </div>


    <div class="row justify-content-center">

        <!-- Main Form -->
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">Usage Information</h5>
                </div>


                <div class="card-body p-4">

                    <form>

                        <div class="row">

                            <!-- Chemical Name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">
                                    Chemical Name
                                </label>

                                <select class="form-select">
                                    <option selected disabled>
                                        Select Chemical
                                    </option>

                                    <option>pH Adjuster</option>
                                    <option>Coagulant</option>
                                    <option>Disinfectant</option>
                                    <option>Odour Control Chemical</option>
                                </select>
                            </div>


                            <!-- Usage Date -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">
                                    Usage Date
                                </label>

                                <input type="date" class="form-control">
                            </div>


                            <!-- Quantity Used -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">
                                    Quantity Used
                                </label>

                                <input
                                    type="number"
                                    class="form-control"
                                    placeholder="Enter quantity"
                                >
                            </div>


                            <!-- Unit -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">
                                    Unit
                                </label>

                                <select class="form-select">
                                    <option selected disabled>
                                        Select Unit
                                    </option>

                                    <option>Liters (L)</option>
                                    <option>Milliliters (ml)</option>
                                    <option>Kilograms (kg)</option>
                                    <option>Grams (g)</option>
                                </select>
                            </div>


                            <!-- Usage Purpose -->
                            <div class="col-12 mb-3">
                                <label class="form-label fw-semibold">
                                    Usage Purpose
                                </label>

                                <select class="form-select">
                                    <option selected disabled>
                                        Select Purpose
                                    </option>

                                    <option>Water Treatment</option>
                                    <option>pH Adjustment</option>
                                    <option>Cleaning</option>
                                    <option>Odour Control</option>
                                    <option>Regular Maintenance</option>
                                    <option>Other</option>
                                </select>
                            </div>


                            <!-- Notes -->
                            <div class="col-12 mb-4">
                                <label class="form-label fw-semibold">
                                    Notes
                                    <span class="text-muted fw-normal">
                                        (Optional)
                                    </span>
                                </label>

                                <textarea
                                    class="form-control"
                                    rows="4"
                                    placeholder="Add any additional information about this chemical usage..."
                                ></textarea>
                            </div>

                        </div>


                        <!-- Current Kit Info -->
                        <div class="border rounded p-3 mb-4">

                            <div class="d-flex justify-content-between align-items-center">

                                <div>
                                    <small class="text-muted">
                                        Current Kit
                                    </small>

                                    <h6 class="mb-0 mt-1">
                                        CK-2026-001
                                    </h6>
                                </div>


                                <div class="text-end">

                                    <small class="text-muted">
                                        Current Usage
                                    </small>

                                    <h6 class="mb-0 mt-1">
                                        <span class="badge bg-primary">
                                            2 / 4 Used
                                        </span>
                                    </h6>

                                </div>

                            </div>

                        </div>


                        <!-- Buttons -->
                        <div class="d-flex justify-content-end gap-2">

                            <a
                                href="{{ route('user.chemical-kits.index') }}"
                                class="btn btn-outline-secondary"
                            >
                                Cancel
                            </a>


                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                <i class="fas fa-save me-2"></i>
                                Save Usage
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>


        <!-- Usage Guidelines -->
        <div class="col-lg-4 mt-4 mt-lg-0">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">
                        <i class="fas fa-circle-info text-primary me-2"></i>
                        Usage Guidelines
                    </h5>
                </div>


                <div class="card-body">

                    <div class="mb-3">
                        <h6>Record Usage</h6>

                        <p class="text-muted small mb-0">
                            Enter the amount of chemical used during your
                            wastewater treatment process.
                        </p>
                    </div>


                    <hr>


                    <div class="mb-3">
                        <h6>Keep Information Accurate</h6>

                        <p class="text-muted small mb-0">
                            Accurate records help monitor your chemical
                            consumption and kit availability.
                        </p>
                    </div>


                    <hr>


                    <div>
                        <h6>Low Stock Alerts</h6>

                        <p class="text-muted small mb-0">
                            Your dashboard will notify you when the chemical
                            kit requires replacement or refill.
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
        </div>
    </div>

@include('user.include.footer')