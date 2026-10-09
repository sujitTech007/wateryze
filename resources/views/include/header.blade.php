<!DOCTYPE html>

<html lang="en">



<meta http-equiv="content-type" content="text/html;charset=utf-8" />



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">



    <title>Wateryze</title>



    <!-- Fav Icon -->

    <link rel="icon" href="{{ asset('front/images/favicon.png') }}" type="image/x-icon">



    <!-- Google Fonts -->

    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;display=swap"

        rel="stylesheet">



    <!-- Stylesheets -->

    <link href="{{ asset('public/front/css/all.min.css?v=1.0') }}" rel="stylesheet">

    <link href="{{ asset('public/front/css/flaticon.css?v=1.0') }}" rel="stylesheet">

    <link href="{{ asset('public/front/css/owl.css?v=1.0') }}" rel="stylesheet">

    <link href="{{ asset('public/front/css/bootstrap.css?v=1.0') }}" rel="stylesheet">

    <link href="{{ asset('public/front/css/jquery.fancybox.min.css?v=1.0') }}" rel="stylesheet">

    <link href="{{ asset('public/front/css/animate.css?v=1.0') }}" rel="stylesheet">

    <link href="{{ asset('public/front/css/imagebg.css?v=1.0') }}" rel="stylesheet">

    <link href="{{ asset('public/front/css/color.css?v=1.0') }}" rel="stylesheet">

<link href="{{ asset('public/front/css/style.css?v=1.2') }}" rel="stylesheet">

    <link href="{{ asset('public/front/css/responsive.css?v=1.0') }}" rel="stylesheet">

    @if (request()->routeIs('signup'))
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.15.1/build/css/intlTelInput.css">
        <style>
            .iti {
                width: 100%;
            }
        </style>
    @endif



</head>





<!-- page wrapper -->



<body class="boxed_wrapper">







    <!-- MAIN HEADER -->

    <header class="main-header">

        <div class="container">

            <div class="header-inner d-flex align-items-center justify-content-between">



                <!-- Logo -->

                <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                    <img src="{{ asset('public/front/images/logo.png') }}" alt="Wateryze Logo">

                </a>



                <!-- Navigation -->

                <ul class="nav main-menu">

                    <li><a href="{{ route('home') }}" @class(['active' => request()->routeIs('home')])>Home</a></li>
                    <li><a href="{{ route('about') }}" @class(['active' => request()->routeIs('about')])>About</a></li>
                    <li><a href="{{ route('service') }}" @class(['active' => request()->routeIs('service')])>Service</a></li>
                    <li><a href="{{ route('industry') }}" @class(['active' => request()->routeIs('industry')])>Industries</a></li>

                    <!-- <li><a href="blog_grid.html">Blog</a></li> -->

                    <li><a href="{{ route('subscription') }}" @class(['active' => request()->routeIs('subscription')])>Subscription</a></li>
                    <li><a href="{{ route('contact') }}" @class(['active' => request()->routeIs('contact')])>Contact</a></li>

                </ul>



                <!-- Buttons -->

                <div class="header-buttons">

                    @auth
                        <span class="me-2">{{ auth()->user()->first_name }}</span>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-login">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-login">Login</a>
                        <a href="{{ route('signup') }}" class="btn btn-signup">Sign Up</a>
                    @endauth

                </div>



                <!-- Mobile Menu Toggle -->

                <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>



            </div>

        </div>

    </header>

    @if (session('status'))
        <div class="container mt-3">
            <div class="alert alert-success mb-0" role="status">{{ session('status') }}</div>
        </div>
    @endif