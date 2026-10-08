@include('user.include.header')

            <!-- ========== DASHBOARD CONTENT START ========== -->
           <div class="content-area">

    <!-- Page Header -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">

        <div>
            <h2 class="mb-1">Audit Report</h2>
            <p class="text-muted mb-0">
                Review your latest wastewater treatment compliance audit.
            </p>
        </div>

        <div class="d-flex gap-2 mt-3 mt-md-0">

            <button class="btn btn-outline-secondary">
                <i class="fas fa-download me-2"></i>
                Download Report
            </button>

            <a href="compliance.html" class="btn btn-primary">
                <i class="fas fa-arrow-left me-2"></i>
                Back to Compliance
            </a>

        </div>

    </div>


    <!-- Audit Information -->
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-header bg-white py-3">
            <h5 class="mb-0">
                <i class="fas fa-file-circle-check text-primary me-2"></i>
                Audit Information
            </h5>
        </div>

        <div class="card-body">

            <div class="row g-4">

                <div class="col-md-3">
                    <small class="text-muted d-block mb-1">
                        Audit Report ID
                    </small>
                    <strong>AR-2026-001</strong>
                </div>

                <div class="col-md-3">
                    <small class="text-muted d-block mb-1">
                        Audit Date
                    </small>
                    <strong>Sep 01, 2026</strong>
                </div>

                <div class="col-md-3">
                    <small class="text-muted d-block mb-1">
                        Audit Status
                    </small>
                    <div>
                        <span class="badge bg-success px-3 py-2">
                            <i class="fas fa-check-circle me-1"></i>
                            Compliant
                        </span>
                    </div>
                </div>

                <div class="col-md-3">
                    <small class="text-muted d-block mb-1">
                        Compliance Score
                    </small>
                    <strong class="fs-4 text-success">92%</strong>
                </div>

            </div>

        </div>

    </div>


    <div class="row">

        <!-- Main Audit Results -->
        <div class="col-lg-8 mb-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">Compliance Assessment</h5>
                </div>


                <div class="card-body p-0">

                    <div class="table-responsive">

                        <table class="table table-hover align-middle mb-0">

                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">Parameter</th>
                                    <th>Reading</th>
                                    <th>Required Range</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>

                                <tr>
                                    <td class="ps-4">
                                        <strong>pH Level</strong>
                                    </td>

                                    <td>7.1</td>

                                    <td>6.5 – 8.5</td>

                                    <td>
                                        <span class="badge bg-success">
                                            <i class="fas fa-check me-1"></i>
                                            Compliant
                                        </span>
                                    </td>
                                </tr>


                                <tr>
                                    <td class="ps-4">
                                        <strong>TDS</strong>
                                    </td>

                                    <td>480 ppm</td>

                                    <td>Below 500 ppm</td>

                                    <td>
                                        <span class="badge bg-success">
                                            <i class="fas fa-check me-1"></i>
                                            Compliant
                                        </span>
                                    </td>
                                </tr>


                                <tr>
                                    <td class="ps-4">
                                        <strong>Turbidity</strong>
                                    </td>

                                    <td>12 NTU</td>

                                    <td>Below 10 NTU</td>

                                    <td>
                                        <span class="badge bg-warning text-dark">
                                            <i class="fas fa-exclamation-triangle me-1"></i>
                                            Attention
                                        </span>
                                    </td>
                                </tr>


                                <tr>
                                    <td class="ps-4">
                                        <strong>ORP</strong>
                                    </td>

                                    <td>670 mV</td>

                                    <td>650 – 750 mV</td>

                                    <td>
                                        <span class="badge bg-success">
                                            <i class="fas fa-check me-1"></i>
                                            Compliant
                                        </span>
                                    </td>
                                </tr>


                                <tr>
                                    <td class="ps-4">
                                        <strong>COD</strong>
                                    </td>

                                    <td>320 mg/L</td>

                                    <td>Below 400 mg/L</td>

                                    <td>
                                        <span class="badge bg-success">
                                            <i class="fas fa-check me-1"></i>
                                            Compliant
                                        </span>
                                    </td>
                                </tr>


                                <tr>
                                    <td class="ps-4">
                                        <strong>BOD</strong>
                                    </td>

                                    <td>140 mg/L</td>

                                    <td>Below 200 mg/L</td>

                                    <td>
                                        <span class="badge bg-success">
                                            <i class="fas fa-check me-1"></i>
                                            Compliant
                                        </span>
                                    </td>
                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>


        <!-- Audit Summary -->
        <div class="col-lg-4 mb-4">

            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">Audit Summary</h5>
                </div>

                <div class="card-body">

                    <div class="mb-4">

                        <small class="text-muted">
                            Overall Result
                        </small>

                        <h4 class="text-success mt-1">
                            <i class="fas fa-circle-check me-2"></i>
                            Compliant
                        </h4>

                    </div>


                    <div class="mb-4">

                        <small class="text-muted">
                            Parameters Checked
                        </small>

                        <h4 class="mb-0">6</h4>

                    </div>


                    <div class="mb-4">

                        <small class="text-muted">
                            Passed
                        </small>

                        <h4 class="text-success mb-0">
                            5 Parameters
                        </h4>

                    </div>


                    <div>

                        <small class="text-muted">
                            Requires Attention
                        </small>

                        <h4 class="text-warning mb-0">
                            1 Parameter
                        </h4>

                    </div>

                </div>

            </div>


            <!-- Auditor Information -->
            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">Audit Details</h5>
                </div>

                <div class="card-body">

                    <div class="mb-3">

                        <small class="text-muted">
                            Auditor
                        </small>

                        <p class="mb-0 fw-semibold">
                            WATERYZE Compliance System
                        </p>

                    </div>


                    <div class="mb-3">

                        <small class="text-muted">
                            Next Review
                        </small>

                        <p class="mb-0 fw-semibold">
                            Scheduled Soon
                        </p>

                    </div>


                    <div>

                        <small class="text-muted">
                            Report Generated
                        </small>

                        <p class="mb-0 fw-semibold">
                            Sep 01, 2026
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- Recommendation -->
    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="d-flex align-items-start">

                <div class="me-3 fs-3 text-warning">
                    <i class="fas fa-lightbulb"></i>
                </div>

                <div>

                    <h5>Recommendation</h5>

                    <p class="text-muted mb-0">
                        Your wastewater treatment system is performing within
                        the required compliance standards. However, turbidity
                        currently requires attention. Continue monitoring the
                        turbidity level and perform corrective treatment if the
                        reading remains above the recommended range.
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>
        </div>
    </div>

@include('user.include.footer')