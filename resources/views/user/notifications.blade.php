@include('user.include.header')

            <!-- ========== DASHBOARD CONTENT START ========== -->

            <div class="content-area">

                <!-- Notification Filters -->

                <div class="row mb-4">

                    <div class="col-12">

                        <div class="btn-group flex-wrap" role="group">

                            <button type="button" class="btn btn-primary">All</button>

                            <button type="button" class="btn btn-outline-primary">Alerts</button>

                            <button type="button" class="btn btn-outline-primary">Reminders</button>

                            <button type="button" class="btn btn-outline-primary">System</button>

                            <button type="button" class="btn btn-outline-primary">Read</button>

                            <button type="button" class="btn btn-outline-primary">Unread</button>

                        </div>

                    </div>

                </div>



                <!-- Active Alerts Section -->

                <div class="row mb-5">

                    <div class="col-12">

                        <h5 class="mb-3">

                            <i class="fas fa-exclamation-triangle text-warning"></i> Active Alerts (2)

                        </h5>

                        

                        <div class="row">

                            <!-- Alert 1 -->

                            <div class="col-lg-6 mb-3">

                                <div class="alert alert-warning border-start border-5" role="alert">

                                    <div class="d-flex justify-content-between align-items-start">

                                        <div>

                                            <h6 class="alert-heading">

                                                <i class="fas fa-exclamation-triangle"></i> BOD Level Alert

                                            </h6>

                                            <p class="mb-1">BOD concentration is 12 mg/L (threshold: 10 mg/L)</p>

                                            <small class="text-muted">2 hours ago • Tank B</small>

                                        </div>

                                        <button class="btn btn-sm btn-light">Dismiss</button>

                                    </div>

                                </div>

                            </div>



                            <!-- Alert 2 -->

                            <div class="col-lg-6 mb-3">

                                <div class="alert alert-warning border-start border-5" role="alert">

                                    <div class="d-flex justify-content-between align-items-start">

                                        <div>

                                            <h6 class="alert-heading">

                                                <i class="fas fa-exclamation-triangle"></i> Turbidity Warning

                                            </h6>

                                            <p class="mb-1">Turbidity sensor showing elevated readings at 2.5 NTU</p>

                                            <small class="text-muted">1 hour ago • Tank C</small>

                                        </div>

                                        <button class="btn btn-sm btn-light">Dismiss</button>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>



                <!-- Recent Notifications Section -->

                <div class="row">

                    <div class="col-12">

                        <h5 class="mb-3">

                            <i class="fas fa-bell"></i> Recent Notifications

                        </h5>

                        

                       <!-- Notification 1 -->
<div class="card mb-3 border-0 shadow-sm">
    <div class="card-body py-3">
        <div class="d-flex justify-content-between align-items-start">

            <div>
                <h6 class="card-title mb-1 text-dark">
                    <i class="fas fa-check-circle text-primary me-1"></i>
                    System Online
                </h6>

                <p class="card-text mb-1">
                    All sensors are online and reporting data correctly.
                </p>

                <small class="text-muted">30 minutes ago</small>
            </div>

            <span class="badge bg-light text-primary border">
                Read
            </span>

        </div>
    </div>
</div>


<!-- Notification 2 -->
<div class="card mb-3 border-0 shadow-sm">
    <div class="card-body py-3">
        <div class="d-flex justify-content-between align-items-start">

            <div>
                <h6 class="card-title mb-1 text-dark">
                    <i class="fas fa-clock text-primary me-1"></i>
                    Scheduled Maintenance Reminder
                </h6>

                <p class="card-text mb-1">
                    Sensor calibration scheduled for tomorrow at 10:00 AM
                </p>

                <small class="text-muted">2 hours ago</small>
            </div>

            <span class="badge bg-primary">
                Unread
            </span>

        </div>
    </div>
</div>


<!-- Notification 3 -->
<div class="card mb-3 border-0 shadow-sm">
    <div class="card-body py-3">
        <div class="d-flex justify-content-between align-items-start">

            <div>
                <h6 class="card-title mb-1 text-dark">
                    <i class="fas fa-info-circle text-primary me-1"></i>
                    Report Generated
                </h6>

                <p class="card-text mb-1">
                    Daily compliance report for Jan 16, 2026 is ready for download.
                </p>

                <small class="text-muted">4 hours ago</small>
            </div>

            <span class="badge bg-light text-primary border">
                Read
            </span>

        </div>
    </div>
</div>


<!-- Notification 4 -->
<div class="card mb-3 border-0 shadow-sm">
    <div class="card-body py-3">
        <div class="d-flex justify-content-between align-items-start">

            <div>
                <h6 class="card-title mb-1 text-dark">
                    <i class="fas fa-check-circle text-primary me-1"></i>
                    Compliance Check Passed
                </h6>

                <p class="card-text mb-1">
                    Daily compliance check completed successfully. All parameters within limits.
                </p>

                <small class="text-muted">8 hours ago</small>
            </div>

            <span class="badge bg-light text-primary border">
                Read
            </span>

        </div>
    </div>
</div>


<!-- Notification 5 -->
<div class="card mb-3 border-0 shadow-sm">
    <div class="card-body py-3">
        <div class="d-flex justify-content-between align-items-start">

            <div>
                <h6 class="card-title mb-1 text-dark">
                    <i class="fas fa-exclamation-circle text-primary me-1"></i>
                    Chemical Refill Required
                </h6>

                <p class="card-text mb-1">
                    Treatment chemical inventory is low. Estimated 3 days remaining.
                </p>

                <small class="text-muted">12 hours ago</small>
            </div>

            <span class="badge bg-light text-primary border">
                Read
            </span>

        </div>
    </div>
</div>

                    </div>

                </div>



                <!-- Settings Link -->

                <div class="text-center mt-5">

                    <p class="text-muted mb-3">Configure your notification preferences and alert thresholds</p>

                    <a href="{{ route('user.settings') }}" class="btn btn-primary">

                        <i class="fas fa-cog"></i> Go to Settings

                    </a>

                </div>

            </div>

        </div>

    </div>


@include('user.include.footer')
