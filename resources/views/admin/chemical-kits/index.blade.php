@include('admin.include.header')

            <!-- ========== DASHBOARD CONTENT START ========== -->
            <div class="content-area">

                <!-- PAGE HEADER -->
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
                    <div>
                        <h3 class="mb-1">Chemical Kits</h3>
                        <p class="text-muted mb-0">
                            Manage chemical kit inventory, assignments and delivery status.
                        </p>
                    </div>

                    <a href="create-chemical-kits.html" type="button" class="btn btn-primary mt-3 mt-md-0 btn-sm">
                        <i class="fas fa-plus me-2"></i>
                        create Chemical Kit
                    </a>
                </div>


                <!-- ========== SUMMARY CARDS START ========== -->
                <section class="summary-cards mb-4">

                    <div class="row g-4"> <!-- Total Kits -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div
                                class="card stat-card h-100 bg-primary-subtle border border-primary-subtle shadow rounded-3">
                                <div class="card-body">
                                    <div class="stat-icon bg-primary"> <i class="fas fa-flask"></i> </div>
                                    <div class="stat-content">
                                        <p class="stat-label">Total Kits</p>
                                        <h3 class="stat-value">248</h3>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Assigned Kits -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div
                                class="card stat-card h-100 bg-success-subtle border border-success-subtle shadow rounded-3">
                                <div class="card-body">
                                    <div class="stat-icon bg-success"> <i class="fas fa-check-circle"></i> </div>
                                    <div class="stat-content">
                                        <p class="stat-label">Assigned Kits</p>
                                        <h3 class="stat-value">186</h3>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Low Stock -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div
                                class="card stat-card h-100 bg-warning-subtle border border-warning-subtle shadow rounded-3">
                                <div class="card-body">
                                    <div class="stat-icon bg-warning"> <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                    <div class="stat-content">
                                        <p class="stat-label">Low Stock</p>
                                        <h3 class="stat-value">12</h3>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Pending Delivery -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div
                                class="card stat-card h-100 bg-info-subtle border border-info-subtle shadow rounded-3">
                                <div class="card-body">
                                    <div class="stat-icon bg-info"> <i class="fas fa-truck"></i> </div>
                                    <div class="stat-content">
                                        <p class="stat-label">Pending Delivery</p>
                                        <h3 class="stat-value">18</h3>
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

                <!-- ========== CHEMICAL KITS TABLE START ========== -->
                <section>

                    <div class="card chart-card">

                        <!-- CARD HEADER -->
                        <div class="card-header bg-transparent d-flex flex-column flex-md-row 
                        justify-content-between align-items-md-center gap-3">

                            <div>
                                <h5 class="mb-1">Chemical Kit Inventory</h5>
                                <small class="text-muted">
                                    Monitor available, assigned and delivered chemical kits.
                                </small>
                            </div>



                        </div>


                        <!-- TABLE -->
                        <div class="table-responsive">

                            <table class="table table-hover align-middle mb-0">

                                <thead class="table-light">

                                    <tr class="table-header-blue">
                                        <th>Kit ID</th>
                                        <th>Kit Type</th>
                                        <th>Assigned Customer</th>
                                        <th>Chemical Usage</th>
                                        <th>Last Delivery</th>
                                        <th>Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>

                                </thead>


                                <tbody>

                                    <!-- ROW 1 -->
                                    <tr>

                                        <td>
                                            <strong>CK-2025-001</strong>
                                        </td>

                                        <td>
                                            Standard Kit
                                        </td>

                                        <td>
                                            Blue Haven Spa
                                        </td>

                                        <td>
                                            <span class="fw-semibold">3 / 4</span>
                                            <small class="text-muted d-block">
                                                Chemicals Available
                                            </small>
                                        </td>

                                        <td>
                                            Dec 18, 2025
                                        </td>

                                        <td>
                                            <span class="badge bg-success">
                                                Active
                                            </span>
                                        </td>

                                        <td>
                                            <div class="d-flex justify-content-center align-items-center gap-2">

                                                <a href="view-chemical-kits.html" class="btn btn-sm btn-outline-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>


                                                <a href="edit-chemical-kits.html"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <button type="button" class="btn btn-sm btn-outline-danger"
                                                    data-bs-toggle="modal" data-bs-target="#deleteChemicalKitModal">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>

                                        </td>

                                    </tr>


                                    <!-- ROW 2 -->
                                    <tr>

                                        <td>
                                            <strong>CK-2025-002</strong>
                                        </td>

                                        <td>
                                            Professional Kit
                                        </td>

                                        <td>
                                            Maple Brewery
                                        </td>

                                        <td>
                                            <span class="fw-semibold">4 / 4</span>
                                            <small class="text-muted d-block">
                                                Chemicals Available
                                            </small>
                                        </td>

                                        <td>
                                            Jan 05, 2026
                                        </td>

                                        <td>
                                            <span class="badge bg-success">
                                                Delivered
                                            </span>
                                        </td>

                                        <td>
                                            <div class="d-flex justify-content-center align-items-center gap-2">

                                                <a href="view-chemical-kits.html" class="btn btn-sm btn-outline-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                <a href="edit-chemical-kits.html"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <button type="button" class="btn btn-sm btn-outline-danger"
                                                    data-bs-toggle="modal" data-bs-target="#deleteChemicalKitModal">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>

                                        </td>

                                    </tr>


                                    <!-- ROW 3 -->
                                    <tr>

                                        <td>
                                            <strong>CK-2025-003</strong>
                                        </td>

                                        <td>
                                            Enterprise Kit
                                        </td>

                                        <td>
                                            Crystal Waters
                                        </td>

                                        <td>
                                            <span class="fw-semibold">
                                                1 / 4
                                            </span>

                                            <small class="text-muted d-block">
                                                Low Chemical Stock
                                            </small>
                                        </td>

                                        <td>
                                            Jan 12, 2026
                                        </td>

                                        <td>
                                            <span class="badge bg-warning text-dark">
                                                Low Stock
                                            </span>
                                        </td>

                                        <td>
                                            <div class="d-flex justify-content-center align-items-center gap-2">

                                                <a href="view-chemical-kits.html" class="btn btn-sm btn-outline-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>


                                                <a href="edit-chemical-kits.html"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <button type="button" class="btn btn-sm btn-outline-danger"
                                                    data-bs-toggle="modal" data-bs-target="#deleteChemicalKitModal">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>

                                        </td>

                                    </tr>


                                    <!-- ROW 4 -->
                                    <tr>

                                        <td>
                                            <strong>CK-2025-004</strong>
                                        </td>

                                        <td>
                                            Standard Kit
                                        </td>

                                        <td>
                                            FreshFlow Foods
                                        </td>

                                        <td>
                                            <span class="fw-semibold">0 / 4</span>

                                            <small class="text-muted d-block">
                                                Awaiting Refill
                                            </small>
                                        </td>

                                        <td>
                                            Dec 28, 2025
                                        </td>

                                        <td>
                                            <span class="badge bg-info">
                                                Pending Delivery
                                            </span>
                                        </td>

                                        <td>
                                            <div class="d-flex justify-content-center align-items-center gap-2">

                                                <a href="view-chemical-kits.html" class="btn btn-sm btn-outline-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>


                                                <a href="edit-chemical-kits.html"
                                                    class="btn btn-sm btn-outline-primary">
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
                        <div class="card-footer bg-transparent 
                        d-flex justify-content-between align-items-center">

                            <small class="text-muted">
                                Showing 1 – 4 of 248 chemical kits
                            </small>

                            <nav>

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
                <!-- ========== CHEMICAL KITS TABLE END ========== -->

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
                        Delete this chemical kit?
                    </h5>


                    <p class="text-muted mb-0" style="font-size: 12px;">

                        You are about to delete
                        <strong>CK-2025-001</strong>.

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