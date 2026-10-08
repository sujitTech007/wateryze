@include('admin.include.header')

            <!-- ========== DASHBOARD CONTENT START ========== -->


            <div class="content-area">

                <!-- Page Header -->
                <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
                    <div>
                        <h4 class="mb-1">Technicians</h4>
                        <p class="text-muted mb-0">
                            Manage technicians, assignments, verification, and service activities.
                        </p>
                    </div>

                    <a href="create-technician.html" class="btn btn-primary mt-2 mt-md-0 btn-sm">
                        <i class="fas fa-user-plus me-2"></i>
                        Create Technician
                    </a>
                </div>

                <!-- Summary Cards -->
                <div class="row g-4 mb-4"> <!-- Total Technicians -->
                    <div class="col-xl-3 col-md-6">
                        <div class="card shadow h-100 bg-primary-subtle border border-primary-subtle rounded-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="text-muted mb-1" style="font-size: 10px;">Total Technicians</p>
                                        <h3 class="mb-0">64</h3>
                                    </div>
                                    <div class="bg-primary text-white rounded-circle p-3"> <i
                                            class="fas fa-users-cog fa-lg"></i> </div>
                                </div> <small class="text-muted"style="font-size: 10px;"> <i class="fas fa-arrow-up"></i> 8% this month </small>
                            </div>
                        </div>
                    </div> <!-- Active Technicians -->
                    <div class="col-xl-3 col-md-6">
                        <div class="card shadow h-100 bg-success-subtle border border-success-subtle rounded-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="text-muted mb-1"style="font-size: 10px;">Active Technicians</p>
                                        <h3 class="mb-0">48</h3>
                                    </div>
                                    <div class="bg-success text-white rounded-circle p-3"> <i
                                            class="fas fa-user-check fa-lg"></i> </div>
                                </div> <small class="text-muted"style="font-size: 10px;">Currently available</small>
                            </div>
                        </div>
                    </div> <!-- Pending Verification -->
                    <div class="col-xl-3 col-md-6">
                        <div class="card shadow h-100 bg-warning-subtle border border-warning-subtle rounded-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="text-muted mb-1"style="font-size: 10px;">Pending Verification</p>
                                        <h3 class="mb-0">10</h3>
                                    </div>
                                    <div class="bg-warning text-white rounded-circle p-3"> <i
                                            class="fas fa-user-clock fa-lg"></i> </div>
                                </div> <small class="text-muted"style="font-size: 10px;">Requires admin review</small>
                            </div>
                        </div>
                    </div> <!-- Assigned Services -->
                    <div class="col-xl-3 col-md-6">
                        <div class="card shadow h-100 bg-info-subtle border border-info-subtle rounded-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="text-muted mb-1"style="font-size: 10px;">Assigned Services</p>
                                        <h3 class="mb-0">126</h3>
                                    </div>
                                    <div class="bg-info text-white rounded-circle p-3"> <i
                                            class="fas fa-clipboard-list fa-lg"></i> </div>
                                </div> <small class="text-muted"style="font-size: 10px;">Active service assignments</small>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Filters -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">

                        <div class="row g-3 align-items-end">

                            <div class="col-lg-4 col-md-6">
                                <label class="form-label">Search Technician</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-search"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Name, email, or phone">
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <label class="form-label">Verification Status</label>
                                <select class="form-select">
                                    <option selected>All Status</option>
                                    <option>Verified</option>
                                    <option>Pending</option>
                                    <option>Rejected</option>
                                </select>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <label class="form-label">Availability</label>
                                <select class="form-select">
                                    <option selected>All Technicians</option>
                                    <option>Available</option>
                                    <option>Busy</option>
                                    <option>Inactive</option>
                                </select>
                            </div>

                            <div class="col-lg-2 col-md-6">
                                <button class="btn btn-primary w-100">
                                    <i class="fas fa-filter me-2"></i>
                                    Filter
                                </button>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Technicians Table -->
                <div class="card border-0 shadow-sm mb-4">
                    <div
                        class="card-header bg-white border-0 d-flex flex-wrap justify-content-between align-items-center">
                        <h5 class="mb-0">Technician Records</h5>

                        <!-- <a href="technician-reports.html" class="btn btn-outline-secondary btn-sm mt-2 mt-md-0">
                            <i class="fas fa-file-export me-2"></i>
                            Export Report
                        </a> -->
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">

                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr class="table-header-blue">
                                        <th>Technician</th>
                                        <th>Contact</th>
                                        <th>Assigned Sites</th>
                                        <th>Services</th>
                                        <th>Verification</th>
                                        <th>Availability</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="bg-primary bg-opacity-10 text-primary rounded-circle p-2 me-3">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-1">Daniel Wilson</h6>
                                                    <small class="text-muted">TECH-1001</small>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div>daniel@example.com</div>
                                            <small class="text-muted">+1 416 555 0124</small>
                                        </td>

                                        <td>8 Sites</td>
                                        <td>24 Completed</td>

                                        <td>
                                            <span class="badge bg-success-subtle text-success">
                                                Verified
                                            </span>
                                        </td>

                                        <td>
                                            <span class="badge bg-success">
                                                Available
                                            </span>
                                        </td>

                                        <td>
                                            <div class="d-flex justify-content-center align-items-center gap-2">
                                                <a href="view-technician.html" class="btn btn-sm btn-outline-info"
                                                    title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                <a href="edit-technician.html" class="btn btn-sm btn-outline-primary"
                                                    title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteTechnicianModal" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="bg-primary bg-opacity-10 text-primary rounded-circle p-2 me-3">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-1">Sophia Martin</h6>
                                                    <small class="text-muted">TECH-1002</small>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div>sophia@example.com</div>
                                            <small class="text-muted">+1 604 555 0198</small>
                                        </td>

                                        <td>5 Sites</td>
                                        <td>18 Completed</td>

                                        <td>
                                            <span class="badge bg-success-subtle text-success">
                                                Verified
                                            </span>
                                        </td>

                                        <td>
                                            <span class="badge bg-warning text-dark">
                                                Busy
                                            </span>
                                        </td>

                                        <td>
                                            <div class="d-flex justify-content-center align-items-center gap-2">
                                                <a href="view-technician.html" class="btn btn-sm btn-outline-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                <a href="edit-technician.html" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteTechnicianModal">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="bg-primary bg-opacity-10 text-primary rounded-circle p-2 me-3">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-1">Michael Brown</h6>
                                                    <small class="text-muted">TECH-1003</small>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div>michael@example.com</div>
                                            <small class="text-muted">+1 905 555 0177</small>
                                        </td>

                                        <td>3 Sites</td>
                                        <td>9 Completed</td>

                                        <td>
                                            <span class="badge bg-warning-subtle text-warning">
                                                Pending
                                            </span>
                                        </td>

                                        <td>
                                            <span class="badge bg-danger">
                                                Inactive
                                            </span>
                                        </td>

                                        <td>
                                            <div class="d-flex justify-content-center align-items-center gap-2">
                                                <a href="view-technician.html" class="btn btn-sm btn-outline-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                <a href="edit-technician.html" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteTechnicianModal">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="bg-primary bg-opacity-10 text-primary rounded-circle p-2 me-3">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-1">Emily Johnson</h6>
                                                    <small class="text-muted">TECH-1004</small>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div>emily@example.com</div>
                                            <small class="text-muted">+1 778 555 0145</small>
                                        </td>

                                        <td>6 Sites</td>
                                        <td>21 Completed</td>

                                        <td>
                                            <span class="badge bg-success-subtle text-success">
                                                Verified
                                            </span>
                                        </td>

                                        <td>
                                            <span class="badge bg-success">
                                                Available
                                            </span>
                                        </td>

                                        <td>
                                            <div class="d-flex justify-content-center align-items-center gap-2">
                                                <a href="view-technician.html" class="btn btn-sm btn-outline-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                <a href="edit-technician.html" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteTechnicianModal">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="card-footer bg-white border-0">
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <small class="text-muted">
                                Showing 1 to 4 of 64 technicians
                            </small>

                            <nav class="mt-2 mt-md-0">
                                <ul class="pagination pagination-sm mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#">Previous</a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Technician Workflow -->
              

            </div>

            <!-- Delete Technician Modal -->
            <div class="modal fade" id="deleteTechnicianModal" tabindex="-1"
                aria-labelledby="deleteTechnicianModalLabel" aria-hidden="true">

                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteTechnicianModalLabel" style="font-size: 12px;">
                                Delete Technician
                            </h5>

                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>

                        <div class="modal-body" style="font-size: 12px;">
                            Are you sure you want to delete this technician?
                            This action cannot be undone.
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                                Cancel
                            </button>

                            <a href="delete-technician.html" class="btn btn-danger btn-sm">
                                Delete Technician
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            <!-- ========== DASHBOARD CONTENT END ========== -->
        </div>
        <!-- ========== MAIN CONTENT END ========== -->
    </div>
@include('admin.include.footer')