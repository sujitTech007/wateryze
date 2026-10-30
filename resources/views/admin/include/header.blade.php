<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Wateryze - Admin Dashboard</title>


    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">



    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="{{ asset('public/front/css/bootstrap.min.css') }}">
     <link rel="stylesheet" href="{{ asset('public/front//css/all.min.css') }}">

    <link rel="icon" href="{{ asset('public/front/images/favicon.png') }}" type="image/x-icon">

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
                        <img src="{{ asset('public/backend/images/logo.png') }}" alt="Wateryze Logo" class="logo-img">

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

                {{-- <li class="nav-item">

                    <a href="{{ route('admin.compliance') }}" class="nav-link {{ request()->routeIs('admin.compliance') ? 'active' : '' }}">

                        <i class="fas fa-clipboard-check"></i>

                        <span>Compliance</span>

                    </a>

                </li> --}}

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

                {{-- <li class="nav-item">

                    <a href="{{ route('admin.billing') }}" class="nav-link {{ request()->routeIs('admin.billing*') ? 'active' : '' }}">

                        <i class="fas fa-file-invoice-dollar"></i>

                        <span>Billing</span>

                    </a>

                </li> --}}

                <li class="nav-item">

                    <a href="{{ route('admin.reports') }}" class="nav-link {{ request()->routeIs('admin.reports') ? 'active' : '' }}">

                        <i class="fa-regular fa-file-lines"></i>

                        <span>Reports</span>

                    </a>

                </li>

               {{-- <li class="nav-item">

                    <a href="{{ route('admin.partner-labs') }}" class="nav-link {{ request()->routeIs('admin.partner-labs*') ? 'active' : '' }}">

                        <i class="fas fa-flask"></i>

                        <span>Partner labs</span>

                    </a>

                </li> --}}

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

   
<div class="nav-item dropdown profile-wrapper m-0">

    <button type="button"
            class="nav-link profile-btn bg-transparent p-0"
            id="profileBtn"
            data-bs-toggle="dropdown"
            aria-expanded="false">

        <img src="{{ asset('public/backend/images/profile-icon.png') }}"
             alt="Admin"
             class="profile-avatar">

        <span class="profile-name d-none d-sm-inline">
            {{ auth('admin')->user()->name }}
        </span>

        <i class="fas fa-chevron-down ms-1"></i>
    </button>

    <ul class="dropdown-menu dropdown-menu-end"
        id="profileDropdown"
        aria-labelledby="profileBtn">

        <li>
            <a href="{{ route('admin.profile') }}" class="dropdown-item gap-0">
                <i class="fas fa-user me-2"></i> My Profile
            </a>
        </li>

        <li>
            <a href="{{ route('admin.settings') }}" class="dropdown-item gap-0">
                <i class="fas fa-lock me-2"></i> Change Password
            </a>
        </li>

        <li><hr class="dropdown-divider"></li>

        <li>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="dropdown-item gap-0 text-danger">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                </button>
            </form>
        </li>
    </ul>
</div>



                </div>

            </nav>

            <!-- ========== TOP NAVBAR END ========== -->