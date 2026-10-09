@include('user.include.header')



            <!-- ========== DASHBOARD CONTENT START ========== -->

            <div class="content-area">

                 <div class="mb-4">

                    <button class="menu-toggle d-lg-none" id="menuToggle">

                        <i class="fas fa-bars"></i>

                    </button>

                    <h2 class="page-title" id="pageTitle">Reports</h2>

                </div>

               

                <!-- Reports Table -->

                <div class="chart-card">

                    <div class="card-header d-flex justify-content-between align-items-center">

                        <h5 class="mb-0">Customer Reports</h5>

                        <div class="btn-group" role="group">

                            <button type="button" class="btn btn-sm btn-primary">

                                <i class="fas fa-filter"></i> Filter

                            </button>

                            <!-- <button type="button" class="btn btn-sm btn-outline-secondary">

                                <i class="fas fa-download"></i> Export

                            </button> -->

                            <!-- <button type="button" class="btn btn-sm btn-primary">

                                <i class="fas fa-plus"></i> Add Report

                            </button> -->

                        </div>

                    </div>



                    <div class="table-responsive">

                        <table class="table table-hover mb-0">

                            <thead>

                                <tr class="table-header-blue">

                                    <th>Customer ID</th>

                                    <th>Contact</th>

                                    <th>Status</th>

                                    <th>Water Quality</th>

                                    <th>Kit Usage</th>

                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                <tr>

                                    <td>

                                        <strong>WZ-2025-001</strong><br>

                                        <small class="text-muted">Blue Haven Spa – Ontario</small>

                                    </td>

                                    <td>manager@blue…</td>

                                    <td>

                                        <span class="badge bg-warning text-dark">

                                            <i class="fas fa-exclamation-triangle"></i> Warning

                                        </span>

                                    </td>

                                    <td>

                                        <small>pH: 6.2 (Low)<br>Turbidity: 22 NTU</small>

                                    </td>

                                    <td>2/4 Chemicals</td>

                                    <td>

                                      <a href="{{ route('user.reports.view') }}" class="btn btn-sm btn-link"><i class="fas fa-eye"></i></a>

                                        <a href="{{ route('user.reports.edit') }}" class="btn btn-sm btn-link"><i class="fas fa-edit"></i></a>

                                        <a href="#" class="btn btn-sm btn-link text-danger"data-bs-toggle="modal"

        data-bs-target="#deleteReportModal"><i class="fas fa-trash"></i></a>

                                    </td>

                                </tr>

                                <tr>

                                    <td>

                                        <strong>WZ-2025-002</strong><br>

                                        <small class="text-muted">Maple Brewery – BC</small>

                                    </td>

                                    <td>brew@maplebre…</td>

                                    <td>

                                        <span class="badge bg-success">

                                            <i class="fas fa-check-circle"></i> Compliant

                                        </span>

                                    </td>

                                    <td>

                                        <small>pH: 7.1, TDS: 380 ppm<br>ORP: 670 mV</small>

                                    </td>

                                    <td>4/4 Chemicals</td>

                                    <td>

                                      <a href="{{ route('user.reports.view') }}" class="btn btn-sm btn-link"><i class="fas fa-eye"></i></a>

                                        <a href="{{ route('user.reports.edit') }}" class="btn btn-sm btn-link"><i class="fas fa-edit"></i></a>

                                        <a href="#" class="btn btn-sm btn-link text-danger"data-bs-toggle="modal"

        data-bs-target="#deleteReportModal"><i class="fas fa-trash"></i></a>

                                    </td>

                                </tr>

                                <tr>

                                    <td>

                                        <strong>WZ-2025-003</strong><br>

                                        <small class="text-muted">Crystal Waters – AB</small>

                                    </td>

                                    <td>admin@crystal…</td>

                                    <td>

                                        <span class="badge bg-success">

                                            <i class="fas fa-check-circle"></i> Compliant

                                        </span>

                                    </td>

                                    <td>

                                        <small>pH: 7.0, TDS: 350 ppm<br>ORP: 685 mV</small>

                                    </td>

                                    <td>3/4 Chemicals</td>

                                    <td>

                                        <a href="{{ route('user.reports.view') }}" class="btn btn-sm btn-link"><i class="fas fa-eye"></i></a>

                                        <a href="{{ route('user.reports.edit') }}" class="btn btn-sm btn-link"><i class="fas fa-edit"></i></a>

                                        <a href="#" class="btn btn-sm btn-link text-danger" data-bs-toggle="modal"

        data-bs-target="#deleteReportModal"><i class="fas fa-trash"></i></a>

                                    </td>

                                </tr>

                            </tbody>

                        </table>

                    </div>



                    <div class="card-footer d-flex justify-content-between align-items-center">

                        <small class="text-muted">1 – 10 of 13 entries</small>

                        <!-- <small class="text-muted">Page 1</small> -->

                    </div>

                </div>

            </div>

        </div>

    </div>



    <!-- ========== DELETE REPORT MODAL START ========== -->

<div class="modal fade"

     id="deleteReportModal"

     tabindex="-1"

     aria-labelledby="deleteReportModalLabel"

     aria-hidden="true">



    <div class="modal-dialog modal-dialog-centered">



        <div class="modal-content border-0 shadow">



            <!-- Modal Header -->

            <div class="modal-header border-0 pb-0">



                <h5 class="modal-title"

                    id="deleteReportModalLabel">



                    Delete Report



                </h5>



                <button type="button"

                        class="btn-close"

                        data-bs-dismiss="modal"

                        aria-label="Close">

                </button>



            </div>





            <!-- Modal Body -->

            <div class="modal-body text-center px-4 py-4">



                <!-- Warning Icon -->

                <div class="d-inline-flex

                            align-items-center

                            justify-content-center

                            bg-danger

                            bg-opacity-10

                            text-danger

                            rounded-circle

                            mb-3"

                     style="width: 70px; height: 70px;">



                    <i class="fas fa-trash-alt fa-2x"></i>



                </div>





                <h5 class="fw-bold mb-2">

                    Are you sure?

                </h5>





                <p class="text-muted mb-0">



                    Are you sure you want to delete this customer report?



                    <br><br>



                    <strong>

                        Report ID: WZ-2025-001

                    </strong>



                    <br><br>



                    This action cannot be undone.



                </p>



            </div>





            <!-- Modal Footer -->

            <div class="modal-footer

                        border-0

                        justify-content-center

                        pt-0

                        pb-4">



                <!-- Cancel -->

                <button type="button"

                        class="btn btn-outline-secondary"

                        data-bs-dismiss="modal">



                    Cancel



                </button>





                <!-- Delete -->

                <button type="button"

                        class="btn btn-danger px-4" >



                    <i class="fas fa-trash me-1" ></i>



                    Delete Report



                </button>



            </div>



        </div>



    </div>



</div>

@include('user.include.footer')