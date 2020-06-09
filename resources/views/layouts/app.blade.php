<!DOCTYPE html>
<html lang="en">
<head>
    <title>MCG Migori County Government</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/momentjs/2.13.0/moment.min.js"></script>

    <style>

        /* Make the image fully responsive */
        .carousel-inner img {
            width: 100%;
            height: 100%;
        }
    </style>

</head>
<body>
<div id="app">
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
                                    <li class="current-menu-item"><a href="/">Home</a></li>
                                    <li><a href="#">About</a></li>
                                    <li><a href="/contact">Contact</a></li>
                                    @guest
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-outline-dark text-light button px-4" href="{{ route('login') }}">{{ __('Login') }}</a>
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


        <main class="py-4" style="margin-top: 10%;">
            @yield('content')
            <router-view></router-view>
        </main>

        <footer class="site-footer">
            <div class="footer-widgets">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="foot-about">
                                <a class="foot-logo" href="#"><img src="/images/mainlogo.png" alt="" width="80%;"
                                                                   height="80%;"></a>
                            </div><!-- .foot-about -->
                        </div><!-- .col -->

                        <div class="col-12 col-md-6 col-lg-3 mt-5 mt-md-0">
                            <div class="foot-contact">
                                <h2>Contact Us</h2>

                                <ul>
                                    <li><a href="/faqs">F.A.Q</a></li>
                                    <li><a href="">ABOUT US</a></li>
                                    <li><a href='/contact'>CONTACT US</a></li>
                                </ul>
                            </div><!-- .foot-contact -->
                        </div><!-- .col -->

                        <div class="col-12 col-md-6 col-lg-3 mt-5 mt-lg-0">
                            <div class="quick-links flex flex-wrap">
                                <h2 class="w-100">Quick Links</h2>

                                <ul class="w-50">
                                    <li><a href="{{ route('privacy') }}">TERMS OF USE </a></li>
                                    <li><a href="{{ route('privacy') }}">PRIVACY POLICY </a></li>
                                </ul>

                                {{--<ul class="w-50">
                                    <li><a href="#">Documentation</a></li>
                                    <li><a href="#">Forums</a></li>
                                    --}}{{-- <li><a href="#">Language Packs</a></li> --}}{{--
                                    <li><a href="#">Release Status</a></li>
                                </ul>--}}
                            </div><!-- .quick-links -->
                        </div><!-- .col -->

                        <div class="col-12 col-md-6 col-lg-3 mt-5 mt-lg-0">
                            <div class="follow-us">
                                <h2>Follow Us</h2>

                                <ul class="follow-us flex flex-wrap align-items-center">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                </ul>
                            </div><!-- .quick-links -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .container -->
            </div><!-- .footer-widgets -->


            <div class="footer-bar">
                <div class="container">
                   <p class="footer-copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                         Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by <a href="#" target="_blank">Migori County Government</a> Developed by <a href="https://twtechnologies.africa/" target="_blank">Tw Technologies</a>
                     </p>
                </div><!-- .container -->
            </div><!-- .footer-bar -->
        </footer><!-- .site-footer -->
    {{--  <script src="{{ asset('js/scripts.js') }}" defer></script>--}}
        {{--<script type='text/javascript' src='js/jquery.js'></script>
        <script type='text/javascript' src='js/swiper.min.js'></script>
        <script type='text/javascript' src='js/masonry.pkgd.min.js'></script>
        <script type='text/javascript' src='js/jquery.collapsible.min.js'></script>
        <script type='text/javascript' src='js/custom.js'></script>--}}
</div>
</div>
</body>
@auth
    <script>
        window.user = @json(auth()->user())
    </script>
@endauth
</html>
