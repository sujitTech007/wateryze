@include('admin.include.header')



            <!-- ========== SETTINGS CONTENT START ========== -->

            <div class="content-area">

                <div class="row">

                    <!-- Settings Navigation -->

                    <!-- <div class="col-lg-3 mb-4">

                        <nav class="settings-nav">

                            <a href="#" class="nav-link active" data-target="general">

                                <i class="fas fa-sliders-h me-2"></i> General Settings

                            </a>

                            <a href="#" class="nav-link" data-target="security">

                                <i class="fas fa-shield-alt me-2"></i> Security

                            </a>

                            <a href="#" class="nav-link" data-target="notifications">

                                <i class="fas fa-bell me-2"></i> Notifications

                            </a>

                            <a href="#" class="nav-link" data-target="integrations">

                                <i class="fas fa-plug me-2"></i> Integrations

                            </a>

                            <a href="#" class="nav-link" data-target="billing">

                                <i class="fas fa-credit-card me-2"></i> Billing

                            </a>

                            <a href="#" class="nav-link" data-target="system">

                                <i class="fas fa-cogs me-2"></i> System

                            </a> -->

                        <!-- </nav>

                    </div> -->



                    <!-- Settings Content -->

                  <div class="col-lg-12">

    <div class="settings-content">



        <div class="row">



            <!-- General Settings -->

            <div class="col-md-6 mb-4">

                <div class="card h-100">

                    <div class="card-body">



                        <h4 class="mb-4">General Settings</h4>



                        <div class="mb-4">

                            <h6>Platform Information</h6>



                            <div class="mb-3">

                                <label class="form-label">Platform Name</label>

                                <input type="text" class="form-control" value="Wateryze" readonly>

                            </div>



                            <div class="mb-3">

                                <label class="form-label">Version</label>

                                <input type="text" class="form-control" value="v2.1.0" readonly>

                            </div>



                            <div class="mb-3">

                                <label class="form-label">Support Email</label>

                                <input type="email" class="form-control" value="support@wateryze.com">

                            </div>



                            <div class="mb-3">

                                <label class="form-label">Contact Phone</label>

                                <input type="tel" class="form-control" value="+1 (555) 123-4567">

                            </div>

                        </div>



                        <div class="mb-4">

                            <h6>Regional Settings</h6>



                            <div class="mb-3">

                                <label class="form-label">Timezone</label>

                                <select class="form-select">

                                    <option>UTC</option>

                                    <option selected>GMT-5 (Eastern Time)</option>

                                    <option>GMT-6 (Central Time)</option>

                                </select>

                            </div>



                            <div class="mb-3">

                                <label class="form-label">Language</label>

                                <select class="form-select">

                                    <option selected>English</option>

                                    <option>Spanish</option>

                                    <option>French</option>

                                </select>

                            </div>

                        </div>



                        <div class="mb-4">

                            <h6>Preferences</h6>



                            <div class="mb-3">

                                <div class="toggle-switch">

                                    <input type="checkbox" id="emailNotif" checked>

                                    <label for="emailNotif" class="mb-0"style="font-size:13px">

                                        Send email notifications

                                    </label>

                                </div>

                            </div>



                            <div class="mb-3">

                                <div class="toggle-switch">

                                    <input type="checkbox" id="smsNotif">

                                    <label for="smsNotif" class="mb-0"style="font-size:13px">

                                        Send SMS alerts

                                    </label>

                                </div>

                            </div>

                        </div>



                        <button class="btn btn-primary" style="font-size: 13px;">

                            <i class="fas fa-save me-2"></i> Save Changes

                        </button>



                        <button class="btn btn-outline-secondary ms-2" style="font-size: 13px;">

                            Reset

                        </button>



                    </div>

                </div>

            </div>





            <!-- Security Settings -->

            <div class="col-md-6 mb-4">

                <div class="card h-100">

                    <div class="card-body">



                        <h4 class="mb-4">Security Settings</h4>



                        <div class="mb-4">

                            <h6>Password</h6>



                            <div class="mb-3">

                                <label class="form-label">Current Password</label>

                                <input type="password" class="form-control">

                            </div>



                            <div class="mb-3">

                                <label class="form-label">New Password</label>

                                <input type="password" class="form-control">

                            </div>



                            <div class="mb-3">

                                <label class="form-label">Confirm Password</label>

                                <input type="password" class="form-control">

                            </div>

                        </div>



                        <div class="mb-4">

                            <h6>Two-Factor Authentication</h6>



                            <div class="mb-3">

                                <div class="toggle-switch">

                                    <input type="checkbox" id="twoFactor">

                                    <label for="twoFactor" class="mb-0"style="font-size:13px">

                                        Enable 2FA

                                    </label>

                                </div>

                            </div>



                            <small class="text-muted">

                                Enhance your account security with two-factor authentication

                            </small>

                        </div>



                        <div class="mb-4">

                            <h6>Active Sessions</h6>



                            <div class="alert alert-info mb-3">

                                <i class="fas fa-info-circle me-2"></i>

                                You have 2 active sessions

                            </div>



                            <button class="btn btn-danger" style="font-size: 13px;">

                                Logout All Sessions

                            </button>

                        </div>



                        <button class="btn btn-primary" style="font-size: 13px;">

                            <i class="fas fa-save me-2"></i> Update Security

                        </button>



                    </div>

                </div>

            </div>



        </div>



    </div>

</div>

                </div>

            </div>

            <!-- ========== SETTINGS CONTENT END ========== -->

        </div>

        <!-- ========== MAIN CONTENT END ========== -->

    </div>

@include('admin.include.footer')

