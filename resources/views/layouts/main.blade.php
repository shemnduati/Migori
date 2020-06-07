<!DOCTYPE html>
<html lang="en">
<head>
    <title>BASAP</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <!-- ElegantFonts CSS -->
    <link rel="stylesheet" href="{{ asset('css/elegant-fonts.css') }}">

    <!-- themify-icons CSS -->
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}">

    <!-- Styles -->
    <link rel="stylesheet" href= "{{ asset('css/style.css') }}">

    <style>

        /* Make the image fully responsive */
        .carousel-inner img {
          width: 100%;
          height: 100%;
        }
        </style>
      
</head>


<body>

    <div class="hero-content">

        <header class="site-header">
           
            <div class="nav-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-8 col-lg-4">
                            <div class="site-branding">
                                <h1 class="site-title"><a href="#" rel="home" style="color: gold">
                                    <img src="/images/mainlogo.png" alt="Main logo" width="34px;" height="34px;" style="padding-top: 0px;">
                                    Migori e-Bursary</a></h1>
                            </div><!-- .site-branding -->
                        </div><!-- .col -->

                        <div class="col-4 col-lg-8 flex justify-content-end align-content-center">
                            <nav class="site-navigation flex justify-content-end align-items-center">
                                <ul class="flex flex-column flex-lg-row justify-content-lg-end align-content-center">
                                    <li class="current-menu-item"><a href="index.html">Home</a></li>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Contact</a></li>
                                    <li><a href="#">Register</a></li>
                                    <li><a href="#">Login</a></li>
                                </ul>

                                <div class="hamburger-menu d-lg-none">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div><!-- .hamburger-menu -->

                                <div class="header-bar-cart">
                                    <a href="#" class="flex justify-content-center align-items-center"><span aria-hidden="false" class=""></span></a>
                                </div><!-- .header-bar-search -->
                            </nav><!-- .site-navigation -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .container -->
            </div><!-- .nav-bar -->
        </header><!-- .site-header -->


{{-- CAROUSEL SECTION --}}

    </div><!-- .hero-content -->

{{-- yield the econtent section --}}
@yield('content')

{{-- Footer section --}}
@include('layouts.footer')