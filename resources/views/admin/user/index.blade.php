@include('admin.include.header')

            <!-- ========== USERS CONTENT START ========== -->
            <div class="content-area">
                <!-- Page Header with Action Buttons -->
                <div class="page-header mb-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h3 class="mb-0">User Management</h3>
                            <small class="text-muted">Manage all system users and their permissions</small>
                        </div>
                        <div class="col-md-6 text-md-end mt-3 mt-md-0">
                            <a href="create-user.html" class="btn btn-primary me-2 btn-sm">
                                <i class="fas fa-plus"></i> create New User
                            </a>
                            <!-- <button class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-download"></i> Export
                            </button> -->
                        </div>
                    </div>
                </div>

                <!-- Search and Filter Section -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Search users...">
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

                <!-- Users Table -->
                <div class="card table-card">
                    <div class="card-header border-0">
                        <h5 class="card-title mb-0">All Users</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr class="table-header-blue">
                                    <th>S.No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Joined</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="../assets/images/profile-icon.png" alt="User"
                                                class="rounded-circle me-2">
                                            <span>John Doe</span>
                                        </div>
                                    </td>
                                    <td>john.doe@example.com</td>
                                    <td><span class="badge bg-info">Admin</span></td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>Jan 2, 2026</td>
                                    <td>
                                       <div class="d-flex justify-content-center align-items-center gap-2">
                                         <a href="view-user.html" class="btn btn-sm btn-outline-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                        <a href="edit-user.html" class="btn btn-sm btn-outline-primary "
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="btn btn-sm btn-outline-danger" title="Delete"
                                            data-bs-toggle="modal" data-bs-target="#deleteUserModal">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="../assets/images/profile-icon.png" alt="User"
                                                class="rounded-circle me-2">
                                            <span>Sarah Smith</span>
                                        </div>
                                    </td>
                                    <td>sarah.smith@example.com</td>
                                    <td><span class="badge bg-primary">User</span></td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>Jan 5, 2026</td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center gap-2">
                                         <a href="view-user.html" class="btn btn-sm btn-outline-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                        <a href="edit-user.html" class="btn btn-sm btn-outline-primary "
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="btn btn-sm btn-outline-danger" title="Delete"
                                            data-bs-toggle="modal" data-bs-target="#deleteUserModal">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="../assets/images/profile-icon.png" alt="User"
                                                class="rounded-circle me-2">
                                            <span>Mike Johnson</span>
                                        </div>
                                    </td>
                                    <td>mike.johnson@example.com</td>
                                    <td><span class="badge bg-primary">User</span></td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                    <td>Jan 8, 2026</td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center gap-2">
                                         <a href="view-user.html" class="btn btn-sm btn-outline-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                        <a href="edit-user.html" class="btn btn-sm btn-outline-primary "
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="btn btn-sm btn-outline-danger" title="Delete"
                                            data-bs-toggle="modal" data-bs-target="#deleteUserModal">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="../assets/images/profile-icon.png" alt="User"
                                                class="rounded-circle me-2">
                                            <span>Emily Davis</span>
                                        </div>
                                    </td>
                                    <td>emily.davis@example.com</td>
                                    <td><span class="badge bg-success">Subscriber</span></td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>Jan 10, 2026</td>
                                    <td>
                                          <div class="d-flex justify-content-center align-items-center gap-2">
                                    
                                         <a href="view-user.html" class="btn btn-sm btn-outline-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                        <a href="edit-user.html" class="btn btn-sm btn-outline-primary "
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="btn btn-sm btn-outline-danger" title="Delete"
                                            data-bs-toggle="modal" data-bs-target="#deleteUserModal">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="../assets/images/profile-icon.png" alt="User"
                                                class="rounded-circle me-2">
                                            <span>Robert Brown</span>
                                        </div>
                                    </td>
                                    <td>robert.brown@example.com</td>
                                    <td><span class="badge bg-success">Subscriber</span></td>
                                    <td><span class="badge bg-danger">Inactive</span></td>
                                    <td>Jan 12, 2026</td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center gap-2">
                                         <a href="view-user.html" class="btn btn-sm btn-outline-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                        <a href="edit-user.html" class="btn btn-sm btn-outline-primary "
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="btn btn-sm btn-outline-danger" title="Delete"
                                            data-bs-toggle="modal" data-bs-target="#deleteUserModal">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="../assets/images/profile-icon.png" alt="User"
                                                class="rounded-circle me-2">
                                            <span>Lisa Wilson</span>
                                        </div>
                                    </td>
                                    <td>lisa.wilson@example.com</td>
                                    <td><span class="badge bg-primary">User</span></td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>Jan 14, 2026</td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center gap-2">
                                         <a href="view-user.html" class="btn btn-sm btn-outline-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                        <a href="edit-user.html" class="btn btn-sm btn-outline-primary "
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="btn btn-sm btn-outline-danger" title="Delete"
                                            data-bs-toggle="modal" data-bs-target="#deleteUserModal">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        </div>
                                         
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    <div class="card-footer border-top">
                        <nav aria-label="Page navigation" class="d-flex justify-content-end">
                            <ul class="pagination mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- ========== USERS CONTENT END ========== -->
        </div>
        <!-- ========== MAIN CONTENT END ========== -->
    </div>
    <!-- ========== DELETE USER MODAL START ========== -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content border-0 shadow">

                <!-- Modal Header -->
                <div class="modal-header border-0 pb-0">

                    <h5 class="modal-title" id="deleteUserModalLabel">
                        Delete User
                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>

                </div>


                <!-- Modal Body -->
                <div class="modal-body text-center px-4 py-4">

                    <!-- Warning Icon -->
                    <div class="mb-3">

                        <div class="d-inline-flex align-items-center
                        justify-content-center
                        bg-danger bg-opacity-10
                        text-danger rounded-circle" style="width: 70px; height: 70px;">

                            <i class="fas fa-trash-alt fa-2x"></i>

                        </div>

                    </div>


                    <h5 class="fw-bold mb-2" style="font-size: 12px;">
                        Are you sure?
                    </h5>


                    <p class="text-muted mb-0" style="font-size: 12px;">

                        Are you sure you want to delete
                        <strong id="deleteUserName">John Doe</strong>?

                        <br>

                        This action cannot be undone.

                    </p>

                </div>


                <!-- Modal Footer -->
                <div class="modal-footer border-0
                justify-content-center pt-0 pb-4">

                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">

                        Cancel

                    </button>


                    <button type="button" class="btn btn-danger btn-sm">

                        <i class="fas fa-trash me-1"></i>
                        Delete User

                    </button>

                </div>

            </div>

        </div>

    </div>
    <!-- ========== DELETE USER MODAL END ========== -->

    @include('admin.include.footer')