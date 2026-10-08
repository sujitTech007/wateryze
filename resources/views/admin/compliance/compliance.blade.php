@include('admin.include.header')

            <!-- ========== DASHBOARD CONTENT START ========== -->
            <div class="content-area">

                <!-- PAGE HEADER -->
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">

                    <div>
                        <h3 class="mb-1">Compliance Management</h3>
                        <p class="text-muted mb-0">
                            Monitor customer compliance status, verification and audit readiness.
                        </p>
                    </div>

                    <a href="create-compliance.html" type="button" class="btn btn-primary mt-3 mt-md-0 btn-sm">
                        <i class="fas fa-plus me-2"></i>
                        create Compliance Record
                    </a>

                </div>


                <!-- ========== SUMMARY CARDS START ========== -->
                <section class="summary-cards mb-4">

                    <div class="row"> <!-- Total Records -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div
                                class="card stat-card h-100 bg-primary-subtle border border-primary-subtle shadow rounded-3">
                                <div class="card-body">
                                    <div class="stat-icon bg-primary"> <i class="fas fa-clipboard-check"></i> </div>
                                    <div class="stat-content">
                                        <p class="stat-label">Total Records</p>
                                        <h3 class="stat-value">1,245</h3>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Compliant -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div
                                class="card stat-card h-100 bg-success-subtle border border-success-subtle shadow rounded-3">
                                <div class="card-body">
                                    <div class="stat-icon bg-success"> <i class="fas fa-check-circle"></i> </div>
                                    <div class="stat-content">
                                        <p class="stat-label">Compliant</p>
                                        <h3 class="stat-value">1,087</h3>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Pending Verification -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div
                                class="card stat-card h-100 bg-warning-subtle border border-warning-subtle shadow rounded-3">
                                <div class="card-body">
                                    <div class="stat-icon bg-warning"> <i class="fas fa-clock"></i> </div>
                                    <div class="stat-content">
                                        <p class="stat-label">Pending Verification</p>
                                        <h3 class="stat-value">94</h3>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Non-Compliant -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div
                                class="card stat-card h-100 bg-danger-subtle border border-danger-subtle shadow rounded-3">
                                <div class="card-body">
                                    <div class="stat-icon bg-danger"> <i class="fas fa-exclamation-triangle"></i> </div>
                                    <div class="stat-content">
                                        <p class="stat-label">Non-Compliant</p>
                                        <h3 class="stat-value">64</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
                <!-- ========== SUMMARY CARDS END ========== -->

 <!-- Search and Filter Section -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Search...">
                            </div>
                            <div class="col-md-3">
                                <select class="form-select">
                                    <option selected>All Status</option>
                                    <option>Active</option>
                                    <option>Inactive</option>
                                    <option>Pending</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select">
                                    <option selected>All Roles</option>
                                    <option>Admin</option>
                                    <option>User</option>
                                    <option>Subscriber</option>
                                </select>
                            </div>
                            <div class="col-md-2">
 <button class="btn btn-primary w-100">Filter</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ========== COMPLIANCE TABLE START ========== -->
                <section>

                    <div class="card chart-card">

                        <!-- CARD HEADER -->
                        <div
                            class="card-header bg-transparent d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">

                            <div>
                                <h5 class="mb-1">Compliance Records</h5>

                                <small class="text-muted">
                                    Review and verify wastewater treatment compliance records.
                                </small>
                            </div>


                           
                        </div>


                        <!-- TABLE -->
                        <div class="table-responsive">

                            <table class="table table-hover align-middle mb-0">

                                <thead class="table-light">

                                    <tr class="table-header-blue">
                                        <th>Customer</th>
                                        <th>Site ID</th>
                                        <th>Compliance Score</th>
                                        <th>Verification</th>
                                        <th>Last Audit</th>
                                        <th>Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>

                                </thead>


                                <tbody>

                                    <!-- RECORD 1 -->
                                    <tr>

                                        <td>
                                            <strong>Blue Haven Spa</strong>

                                            <small class="text-muted d-block">
                                                Ontario
                                            </small>
                                        </td>


                                        <td>
                                            WZ-2025-001
                                        </td>


                                        <td>

                                            <span class="fw-semibold text-success">
                                                92%
                                            </span>

                                        </td>


                                        <td>

                                            <span class="badge bg-success">
                                                <i class="fas fa-check-circle me-1"></i>
                                                Verified
                                            </span>

                                        </td>


                                        <td>
                                            Jan 02, 2026
                                        </td>


                                        <td>

                                            <span class="badge bg-success">
                                                Compliant
                                            </span>

                                        </td>


                                        <td>
                                            <div class="d-flex justify-content-center align-items-center gap-2">
                                                <a href="view-compliance.html" class="btn btn-sm btn-outline-info">

                                                    <i class="fas fa-eye"></i>

                                                </a>


                                                <a href="edit-compliance.html" class="btn btn-sm btn-outline-primary">

                                                    <i class="fas fa-edit"></i>

                                                </a>
                                                 <button type="button" class="btn btn-sm btn-outline-danger"
                                                    data-bs-toggle="modal" data-bs-target="#deleteChemicalKitModal">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>

                                    </tr>


                                    <!-- RECORD 2 -->
                                    <tr>

                                        <td>

                                            <strong>Maple Brewery</strong>

                                            <small class="text-muted d-block">
                                                British Columbia
                                            </small>

                                        </td>


                                        <td>
                                            WZ-2025-002
                                        </td>


                                        <td>

                                            <span class="fw-semibold text-success">
                                                88%
                                            </span>

                                        </td>


                                        <td>

                                            <span class="badge bg-warning text-dark">
                                                <i class="fas fa-clock me-1"></i>
                                                Pending
                                            </span>

                                        </td>


                                        <td>
                                            Jan 05, 2026
                                        </td>


                                        <td>

                                            <span class="badge bg-success">
                                                Compliant
                                            </span>

                                        </td>


                                        <td>
                                            <div class="d-flex justify-content-center align-items-center gap-2">
                                                <a href="view-compliance.html" class="btn btn-sm btn-outline-info">

                                                    <i class="fas fa-eye"></i>

                                                </a>


                                                <a href="edit-compliance.html" class="btn btn-sm btn-outline-primary">

                                                    <i class="fas fa-edit"></i>

                                                </a>
                                                 <button type="button" class="btn btn-sm btn-outline-danger"
                                                    data-bs-toggle="modal" data-bs-target="#deleteChemicalKitModal">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>

                                    </tr>


                                    <!-- RECORD 3 -->
                                    <tr>

                                        <td>

                                            <strong>Crystal Waters</strong>

                                            <small class="text-muted d-block">
                                                Alberta
                                            </small>

                                        </td>


                                        <td>
                                            WZ-2025-003
                                        </td>


                                        <td>

                                            <span class="fw-semibold text-warning">
                                                71%
                                            </span>

                                        </td>


                                        <td>

                                            <span class="badge bg-warning text-dark">
                                                <i class="fas fa-clock me-1"></i>
                                                Review Required
                                            </span>

                                        </td>


                                        <td>
                                            Dec 28, 2025
                                        </td>


                                        <td>

                                            <span class="badge bg-warning text-dark">
                                                Warning
                                            </span>

                                        </td>


                                        <td>
                                            <div class="d-flex justify-content-center align-items-center gap-2">
                                                <a href="view-compliance.html" class="btn btn-sm btn-outline-info">

                                                    <i class="fas fa-eye"></i>

                                                </a>


                                                <a href="edit-compliance.html" class="btn btn-sm btn-outline-primary">

                                                    <i class="fas fa-edit"></i>

                                                </a>
                                                 <button type="button" class="btn btn-sm btn-outline-danger"
                                                    data-bs-toggle="modal" data-bs-target="#deleteChemicalKitModal">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>

                                    </tr>


                                    <!-- RECORD 4 -->
                                    <tr>

                                        <td>

                                            <strong>FreshFlow Foods</strong>

                                            <small class="text-muted d-block">
                                                Ontario
                                            </small>

                                        </td>


                                        <td>
                                            WZ-2025-004
                                        </td>


                                        <td>

                                            <span class="fw-semibold text-danger">
                                                48%
                                            </span>

                                        </td>


                                        <td>

                                            <span class="badge bg-danger">
                                                <i class="fas fa-times-circle me-1"></i>
                                                Failed
                                            </span>

                                        </td>


                                        <td>
                                            Dec 20, 2025
                                        </td>


                                        <td>

                                            <span class="badge bg-danger">
                                                Non-Compliant
                                            </span>

                                        </td>


                                        <td>
                                            <div class="d-flex justify-content-center align-items-center gap-2">
                                                <a href="view-compliance.html" class="btn btn-sm btn-outline-info">

                                                    <i class="fas fa-eye"></i>

                                                </a>


                                                <a href="edit-compliance.html" class="btn btn-sm btn-outline-primary">

                                                    <i class="fas fa-edit"></i>

                                                </a>
                                                 <button type="button" class="btn btn-sm btn-outline-danger"
                                                    data-bs-toggle="modal" data-bs-target="#deleteChemicalKitModal">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>

                                    </tr>

                                </tbody>

                            </table>

                        </div>


                        <!-- CARD FOOTER -->
                        <div
                            class="card-footer bg-transparent d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">

                            <small class="text-muted">
                                Showing 1 – 4 of 1,245 compliance records
                            </small>


                            <nav aria-label="Compliance pagination">

                                <ul class="pagination pagination-sm mb-0">

                                    <li class="page-item disabled">
                                        <a class="page-link" href="#">
                                            Previous
                                        </a>
                                    </li>

                                    <li class="page-item active">
                                        <a class="page-link" href="#">
                                            1
                                        </a>
                                    </li>

                                    <li class="page-item">
                                        <a class="page-link" href="#">
                                            2
                                        </a>
                                    </li>

                                    <li class="page-item">
                                        <a class="page-link" href="#">
                                            3
                                        </a>
                                    </li>

                                    <li class="page-item">
                                        <a class="page-link" href="#">
                                            Next
                                        </a>
                                    </li>

                                </ul>

                            </nav>

                        </div>

                    </div>

                </section>
                <!-- ========== COMPLIANCE TABLE END ========== -->

            </div>
            <!-- ========== DASHBOARD CONTENT END ========== -->
        </div>
        <!-- ========== MAIN CONTENT END ========== -->
    </div>
     <!-- DELETE CHEMICAL KIT MODAL -->
    <div class="modal fade" id="deleteChemicalKitModal" tabindex="-1" aria-labelledby="deleteChemicalKitModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <!-- HEADER -->
                <div class="modal-header">

                    <h5 class="modal-title" id="deleteChemicalKitModalLabel">

                        Delete Chemical Kit

                    </h5>


                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>

                </div>


                <!-- BODY -->
                <div class="modal-body text-center py-4">

                    <div class="mb-3">

                        <i class="fas fa-trash-alt text-danger" style="font-size: 40px;">
                        </i>

                    </div>


                    <h5 class="mb-2" style="font-size: 12px;">
                        Delete this compliance?
                    </h5>


                    <p class="text-muted mb-0" style="font-size: 12px;">

                        You are about to delete
                        <strong>WZ-2025-001</strong>.

                        This action cannot be undone.

                    </p>

                </div>



                <div class="modal-footer justify-content-center">

                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">

                        Cancel

                    </button>


                    <button type="button" class="btn btn-danger btn-sm">

                        <i class="fas fa-trash me-2"></i>

                        Yes, Delete

                    </button>

                </div>

            </div>

        </div>

    </div>

   @include('admin.include.footer')