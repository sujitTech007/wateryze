@include('admin.include.header')

            <!-- ========== DASHBOARD CONTENT START ========== -->
<div class="content-area">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Compliance Record Details</h2>
            <p class="text-muted mb-0">
                View complete compliance and verification information.
            </p>
        </div>

        <div class="d-flex gap-2">
            <a href="compliance.html" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i> Back
            </a>

            <a href="compliance-edit.html" class="btn btn-primary">
                <i class="fas fa-edit me-1"></i> Edit Record
            </a>
        </div>
    </div>


    <div class="row">

        <!-- Main Compliance Details -->
        <div class="col-lg-8 mb-4">

            <div class="card shadow-sm border-0">

                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">
                        <i class="fas fa-clipboard-check text-primary me-2"></i>
                        Compliance Information
                    </h5>
                </div>

                <div class="card-body">

                    <div class="row g-4">

                        <div class="col-md-6">
                            <small class="text-muted">Customer</small>
                            <h6 class="mt-1 mb-0">Blue Haven Spa</h6>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted">Site ID</small>
                            <h6 class="mt-1 mb-0">WZ-2025-001</h6>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted">Location</small>
                            <h6 class="mt-1 mb-0">Ontario</h6>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted">Compliance Score</small>
                            <h6 class="mt-1 text-success mb-0">92%</h6>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted">Verification Status</small>

                            <div class="mt-1">
                                <span class="badge bg-success px-3 py-2">
                                    <i class="fas fa-check-circle me-1"></i>
                                    VERIFIED
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted">Compliance Status</small>

                            <div class="mt-1">
                                <span class="badge bg-success px-3 py-2">
                                    COMPLIANT
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted">Last Audit Date</small>
                            <h6 class="mt-1 mb-0">Jan 02, 2026</h6>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted">Next Audit Date</small>
                            <h6 class="mt-1 mb-0">Jul 02, 2026</h6>
                        </div>

                    </div>

                </div>
            </div>


            <!-- Water Quality -->
            <div class="card shadow-sm border-0 mt-4">

                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">
                        <i class="fas fa-droplet text-primary me-2"></i>
                        Water Quality Parameters
                    </h5>
                </div>

                <div class="card-body">

                    <div class="row g-3">

                        <div class="col-md-4">
                            <div class="border rounded p-3">
                                <small class="text-muted">pH Level</small>
                                <h4 class="mt-2 mb-1">7.1</h4>

                                <span class="badge bg-success">
                                    Normal
                                </span>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="border rounded p-3">
                                <small class="text-muted">TDS</small>
                                <h4 class="mt-2 mb-1">380 ppm</h4>

                                <span class="badge bg-success">
                                    Normal
                                </span>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="border rounded p-3">
                                <small class="text-muted">Turbidity</small>
                                <h4 class="mt-2 mb-1">8 NTU</h4>

                                <span class="badge bg-success">
                                    Normal
                                </span>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="border rounded p-3">
                                <small class="text-muted">COD</small>
                                <h4 class="mt-2 mb-1">320 mg/L</h4>

                                <span class="badge bg-success">
                                    Within Range
                                </span>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="border rounded p-3">
                                <small class="text-muted">BOD</small>
                                <h4 class="mt-2 mb-1">140 mg/L</h4>

                                <span class="badge bg-success">
                                    Within Range
                                </span>
                            </div>
                        </div>

                    </div>

                </div>
            </div>


            <!-- Audit Notes -->
            <div class="card shadow-sm border-0 mt-4">

                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">
                        <i class="fas fa-file-alt text-primary me-2"></i>
                        Audit Notes
                    </h5>
                </div>

                <div class="card-body">

                    <p class="mb-0 text-muted">
                        The wastewater treatment system is operating within
                        the acceptable compliance range. All major water
                        quality parameters have passed the latest audit.
                        No immediate corrective action is required.
                    </p>

                </div>

            </div>

        </div>


        <!-- Right Sidebar -->
        <div class="col-lg-4 mb-4">

            <!-- Compliance Score -->
            <div class="card shadow-sm border-0 mb-4">

                <div class="card-body text-center">

                    <h6 class="text-muted mb-3">
                        Compliance Score
                    </h6>

                    <div class=" fw-bold text-primary">
                        92%
                    </div>

                    <p class="text-primary mb-0 mt-2">
                        <i class="fas fa-check-circle me-1"></i>
                        Excellent Compliance
                    </p>

                </div>

            </div>


            <!-- Audit Information -->
            <div class="card shadow-sm border-0 mb-4">

                <div class="card-header bg-white py-3">
                    <h6 class="mb-0">
                        Audit Information
                    </h6>
                </div>

                <div class="card-body">

                    <div class="mb-3">
                        <small class="text-muted">
                            Last Auditor
                        </small>

                        <div>
                            Michael Anderson
                        </div>
                    </div>


                    <div class="mb-3">
                        <small class="text-muted">
                            Audit Reference
                        </small>

                        <div>
                            AUD-2026-001
                        </div>
                    </div>


                    <div>
                        <small class="text-muted">
                            Record Created
                        </small>

                        <div>
                            Jan 02, 2026
                        </div>
                    </div>

                </div>

            </div>


            <!-- Quick Actions -->
            <div class="card shadow-sm border-0">

                <div class="card-header bg-white py-3">
                    <h6 class="mb-0">
                        Quick Actions
                    </h6>
                </div>

                <div class="card-body d-grid gap-2">

                    <a href="compliance-edit.html"
                        class="btn btn-primary">

                        <i class="fas fa-edit me-2"></i>
                        Edit Compliance Record

                    </a>


                    <button class="btn btn-outline-secondary">

                        <i class="fas fa-download me-2"></i>
                        Export Record

                    </button>

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