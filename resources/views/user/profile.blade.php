@include('user.include.header')

    <style>
        .profile-header {
            padding: 40px 0;
            color: #000;
            margin-bottom: 40px;
        }

        .profile-card {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .profile-avatar-large {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid white;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .profile-info-item {
            padding: 15px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .profile-info-item:last-child {
            border-bottom: none;
        }

        .profile-label {
            font-weight: 600;
            color: #000;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .profile-value {
            color: #333;
            font-size: 16px;
            margin-top: 5px;
        }

        .btn-edit {
            background: #667eea;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-edit:hover {
            background: #764ba2;
            color: white;
            text-decoration: none;
        }

        .form-section {
            margin-top: 30px;
        }

        .form-section h3 {
            color: #333;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .edit-mode {
            display: none;
        }

        .edit-mode.active {
            display: block;
        }

        .view-mode {
            display: block;
        }

        .view-mode.hidden {
            display: none;
        }
    </style>


            <!-- ========== PAGE CONTENT START ========== -->
            <div class="page-content">
                <!-- Profile Header -->
                <div class="profile-header">
                    <div class="container-fluid">
                        <div class="text-center">
                            <img src="assets/images/profile-icon.png" alt="Profile Avatar" class="profile-avatar-large">
                            <h1>John Doe</h1>
                            <p class="mb-0">john.doe@wateryze.com</p>
                        </div>
                    </div>
                </div>

                <!-- Profile Content -->
                <div class="container-fluid">
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-lg-8">
                            <!-- Personal Information -->
                            <div class="profile-card">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h3 class="mb-0">Personal Information</h3>
                                    <button class="btn-edit" onclick="toggleEditMode('personal')">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                </div>

                                <!-- View Mode -->
                                <div class="view-mode" id="personalView">
                                    <div class="profile-info-item">
                                        <div class="profile-label">Full Name</div>
                                        <div class="profile-value">John Doe</div>
                                    </div>
                                    <div class="profile-info-item">
                                        <div class="profile-label">Email Address</div>
                                        <div class="profile-value">john.doe@wateryze.com</div>
                                    </div>
                                    <div class="profile-info-item">
                                        <div class="profile-label">Phone Number</div>
                                        <div class="profile-value">+1 (555) 123-4567</div>
                                    </div>
                                    <div class="profile-info-item">
                                        <div class="profile-label">Company Name</div>
                                        <div class="profile-value">Acme Brewery Ltd.</div>
                                    </div>
                                    <div class="profile-info-item">
                                        <div class="profile-label">Industry</div>
                                        <div class="profile-value">Beverage Manufacturing</div>
                                    </div>
                                    <div class="profile-info-item">
                                        <div class="profile-label">Location</div>
                                        <div class="profile-value">Vancouver, British Columbia, Canada</div>
                                    </div>
                                    <div class="profile-info-item">
                                        <div class="profile-label">Member Since</div>
                                        <div class="profile-value">January 15, 2024</div>
                                    </div>
                                </div>

                                <!-- Edit Mode -->
                                <form class="edit-mode" id="personalEdit">
                                    <div class="mb-3">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" class="form-control" value="John Doe">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" class="form-control" value="john.doe@wateryze.com">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" value="+1 (555) 123-4567">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Company Name</label>
                                        <input type="text" class="form-control" value="Acme Brewery Ltd.">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Industry</label>
                                        <input type="text" class="form-control" value="Beverage Manufacturing">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Location</label>
                                        <input type="text" class="form-control" value="Vancouver, British Columbia, Canada">
                                    </div>
                                    <div class="d-flex gap-2">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> Save Changes
                                        </button>
                                        <button type="button" class="btn btn-secondary" onclick="toggleEditMode('personal')">
                                            <i class="fas fa-times"></i> Cancel
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <!-- Security Settings -->
                            <div class="profile-card">
                                <h3 class="mb-4">Security Settings</h3>
                                <div class="profile-info-item">
                                    <div class="profile-label">Password Status</div>
                                    <div class="profile-value">
                                        Last changed 60 days ago
                                        <a href="{{ route('user.settings') }}" class="btn-edit ms-3" style="padding: 5px 15px; font-size: 12px;">
                                            Change Password
                                        </a>
                                    </div>
                                </div>
                                <div class="profile-info-item" style="margin-top: 20px;">
                                    <div class="profile-label">Two-Factor Authentication</div>
                                    <div class="profile-value">
                                        <span style="background: #ffc107; color: white; padding: 3px 8px; border-radius: 3px; font-size: 12px;">Disabled</span>
                                        <a href="{{ route('user.settings') }}" class="btn-edit ms-3" style="padding: 5px 15px; font-size: 12px;">
                                            Enable 2FA
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-lg-4">
                            <!-- Account Status -->
                            <div class="profile-card">
                                <h3 class="mb-4">Account Status</h3>
                                <div class="alert alert-info mb-3">
                                    <i class="fas fa-check-circle"></i> Account Active
                                </div>
                                <div class="profile-info-item">
                                    <div class="profile-label">Subscription Plan</div>
                                    <div class="profile-value">Professional</div>
                                </div>
                                <div class="profile-info-item">
                                    <div class="profile-label">Renewal Date</div>
                                    <div class="profile-value">April 15, 2025</div>
                                </div>
                                <div class="profile-info-item">
                                    <div class="profile-label">Billing Status</div>
                                    <div class="profile-value">
                                        <span style="background: #28a745; color: white; padding: 3px 8px; border-radius: 3px; font-size: 12px;">Paid</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Quick Links -->
                            <div class="profile-card">
                                <h3 class="mb-3">Quick Links</h3>
                                <div style="display: flex; flex-direction: column; gap: 10px;">
                                    <a href="{{ route('user.settings') }}" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-cog"></i> Account Settings
                                    </a>
                                    <a href="{{ route('user.notifications') }}" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-bell"></i> Notifications
                                    </a>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                            <i class="fas fa-sign-out-alt"></i> Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ========== PAGE CONTENT END ========== -->
        </div>
        <!-- ========== MAIN CONTENT END ========== -->
    </div>

 @include('user.include.footer')

    <script>
        // Toggle Edit Mode
        function toggleEditMode(section) {
            const viewElement = document.getElementById(section + 'View');
            const editElement = document.getElementById(section + 'Edit');

            viewElement.classList.toggle('hidden');
            editElement.classList.toggle('active');
        }

        // Profile Button Dropdown
        const profileBtn = document.getElementById('profileBtn');
        const profileDropdown = document.getElementById('profileDropdown');

        if (profileBtn && profileDropdown) {
            profileBtn.addEventListener('click', function () {
                profileDropdown.style.display = profileDropdown.style.display === 'block' ? 'none' : 'block';
            });

            document.addEventListener('click', function (event) {
                if (!profileBtn.contains(event.target) && !profileDropdown.contains(event.target)) {
                    profileDropdown.style.display = 'none';
                }
            });
        }
    </script>
