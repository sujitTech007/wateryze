@include('admin.include.header')



            <!-- ========== DASHBOARD CONTENT START ========== -->



            <div class="content-area">



                <!-- ========== PAGE HEADER START ========== -->

                <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">

                    <div>

                        <h3 class="mb-1">Kit Delivery Management</h3>

                        <p class="text-muted mb-0">

                            Manage chemical kit distribution and delivery tracking.

                        </p>

                    </div>



                    <a href="create-kit-delivery.html" class="btn btn-primary mt-3 mt-md-0 btn-sm">

                        <i class="fas fa-plus me-2"></i> Create Delivery

                    </a>

                </div>

                <!-- ========== PAGE HEADER END ========== -->





                <!-- ========== SUMMARY CARDS START ========== -->

                <section class="mb-4">

                    <div class="row"> <!-- Total Deliveries -->

                        <div class="col-lg-3 col-md-6 mb-3">

                            <div class="card shadow h-100 bg-primary-subtle border border-primary-subtle rounded-3">

                                <div class="card-body d-flex align-items-center">

                                    <div class="bg-primary text-white rounded p-3 me-3"> <i

                                            class="fas fa-boxes-stacked fa-lg"></i> </div>

                                    <div>

                                        <p class="text-muted mb-1" style="font-size: 12px;">Total Deliveries</p>

                                        <h4 class="mb-0">248</h4>

                                    </div>

                                </div>

                            </div>

                        </div> <!-- Pending -->

                        <div class="col-lg-3 col-md-6 mb-3">

                            <div class="card shadow h-100 bg-warning-subtle border border-warning-subtle rounded-3">

                                <div class="card-body d-flex align-items-center">

                                    <div class="bg-warning text-white rounded p-3 me-3"> <i

                                            class="fas fa-clock fa-lg"></i> </div>

                                    <div>

                                        <p class="text-muted mb-1" style="font-size: 12px;">Pending</p>

                                        <h4 class="mb-0">32</h4>

                                    </div>

                                </div>

                            </div>

                        </div> <!-- In Transit -->

                        <div class="col-lg-3 col-md-6 mb-3">

                            <div class="card shadow h-100 bg-info-subtle border border-info-subtle rounded-3">

                                <div class="card-body d-flex align-items-center">

                                    <div class="bg-info text-white rounded p-3 me-3"> <i

                                            class="fas fa-truck-fast fa-lg"></i> </div>

                                    <div>

                                        <p class="text-muted mb-1" style="font-size: 12px;">In Transit</p>

                                        <h4 class="mb-0">18</h4>

                                    </div>

                                </div>

                            </div>

                        </div> <!-- Delivered -->

                        <div class="col-lg-3 col-md-6 mb-3">

                            <div class="card shadow h-100 bg-success-subtle border border-success-subtle rounded-3">

                                <div class="card-body d-flex align-items-center">

                                    <div class="bg-success text-white rounded p-3 me-3"> <i

                                            class="fas fa-check-circle fa-lg"></i> </div>

                                    <div>

                                        <p class="text-muted mb-1" style="font-size: 12px;">Delivered</p>

                                        <h4 class="mb-0">198</h4>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </section>

                <!-- ========== SUMMARY CARDS END ========== -->





                <!-- ========== DELIVERY TABLE START ========== -->

                <section class="mb-4">

                    <div class="card border-0 shadow">



                        <!-- Table Header -->

                        <div class="card-header bg-white border-0 p-4">

                            <div class="row align-items-center g-3">



                                <div class="col-lg-5">

                                    <h5 class="mb-1">Delivery Records</h5>

                                    <p class="text-muted small mb-0">

                                        Track chemical kit distribution and delivery status.

                                    </p>

                                </div>



                                <div class="col-lg-7">

                                    <div class="row g-2">



                                        <div class="col-md-5">

                                            <input type="text" class="form-control" placeholder="Search delivery...">

                                        </div>



                                        <div class="col-md-4">

                                            <select class="form-select">

                                                <option selected>All Status</option>

                                                <option>Pending</option>

                                                <option>In Transit</option>

                                                <option>Delivered</option>

                                                <option>Cancelled</option>

                                            </select>

                                        </div>



                                        <div class="col-md-3">

                                            <button class="btn btn-primary w-100">

                                                <i class="fas fa-filter me-1"></i> Filter

                                            </button>

                                        </div>



                                    </div>

                                </div>



                            </div>

                        </div>



                        <!-- Table -->

                        <div class="table-responsive">

                            <table class="table table-hover align-middle mb-0">



                                <thead class="table-light">

                                    <tr class="table-header-blue">

                                        <th class="px-4">Delivery ID</th>

                                        <th>Customer</th>

                                        <th>Kit Type</th>

                                        <th>Quantity</th>

                                        <th>Delivery Date</th>

                                        <th>Status</th>

                                        <th class="text-center">Actions</th>

                                    </tr>

                                </thead>



                                <tbody>



                                    <tr>

                                        <td class="px-4 fw-semibold">#DEL-1001</td>

                                        <td>

                                            <div class="fw-semibold">Green Valley Spa</div>

                                            <small class="text-muted">Ontario, Canada</small>

                                        </td>

                                        <td>Water Testing Kit</td>

                                        <td>10</td>

                                        <td>Sep 16, 2026</td>

                                        <td>

                                            <span class="badge bg-success">

                                                Delivered

                                            </span>

                                        </td>

                                        <td>

                                            <div class="d-flex justify-content-center align-items-center gap-2">

                                                <a href="view-kit-delivery.html"

                                                    class="btn btn-sm btn-outline-info me-1" title="View">

                                                    <i class="fas fa-eye"></i>

                                                </a>

                                                <a href="edit-kit-delivery.html" class="btn btn-sm btn-outline-primary"

                                                    title="Edit">

                                                    <i class="fas fa-edit"></i>

                                                </a>

                                                  <button type="button" class="btn btn-sm btn-outline-danger"

                                                    data-bs-toggle="modal" data-bs-target="#deleteChemicalKitModal">

                                                    <i class="fas fa-trash"></i>

                                                </button>

                                                

                                            </div>

                                        </td>

                                    </tr>



                                    <tr>

                                        <td class="px-4 fw-semibold">#DEL-1002</td>

                                        <td>

                                            <div class="fw-semibold">Pure Brew Brewery</div>

                                            <small class="text-muted">British Columbia, Canada</small>

                                        </td>

                                        <td>Chemical Testing Kit</td>

                                        <td>5</td>

                                        <td>Sep 17, 2026</td>

                                        <td>

                                            <span class="badge bg-info">

                                                In Transit

                                            </span>

                                        </td>

                                        <td>

                                            <div class="d-flex justify-content-center align-items-center gap-2">

                                                <a href="view-kit-delivery.html"

                                                    class="btn btn-sm btn-outline-info me-1" title="View">

                                                    <i class="fas fa-eye"></i>

                                                </a>

                                                <a href="edit-kit-delivery.html" class="btn btn-sm btn-outline-primary"

                                                    title="Edit">

                                                    <i class="fas fa-edit"></i>

                                                </a>

                                                  <button type="button" class="btn btn-sm btn-outline-danger"

                                                    data-bs-toggle="modal" data-bs-target="#deleteChemicalKitModal">

                                                    <i class="fas fa-trash"></i>

                                                </button>

                                            </div>

                                        </td>

                                    </tr>



                                    <tr>

                                        <td class="px-4 fw-semibold">#DEL-1003</td>

                                        <td>

                                            <div class="fw-semibold">Fresh Life FMCG</div>

                                            <small class="text-muted">Ontario, Canada</small>

                                        </td>

                                        <td>Compliance Kit</td>

                                        <td>8</td>

                                        <td>Sep 18, 2026</td>

                                        <td>

                                            <span class="badge bg-warning text-dark">

                                                Pending

                                            </span>

                                        </td>

                                        <td>

                                            <div class="d-flex justify-content-center align-items-center gap-2">

                                                <a href="view-kit-delivery.html"

                                                    class="btn btn-sm btn-outline-info me-1" title="View">

                                                    <i class="fas fa-eye"></i>

                                                </a>

                                                <a href="edit-kit-delivery.html" class="btn btn-sm btn-outline-primary"

                                                    title="Edit">

                                                    <i class="fas fa-edit"></i>

                                                </a>

                                                  <button type="button" class="btn btn-sm btn-outline-danger"

                                                    data-bs-toggle="modal" data-bs-target="#deleteChemicalKitModal">

                                                    <i class="fas fa-trash"></i>

                                                </button>

                                            </div>



                                        </td>

                                    </tr>



                                    <tr>

                                        <td class="px-4 fw-semibold">#DEL-1004</td>

                                        <td>

                                            <div class="fw-semibold">Clear Water Spa</div>

                                            <small class="text-muted">British Columbia, Canada</small>

                                        </td>

                                        <td>Water Testing Kit</td>

                                        <td>12</td>

                                        <td>Sep 19, 2026</td>

                                        <td>

                                            <span class="badge bg-warning text-dark">

                                                Pending

                                            </span>

                                        </td>

                                        <td>

                                            <div class="d-flex justify-content-center align-items-center gap-2">

                                                <a href="view-kit-delivery.html"

                                                    class="btn btn-sm btn-outline-info me-1" title="View">

                                                    <i class="fas fa-eye"></i>

                                                </a>

                                                <a href="edit-kit-delivery.html" class="btn btn-sm btn-outline-primary"

                                                    title="Edit">

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



                        <!-- Pagination -->

                        <div class="card-footer bg-white border-0 p-4">

                            <div class="d-flex flex-wrap justify-content-between align-items-center">



                                <small class="text-muted">

                                    Showing 1 to 4 of 248 deliveries

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

                </section>

                <!-- ========== DELIVERY TABLE END ========== -->





                <!-- ========== DELIVERY INFORMATION START ========== -->

                <section>

                    <div class="row">



                      

                       



                    </div>

                </section>

                <!-- ========== DELIVERY INFORMATION END ========== -->



            </div>

            <!-- ========== DASHBOARD CONTENT END ========== -->

        </div>

        <!-- ========== MAIN CONTENT END ========== -->

    </div>

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

                        Delete this kit-delivery?

                    </h5>





                    <p class="text-muted mb-0" style="font-size: 12px;">



                        You are about to delete

                        <strong>Green Valley Spa

Ontario, Canada</strong>.



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

    <!-- Bootstrap JS -->

   @include('admin.include.footer')