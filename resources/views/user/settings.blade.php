@include('user.include.header')

            <!-- ========== DASHBOARD CONTENT START ========== -->
            <div class="content-area">
                <div class="mb-4">
                    <button class="menu-toggle d-lg-none" id="menuToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h2 class="page-title" id="pageTitle">Settings & Configuration</h2>
                </div>
                <!-- Profile Settings -->
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="chart-card">
                            <h5 class="mb-4 fw-medium">
                                <i class="fas fa-user-circle"></i> Profile Settings
                            </h5>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" value="William">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" value="Johnson">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" class="form-control" value="William@wyz.com">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Organization</label>
                                    <input type="text" class="form-control" value="Water Treatment Plant #1">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" value="+1 (555) 123-4567">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Role</label>
                                    <select class="form-select">
                                        <option selected>System Administrator</option>
                                        <option>Operator</option>
                                        <option>Technician</option>
                                        <option>Manager</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <button class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save Changes
                                </button>
                                <button class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Plant Configuration -->
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="chart-card">
                            <h5 class="mb-4 fw-medium">
                                <i class="fas fa-industry"></i> Plant Configuration
                            </h5>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Plant Name</label>
                                    <input type="text" class="form-control" value="Riverside Water Treatment">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Plant Location</label>
                                    <input type="text" class="form-control" value="123 Main Street, City, State">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Plant Capacity</label>
                                    <input type="text" class="form-control" value="1000 m³/day">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Treatment Type</label>
                                    <select class="form-select">
                                        <option selected>Biological Treatment</option>
                                        <option>Chemical Treatment</option>
                                        <option>Physical Treatment</option>
                                        <option>Hybrid</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Latitude</label>
                                    <input type="text" class="form-control" value="40.7128">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Longitude</label>
                                    <input type="text" class="form-control" value="-74.0060">
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <button class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save Changes
                                </button>
                                <button class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Alert Thresholds -->
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="chart-card">
                            <h5 class="mb-4">
                                <i class="fas fa-bell"></i> Alert Thresholds
                            </h5>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="bg-light p-3 rounded">
                                        <h6 class="mb-3">pH Level</h6>
                                        <div class="mb-2">
                                            <label class="form-label">Minimum</label>
                                            <input type="number" class="form-control" value="6.5" step="0.1">
                                        </div>
                                        <div>
                                            <label class="form-label">Maximum</label>
                                            <input type="number" class="form-control" value="7.5" step="0.1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="bg-light p-3 rounded">
                                        <h6 class="mb-3">TDS (ppm)</h6>
                                        <div class="mb-2">
                                            <label class="form-label">Warning Level</label>
                                            <input type="number" class="form-control" value="400">
                                        </div>
                                        <div>
                                            <label class="form-label">Critical Level</label>
                                            <input type="number" class="form-control" value="500">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="bg-light p-3 rounded">
                                        <h6 class="mb-3">BOD (mg/L)</h6>
                                        <div class="mb-2">
                                            <label class="form-label">Warning Level</label>
                                            <input type="number" class="form-control" value="10">
                                        </div>
                                        <div>
                                            <label class="form-label">Critical Level</label>
                                            <input type="number" class="form-control" value="15">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="bg-light p-3 rounded">
                                        <h6 class="mb-3">Temperature (°C)</h6>
                                        <div class="mb-2">
                                            <label class="form-label">Minimum</label>
                                            <input type="number" class="form-control" value="15">
                                        </div>
                                        <div>
                                            <label class="form-label">Maximum</label>
                                            <input type="number" class="form-control" value="35">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="bg-light p-3 rounded">
                                        <h6 class="mb-3">Turbidity (NTU)</h6>
                                        <div class="mb-2">
                                            <label class="form-label">Warning Level</label>
                                            <input type="number" class="form-control" value="2" step="0.1">
                                        </div>
                                        <div>
                                            <label class="form-label">Critical Level</label>
                                            <input type="number" class="form-control" value="5" step="0.1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="bg-light p-3 rounded">
                                        <h6 class="mb-3">Dissolved O₂ (mg/L)</h6>
                                        <div class="mb-2">
                                            <label class="form-label">Minimum</label>
                                            <input type="number" class="form-control" value="4" step="0.1">
                                        </div>
                                        <div>
                                            <label class="form-label">Optimal</label>
                                            <input type="number" class="form-control" value="8" step="0.1">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <button class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save Thresholds
                                </button>
                                <button class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Notification Preferences -->
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="chart-card">
                            <h5 class="mb-4 fw-medium">
                                <i class="fas fa-envelope"></i> Notification Preferences
                            </h5>
                            
                            <div class="list-group">
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1">Email Alerts</h6>
                                        <small class="text-muted">Receive critical alerts via email</small>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" checked id="emailAlerts">
                                    </div>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1">SMS Notifications</h6>
                                        <small class="text-muted">Get immediate SMS for critical issues</small>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="smsNotif">
                                    </div>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1">Daily Report</h6>
                                        <small class="text-muted">Receive daily summary at 8:00 AM</small>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" checked id="dailyReport">
                                    </div>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1">System Maintenance Alerts</h6>
                                        <small class="text-muted">Notifications for scheduled maintenance</small>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" checked id="maintAlert">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- System Settings -->
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="chart-card">
                            <h5 class="mb-4 fw-medium">
                                <i class="fas fa-sliders-h"></i> System Settings
                            </h5>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Language</label>
                                    <select class="form-select">
                                        <option selected>English</option>
                                        <option>Spanish</option>
                                        <option>French</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Time Zone</label>
                                    <select class="form-select">
                                        <option selected>UTC-5 (EST)</option>
                                        <option>UTC (GMT)</option>
                                        <option>UTC+1 (CET)</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Data Retention</label>
                                    <select class="form-select">
                                        <option>30 days</option>
                                        <option>90 days</option>
                                        <option selected>1 year</option>
                                        <option>Unlimited</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Measurement Units</label>
                                    <select class="form-select">
                                        <option selected>Metric (°C, mg/L)</option>
                                        <option>Imperial (°F, ppm)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <button class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save Settings
                                </button>
                                <button class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Account & Security -->
                <div class="row">
                    <div class="col-12">
                        <div class="chart-card">
                            <h5 class="mb-4 fw-medium">
                                <i class="fas fa-lock"></i> Account & Security
                            </h5>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="bg-light p-4 rounded">
                                        <h6 class="mb-3">Change Password</h6>
                                        <div class="mb-3">
                                            <label class="form-label">Current Password</label>
                                            <input type="password" class="form-control" placeholder="Enter current password">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">New Password</label>
                                            <input type="password" class="form-control" placeholder="Enter new password">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" placeholder="Confirm new password">
                                        </div>
                                        <button class="btn btn-primary">
                                            <i class="fas fa-save"></i> Update Password
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="bg-light p-4 rounded">
                                        <h6 class="mb-2">Two-Factor Authentication</h6>
                                        <p class="text-muted small mb-3">Add extra security to your account</p>
                                        <button class="btn btn-primary">
                                            <i class="fas fa-shield-alt"></i> Enable 2FA
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   @include('user.include.footer')