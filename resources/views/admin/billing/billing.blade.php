@include('admin.include.header')



            <!-- ========== DASHBOARD CONTENT START ========== -->





            <div class="content-area">



                <!-- ========== PAGE HEADER START ========== -->

                <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">

                    <div>

                        <h3 class=" mb-1">Billing Management</h3>

                        <p class="text-muted mb-0">

                            Manage subscription payments, invoices, and billing records.

                        </p>

                    </div>



                    <div class="d-flex gap-2 mt-3 mt-md-0">

                        <!-- <a href="billing-settings.html" class="btn btn-outline-secondary btn-sm">

                <i class="fas fa-cog me-2"></i> Billing Settings

            </a> -->

                        <a href="create-invoice.html" class="btn btn-primary btn-sm">

                            <i class="fas fa-plus me-2"></i> Create Invoice

                        </a>

                    </div>

                </div>

                <!-- ========== PAGE HEADER END ========== -->





                <!-- ========== SUMMARY CARDS START ========== -->

                <section class="mb-4">

                    <div class="row"> <!-- Total Revenue -->

                        <div class="col-lg-3 col-md-6 mb-3">

                            <div class="card shadow h-100 bg-success-subtle border border-success-subtle rounded-3">

                                <div class="card-body">

                                    <div class="d-flex justify-content-between align-items-center "> <span

                                            class="text-muted" style="font-size: 10px;">Total Revenue</span> <span

                                            class="bg-success text-white rounded p-2"> <i

                                                class="fas fa-dollar-sign"></i> </span> </div>

                                    <h3 class="mb-1">CAD 24,850</h3> <small class="text-muted"

                                        style="font-size: 10px;">This month</small>

                                </div>

                            </div>

                        </div> <!-- Paid Invoices -->

                        <div class="col-lg-3 col-md-6 ">

                            <div class="card shadow bg-primary-subtle border border-primary-subtle rounded-3">

                                <div class="card-body">

                                    <div class="d-flex justify-content-between align-items-center "> <span

                                            class="text-muted" style="font-size: 10px;">Paid Invoices</span> <span

                                            class="bg-primary text-white rounded p-2"> <i

                                                class="fas fa-check-circle"></i> </span> </div>

                                    <h3 class="mb-1">186</h3> <small class="text-muted"

                                        style="font-size: 10px;">Successfully paid</small>

                                </div>

                            </div>

                        </div> <!-- Pending Payments -->

                        <div class="col-lg-3 col-md-6 mb-3">

                            <div class="card shadow h-100 bg-warning-subtle border border-warning-subtle rounded-3">

                                <div class="card-body">

                                    <div class="d-flex justify-content-between align-items-center"> <span

                                            class="text-muted" style="font-size: 10px;">Pending Payments</span> <span

                                            class="bg-warning text-white rounded p-2"> <i class="fas fa-clock"></i>

                                        </span> </div>

                                    <h3 class="mb-1">24</h3> <small class="text-muted" style="font-size: 10px;">Awaiting

                                        payment</small>

                                </div>

                            </div>

                        </div> <!-- Overdue -->

                        <div class="col-lg-3 col-md-6 mb-3">

                            <div class="card shadow h-100 bg-danger-subtle border border-danger-subtle rounded-3">

                                <div class="card-body">

                                    <div class="d-flex justify-content-between align-items-center"> <span

                                            class="text-muted" style="font-size: 10px;">Overdue</span> <span

                                            class="bg-danger text-white rounded p-2"> <i

                                                class="fas fa-exclamation-circle"></i> </span> </div>

                                    <h3 class="mb-1">8</h3> <small class="text-muted" style="font-size: 10px;">Require

                                        attention</small>

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





                <!-- ========== INVOICE TABLE START ========== -->

                <section class="mb-4">

                    <div class="card border-0 shadow-sm">



                        <div class="card-header bg-white border-0 p-4">

                            <div class="row align-items-center g-3">



                                <div class="col-lg-5">

                                    <h5 class="mb-1">Invoice Records</h5>

                                    <p class="text-muted small mb-0">

                                        View and manage customer billing invoices.

                                    </p>

                                </div>



                                <div class="col-lg-7">

                                    <div class="row g-2">

                                        <div class="col-md-5">

                                            <input type="text" class="form-control" placeholder="Search invoice...">

                                        </div>



                                        <div class="col-md-4">

                                            <select class="form-select">

                                                <option selected>All Status</option>

                                                <option>Paid</option>

                                                <option>Pending</option>

                                                <option>Overdue</option>

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



                        <div class="table-responsive">

                            <table class="table table-hover align-middle mb-0">



                                <thead class="table-light">

                                    <tr class="table-header-blue">

                                        <th class="px-4">Invoice ID</th>

                                        <th>Customer</th>

                                        <th>Plan</th>

                                        <th>Amount</th>

                                        <th>Due Date</th>

                                        <th>Status</th>

                                        <th class="text-center">Actions</th>

                                    </tr>

                                </thead>



                                <tbody>



                                    <tr>

                                        <td class="px-4 ">#INV-1001</td>

                                        <td>

                                            <div class="">Green Valley Spa</div>

                                            <small class="text-muted">Ontario, Canada</small>

                                        </td>

                                        <td>Starter</td>

                                        <td>CAD 299</td>

                                        <td>Sep 15, 2026</td>

                                        <td>

                                            <span class="badge bg-success">Paid</span>

                                        </td>

                                        <td class="text-center">

                                            <a href="view-billing.html" class="btn btn-sm btn-outline-info me-1"

                                                title="View Invoice">

                                                <i class="fas fa-eye"></i>

                                            </a>

                                            <a href="download-invoice.html" class="btn btn-sm btn-outline-primary"

                                                title="Download Invoice">

                                                <i class="fas fa-download"></i>

                                            </a>

                                        </td>

                                    </tr>



                                    <tr>

                                        <td class="px-4 ">#INV-1002</td>

                                        <td>

                                            <div class="">Pure Brew Brewery</div>

                                            <small class="text-muted">British Columbia, Canada</small>

                                        </td>

                                        <td>Pro</td>

                                        <td>CAD 599</td>

                                        <td>Sep 18, 2026</td>

                                        <td>

                                            <span class="badge bg-warning text-dark">Pending</span>

                                        </td>

                                        <td class="text-center">

                                            <a href="view-billing.html" class="btn btn-sm btn-outline-info me-1"

                                                title="View Invoice">

                                                <i class="fas fa-eye"></i>

                                            </a>

                                            <a href="download-invoice.html" class="btn btn-sm btn-outline-primary"

                                                title="Download Invoice">

                                                <i class="fas fa-download"></i>

                                            </a>

                                        </td>

                                    </tr>



                                    <tr>

                                        <td class="px-4 ">#INV-1003</td>

                                        <td>

                                            <div class="">Fresh Life FMCG</div>

                                            <small class="text-muted">Ontario, Canada</small>

                                        </td>

                                        <td>Starter</td>

                                        <td>CAD 299</td>

                                        <td>Sep 10, 2026</td>

                                        <td>

                                            <span class="badge bg-danger">Overdue</span>

                                        </td>

                                        <td class="text-center">

                                            <a href="view-billing.html" class="btn btn-sm btn-outline-info me-1"

                                                title="View Invoice">

                                                <i class="fas fa-eye"></i>

                                            </a>

                                            <a href="download-invoice.html" class="btn btn-sm btn-outline-primary"

                                                title="Download Invoice">

                                                <i class="fas fa-download"></i>

                                            </a>

                                        </td>

                                    </tr>



                                    <tr>

                                        <td class="px-4 ">#INV-1004</td>

                                        <td>

                                            <div class="">Clear Water Spa</div>

                                            <small class="text-muted">British Columbia, Canada</small>

                                        </td>

                                        <td>Pro</td>

                                        <td>CAD 599</td>

                                        <td>Sep 20, 2026</td>

                                        <td>

                                            <span class="badge bg-success">Paid</span>

                                        </td>

                                        <td class="text-center">

                                            <a href="view-billing.html" class="btn btn-sm btn-outline-info me-1"

                                                title="View Invoice">

                                                <i class="fas fa-eye"></i>

                                            </a>

                                            <a href="download-invoice.html" class="btn btn-sm btn-outline-primary"

                                                title="Download Invoice">

                                                <i class="fas fa-download"></i>

                                            </a>

                                        </td>

                                    </tr>



                                </tbody>



                            </table>

                        </div>



                        <div class="card-footer bg-white border-0 p-4">

                            <div class="d-flex flex-wrap justify-content-between align-items-center">

                                <small class="text-muted">

                                    Showing 1 to 4 of 218 invoices

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

                <!-- ========== INVOICE TABLE END ========== -->





                

            </div>

            <!-- ========== DASHBOARD CONTENT END ========== -->

        </div>

        <!-- ========== MAIN CONTENT END ========== -->

    </div>



  @include('admin.include.footer')