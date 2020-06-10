<!DOCTYPE html>
<html lang="en">
<head>
    <title>MCG Migori County Government</title>

    <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.jpeg"/>

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
    {{--<link rel="stylesheet" href= "{{ asset('css/styles.css') }}">--}}

    <!-- Styles -->
    <link rel="stylesheet" href= "{{ asset('css/style.css') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/momentjs/2.13.0/moment.min.js"></script>
    <!-- Styles -->
    <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.jpeg"/>

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

    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">

    <style>

        /* Make the image fully responsive */
        .carousel-inner img {
          width: 100%;
          height: 100%;
        }
        .txtWhite{
            color: white !important;
            font-size: 18px !important;
            padding-right: 30px !important;
        }
        .middle{
            vertical-align: middle;
        }
        </style>

</head>


<body>

    <div class="hero-content" style="margin-bottom: 10%;">

        <header class="site-header">

            <div class="nav-bar">
                <div class="container">
                    <nav class="navbar navbar-expand-lg navbar-light" style="margin: 0px; padding: 0px">
                                <a class="navbar-brand site-title" href="#" rel="home" style="color: gold">
                                    <img class="middle" src="/images/mainlogo.png" alt="Main logo" width="50px;" height="50px;" style="padding-top: 0px;">
                                    <span class="middle">Migori e-Bursary</span>
                                </a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav ml-auto" >
                                        <li  class="nav-item active">
                                            <a class="txtWhite nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="txtWhite nav-link" href="#">About</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="txtWhite nav-link" href="/contact">Contact</a>
                                        </li>
                                        @guest
                                            <li class="nav-item">
                                                <a class="txtWhite nav-link btn btn-outline-dark text-light button px-4" href="{{ route('login') }}">{{ __('Login') }}</a>
                                            </li>
                                        @else
                                            <li class="nav-item dropdown">
                                                <a id="navbarDropdown" class="txtWhite nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                            </nav>
                </div><!-- .container -->
            </div><!-- .nav-bar -->
        </header><!-- .site-header -->


{{-- CAROUSEL SECTION --}}

    </div><!-- .hero-content -->

{{-- yield the econtent section --}}
    <body class="grad">
    <div id="app">

        <main class="py-5">
            @yield('content')
            <router-view></router-view>
        </main>
    </div>
</body>
@auth
    <script>
        window.user = @json(auth()->user())
    </script>
@endauth

{{-- Footer section --}}
@include('layouts.footer')
