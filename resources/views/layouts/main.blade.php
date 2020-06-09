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
    <link rel="stylesheet" href= "{{ asset('css/styles.css') }}">

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
                                    {{-- <img src="/images/mainlogo.png" alt="Main logo" width="34px;" height="34px;" style="padding-top: 0px;"> --}}
                                    </a></h1>
                            </div><!-- .site-branding -->
                        </div><!-- .col -->

                        <div class="col-4 col-lg-8 flex justify-content-end align-content-center">

                            <nav class="navbar navbar-expand-lg navbar-default fixed-top" id="mainNav" style="background-color: green;">
                                <div class="container">
                                    <a class="navbar-brand js-scroll-trigger" href="#page-top"> <img src="/images/mainlogo.png" alt="Main logo" width="48px;" height="48px;" style="margin-top: 3px; margin-left: 2px;">Migori e-Bursary</a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars ml-1"></i></button>
                                    <div class="collapse navbar-collapse" id="navbarResponsive">
                                        <ul class="navbar-nav text-uppercase ml-auto">
                                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Home</a></li>
                                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Register</a></li>

                {{--                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Login</a></li>--}}
                                            @guest
                                                <li class="nav-item">
                                                    <a class="nav-link js-scroll-trigger" href="{{ route('login') }}">{{ __('Login') }}</a>
                                                    {{-- <a class="nav-link btn btn-outline-dark text-light button px-4" href="{{ route('login') }}">{{ __('Login') }}</a> --}}
                                                </li>
                                            @else
                                                <li class="nav-item dropdown">
                                                    <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                        {{ Auth::user()->name }} <span class="caret"></span>
                                                    </a>
                
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                        <a href="/status" class="dropdown-item">Application Status</a>
                                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                           onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">
                                                            {{ __('Logout') }}
                                                        </a>
                
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    </div>
                                                </li>
                                            @endguest
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            
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