<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Wateryze - Admin Dashboard</title>



    <!-- Bootstrap 5 CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">



    <!-- Font Awesome Icons -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="icon" href="{{ asset('backend/images/favicon.png') }}" type="image/x-icon">



    <!-- Google Fonts - Poppins -->

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"

        rel="stylesheet">



    <!-- Chart.js -->

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



    <!-- Custom CSS -->

    <link rel="stylesheet" href="{{ asset('public/user/css/style.css') }}">

</head>



<body>

    <div class="wrapper">

        <!-- ========== SIDEBAR START ========== -->

        <nav class="sidebar">

            <!-- Logo Section -->

            <div class="sidebar-header">

                <div class="logo-wrapper">

                    <a href="{{ route('admin.index') }}" class="logo-link">
                        <img src="{{ asset('backend/images/logo.png') }}" alt="Wateryze Logo" class="logo-img">

                    </a>

                </div>

                <button class="sidebar-toggle d-lg-none" id="sidebarToggle">

                    <i class="fas fa-times"></i>

                </button>

            </div>



            <!-- Navigation Menu -->

            <ul class="nav-menu">

                <li class="nav-item">

                    <a href="{{ route('admin.index') }}" class="nav-link {{ request()->routeIs('admin.index', 'admin.dashboard') ? 'active' : '' }}">

                        <i class="fas fa-chart-line"></i>

                        <span>Dashboard</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">

                        <i class="fas fa-users"></i>

                        <span>Users</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="{{ route('admin.water-usage') }}" class="nav-link {{ request()->routeIs('admin.water-usage') ? 'active' : '' }}">

                        <i class="fas fa-water"></i>

                        <span>Water Usage</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="{{ route('admin.chemical-usage') }}" class="nav-link {{ request()->routeIs('admin.chemical-usage') ? 'active' : '' }}">

                        <i class="fas fa-flask"></i>

                        <span>Chemical Kits</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="{{ route('admin.compliance') }}" class="nav-link {{ request()->routeIs('admin.compliance') ? 'active' : '' }}">

                        <i class="fas fa-clipboard-check"></i>

                        <span>Compliance</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="{{ route('admin.kit-delivery') }}" class="nav-link {{ request()->routeIs('admin.kit-delivery*') ? 'active' : '' }}">

                        <i class="fas fa-box-open"></i>

                        <span>Kit delivery</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="{{ route('admin.subscriptions') }}" class="nav-link {{ request()->routeIs('admin.subscriptions*') ? 'active' : '' }}">

                        <i class="fas fa-credit-card"></i>

                        <span>Subscriptions</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="{{ route('admin.subscription-plans') }}" class="nav-link {{ request()->routeIs('admin.subscription-plans*') ? 'active' : '' }}">

                        <i class="fas fa-credit-card"></i>

                        <span>Subscriptions Plan</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="{{ route('admin.billing') }}" class="nav-link {{ request()->routeIs('admin.billing*') ? 'active' : '' }}">

                        <i class="fas fa-file-invoice-dollar"></i>

                        <span>Billing</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="{{ route('admin.reports') }}" class="nav-link {{ request()->routeIs('admin.reports') ? 'active' : '' }}">

                        <i class="fa-regular fa-file-lines"></i>

                        <span>Reports</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="{{ route('admin.partner-labs') }}" class="nav-link {{ request()->routeIs('admin.partner-labs*') ? 'active' : '' }}">

                        <i class="fas fa-flask"></i>

                        <span>Partner labs</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="{{ route('admin.technicians') }}" class="nav-link {{ request()->routeIs('admin.technicians*') ? 'active' : '' }}">

                        <i class="fas fa-user-cog"></i>

                        <span>Technician</span>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="{{ route('admin.settings') }}" class="nav-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">

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

                <!-- <div class="navbar-left">

                    <button class="menu-toggle d-lg-none" id="menuToggle">

                        <i class="fas fa-bars"></i>

                    </button>

                    <h2 class="page-title" id="pageTitle">Billing</h2>

                </div> -->



                <div class="navbar-right">





                    <!-- Admin Profile Dropdown -->

                    <div class="nav-item profile-wrapper">

                        <button class="nav-link profile-btn" id="profileBtn">

                            <img src="{{ asset('backend/images/profile-icon.png') }}" alt="Admin" class="profile-avatar">
                            <span class="profile-name d-none d-sm-inline">{{ auth('admin')->user()->name }}</span>

                            <i class="fas fa-chevron-down"></i>

                        </button>

                        <!-- Profile Dropdown Menu -->

                        <div class="profile-dropdown" id="profileDropdown">

                            <a href="{{ route('admin.profile') }}" class="dropdown-item">

                                <i class="fas fa-user"></i> My Profile

                            </a>

                            <a href="{{ route('admin.settings') }}" class="dropdown-item">

                                <i class="fas fa-lock"></i> Change Password

                            </a>

                            <hr class="dropdown-divider">

                            <form method="POST" action="{{ route('admin.logout') }}">
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