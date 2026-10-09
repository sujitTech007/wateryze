<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wateryze</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="../images/favicon.png" type="image/x-icon">

    <!-- Google Fonts - Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('public/user/css/style.css?v=1.2') }}">
</head>

<body>
    <div class="wrapper">
        <!-- ========== SIDEBAR START ========== -->
        <nav class="sidebar">
            <!-- Logo Section -->
            <div class="sidebar-header">
                <div class="logo-wrapper">
                    <a href="{{ route('user.dashboard') }}" class="logo-link">
                        <img src="{{ asset('public/user/images/logo.png') }}" alt="Wateryze Logo" class="logo-img">
                    </a>
                </div>
                <button class="sidebar-toggle d-lg-none" id="sidebarToggle">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Navigation Menu -->
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="{{ route('user.dashboard') }}" @class(['nav-link' => true, 'active' => request()->routeIs('user.dashboard')])>
                        <i class="fas fa-chart-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                  <li class="nav-item">
                    <a href="{{ route('user.water-monitoring') }}" @class(['nav-link' => true, 'active' => request()->routeIs('user.water-monitoring')])>
                        <i class="fas fa-tint"></i>
                        <span>Water Monitoring</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.chemical-kits.index') }}" @class(['nav-link' => true, 'active' => request()->routeIs('user.chemical-kits.*')])>
                      <i class="fas fa-flask"></i>
                        <span>Chemical Kit Usage</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.compliance') }}" @class(['nav-link' => true, 'active' => request()->routeIs('user.compliance', 'user.audit-report')])>
                        <i class="fas fa-shield-alt"></i>
                        <span>Compliance
</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.schedule') }}" @class(['nav-link' => true, 'active' => request()->routeIs('user.schedule')])>
                        <i class="fas fa-clock"></i>
                        <span>Schedule Reminder</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.reports.index') }}" @class(['nav-link' => true, 'active' => request()->routeIs('user.reports.*')])>
                        <i class="fa-regular fa-file-lines"></i>
                        <span>Reports</span>
                    </a>
                </li>
              <li class="nav-item">
                    <a href="{{ route('user.site-locations') }}" @class(['nav-link' => true, 'active' => request()->routeIs('user.site-locations')])>
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Sites & Locations</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.notifications') }}" @class(['nav-link' => true, 'active' => request()->routeIs('user.notifications')])>
                        <i class="fas fa-bell"></i>
                        <span>Notifications</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.settings') }}" @class(['nav-link' => true, 'active' => request()->routeIs('user.settings')])>
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- ========== SIDEBAR END ========== -->

        <!-- ========== MAIN CONTENT START ========== -->
        <div class="main-content">
            <!-- ========== TOP NAVBAR START ========== -->
            <nav class="navbar justify-content-end">
               

                <div class="navbar-right">
                    <!-- Admin Profile Dropdown -->
                    <div class="nav-item profile-wrapper">
                        <button class="nav-link profile-btn" id="profileBtn">
                            <img src="{{ asset('public/front/images/profile-icon.png') }}" alt="" class="profile-avatar">
                            <span class="profile-name d-none d-sm-inline">{{ auth()->user()->first_name }}</span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <!-- Profile Dropdown Menu -->
                        <div class="profile-dropdown" id="profileDropdown">
                            <a href="{{ route('user.profile') }}" class="dropdown-item">
                                <i class="fas fa-user"></i> My Profile
                            </a>
                            <a href="{{ route('user.settings') }}" class="dropdown-item">
                                <i class="fas fa-lock"></i> Change Password
                            </a>
                            <hr class="dropdown-divider">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger border-0 bg-transparent w-100 text-start">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- ========== TOP NAVBAR END ========== -->