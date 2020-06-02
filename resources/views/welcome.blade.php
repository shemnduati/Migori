<!DOCTYPE html>
<html lang="en">
<head>
    <title>BASAP</title>

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
</head>
<body>
    <div class="hero-content">
        <header class="site-header">

            <div class="nav-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-8 col-lg-3">
                            <div class="site-branding">
                                <h1 class="site-title">
                                    <a href="#" rel="home" style="color: yellow;">
                                       <img src="/images/mainlogo.png" alt="Main logo" width="48px;" height="48px;" style="padding-top: 0px;">
                                        BASAP
                                    </a></h1>
                            </div><!-- .site-branding -->
                        </div><!-- .col -->

                        <div class="col-4 col-lg-9 flex justify-content-end align-content-center">
                            <nav class="site-navigation flex justify-content-end ">
                                <ul class="flex flex-column flex-lg-row justify-content-lg-end justify-content-md-end align-content-center">
                                    <li class="current-menu-item"><a href="#">.Home</a></li>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Contact</a></li>
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

                                <div class="header-bar-cart">
                                    <a href="#" class="flex justify-content-center align-items-center"></a>
                                </div><!-- .header-bar-search -->
                            </nav><!-- .site-navigation -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .container -->
            </div><!-- .nav-bar -->
        </header><!-- .site-header -->

        <div class="hero-content-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-content-wrap flex flex-column justify-content-center align-items-start">
                            <header class="entry-header">
                                <h3 style="color: greenyellow">Bursary And Scholarship<br/>Application Portal <br>(BASAP)</h3>
                            </header><!-- .entry-header -->

                            <footer class="entry-footer read-more">
                                <a href="/apply">Apply Here</a>
                            </footer><!-- .entry-footer -->
                        </div><!-- .hero-content-wrap -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .hero-content-hero-content-overlay -->
    </div><!-- .hero-content -->


    <section class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 align-content-lg-stretch">
                    <header class="heading">
                        <h2 class="entry-title">About BASAP</h2>

                        <p>Migori County Government is committed to providing  scholarships and bursaries to deserving students in the county.</p>
                        <p>The Scholarships are available to Secondary school, College and University students in the county.</p>
                    </header><!-- .heading -->

                    {{-- <div class="entry-content ezuca-stats">
                        <div class="stats-wrap flex flex-wrap justify-content-lg-between">
                            <div class="stats-count">
                                50<span>M+</span>
                                <p>STUDENTS</p>
                            </div><!-- .stats-count -->

                            <div class="stats-count">
                                3<span>K+</span>
                                <p>ACTIVE APPLICATIONS</p>
                            </div><!-- .stats-count -->

                            <div class="stats-count">
                                340<span>K+</span>
                                <p>SUCCESSFUL DISBURSMENT</p>
                            </div><!-- .stats-count -->

                            <div class="stats-count">
                                20<span>+</span>
                                <p>PARTNERS</p>
                            </div><!-- .stats-count -->
                        </div><!-- .stats-wrap -->
                    </div><!-- .ezuca-stats --> --}}

                    <header class="heading">

                        <h2 class="entry-title">Eligibility :</h2>

                        <p>
                            For one to qualify for the scholarships and bursaries for Migori county, must be of the following;
                        </p>

                        <ol>
                            <li><p>Applicant must be residents of Migori county</p></li>
                            <li><p>Candidates must have admission/calling letter for secondary school or college and university.</p></li>
                            <li><p>Excellent academic performance</p></li>
                            <li><p>Evidence of being in needy</p></li>
                        </ol>

                    </header><!-- .heading -->
                </div><!-- .col -->

                <div class="col-12 col-lg-6 flex align-content-center mt-5 mt-lg-0">
                    <div class="ezuca-video position-relative">
                        <div class="video-play-btn position-absolute">
                            {{-- <img src="images/video-icon.png" alt="Migori Governor"> --}}
                        </div><!-- .video-play-btn -->

                        <img src="images/study.jpg" alt="">
                    </div><!-- .ezuca-video -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </section><!-- .about-section -->

    <section class="featured-courses vertical-column courses-wrap">
        <div class="container">
            <div class="row mx-m-25">
                <div class="col-12 px-25">
                    <header class="heading flex flex-wrap justify-content-between align-items-center">
                        <h2 class="entry-title">How To Apply</h2>

                    </header><!-- .heading -->
                </div><!-- .col -->

                <div class="col-12 col-md-6 col-lg-4 px-25">
                    <div class="course-content">
                        <figure class="course-thumbnail">
                            {{-- <a href="#"><img src="images/1.jpg" alt=""></a> --}}
                            <h2>Step 1(Registration)</h2>
                        </figure><!-- .course-thumbnail -->

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <h2 class="entry-title">Register to our online application system (BASAP).Fill in the registration form and submit it.</h2>

                                {{-- <div class="entry-meta flex align-items-center">
                                    <div class="course-author"><a href="#">Ms. Lara Croft </a></div>

                                    <div class="course-date">July 21, 2018</div>
                                </div><!-- .course-date --> --}}
                            </header><!-- .entry-header -->

                            {{-- <footer class="entry-footer flex justify-content-between align-items-center">
                                <div class="course-cost">
                                    $45 <span class="price-drop">$68</span>
                                </div><!-- .course-cost -->

                                <div class="course-ratings flex justify-content-end align-items-center">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o"></span>

                                    <span class="course-ratings-count">(4 votes)</span>
                                </div><!-- .course-ratings -->
                            </footer><!-- .entry-footer --> --}}
                        </div><!-- .course-content-wrap -->
                    </div><!-- .course-content -->
                </div><!-- .col -->

                <div class="col-12 col-md-6 col-lg-4 px-25">
                    <div class="course-content">
                        <figure class="course-thumbnail">
                            {{-- <a href="#"><img src="images/2.jpg" alt=""></a> --}}
                            <h2>Step 2(verification)</h2>
                        </figure><!-- .course-thumbnail -->

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <h2 class="entry-title">Verification email will be send  to your email.verify your email by clicking the verification button.</h2>

                                {{-- <div class="entry-meta flex align-items-center">
                                    <div class="course-author"><a href="#">Michelle Golden</a></div>

                                    <div class="course-date">Mar 14, 2018</div>
                                </div><!-- .course-date --> --}}
                            </header><!-- .entry-header -->

                            {{-- <footer class="entry-footer flex justify-content-between align-items-center">
                                <div class="course-cost">
                                    <span class="free-cost">Free</span>
                                </div><!-- .price-drop -->

                                <div class="course-ratings flex justify-content-end align-items-center">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o"></span>

                                    <span class="course-ratings-count">(4 votes)</span>
                                </div><!-- .course-ratings -->
                            </footer><!-- .entry-footer --> --}}
                        </div><!-- .course-content-wrap -->
                    </div><!-- .course-content -->
                </div><!-- .col -->

                <div class="col-12 col-md-6 col-lg-4 px-25">
                    <div class="course-content">
                        <figure class="course-thumbnail">
                            {{-- <a href="#"><img src="images/3.jpg" alt=""></a> --}}
                            <h2>Step 3(Application)</h2>
                        </figure><!-- .course-thumbnail -->

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <h2 class="entry-title">Fill in the application form by providing the required details.Ensure that you have provided the correct details then submit the application.</h2>

                                {{-- <div class="entry-meta flex align-items-center">
                                    <div class="course-author"><a href="#">Ms. Lucius</a></div>

                                    <div class="course-date">Dec 18, 2018</div>
                                </div><!-- .course-date --> --}}
                            </header><!-- .entry-header -->

                            {{-- <footer class="entry-footer flex justify-content-between align-items-center">
                                <div class="course-cost">
                                    $55 <span class="price-drop">$78</span>
                                </div><!-- .course-cost -->

                                <div class="course-ratings flex justify-content-end align-items-center">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o"></span>

                                    <span class="course-ratings-count">(4 votes)</span>
                                </div><!-- .course-ratings -->
                            </footer><!-- .entry-footer --> --}}
                        </div><!-- .course-content-wrap -->
                    </div><!-- .course-content -->
                </div><!-- .col -->

                <div class="col-12 col-md-6 col-lg-4 px-25">
                    <div class="course-content">
                        <figure class="course-thumbnail">
                            {{-- <a href="#"><img src="images/4.jpg" alt=""></a> --}}
                            <h2>Step 4(processing)</h2>
                        </figure><!-- .course-thumbnail -->

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <h2 class="entry-title">Your application will go through various stages of verification.County staff will counter check all the information provided then verify your application or decline if the information provided is wrong.</h2>

                                {{-- <div class="entry-meta flex align-items-center">
                                    <div class="course-author"><a href="#">Mr. John Wick</a></div>

                                    <div class="course-date">Otc 17, 2018</div>
                                </div><!-- .course-date --> --}}
                            </header><!-- .entry-header -->

                            {{-- <footer class="entry-footer flex justify-content-between align-items-center">
                                <div class="course-cost">
                                    <span class="free-cost">Free</span>
                                </div><!-- .course-cost -->

                                <div class="course-ratings flex justify-content-end align-items-center">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o"></span>

                                    <span class="course-ratings-count">(4 votes)</span>
                                </div><!-- .course-ratings -->
                            </footer><!-- .entry-footer --> --}}
                        </div><!-- .course-content-wrap -->
                    </div><!-- .course-content -->
                </div><!-- .col -->

                <div class="col-12 col-md-6 col-lg-4 px-25">
                    <div class="course-content">
                        <figure class="course-thumbnail">
                            {{-- <a href="#"><img src="images/5.jpg" alt=""></a> --}}
                            <h2>Step 5(Status)</h2>
                        </figure><!-- .course-thumbnail -->

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <h2 class="entry-title">Student can follow up the application status of bursary/scholarship on their dashboard.Login into your account,then on the dropdown where your name appears on the navigation tab, select my profile.Here you can see the application status of your bursary/scholarship.You will also receive email notification when your bursary/scholarship application is approved.</h2>

                                {{-- <div class="entry-meta flex align-items-center">
                                    <div class="course-author"><a href="#">Mr. Tom Redder</a></div>

                                    <div class="course-date">Sep 14, 2018</div>
                                </div><!-- .course-date --> --}}
                            </header><!-- .entry-header -->

                            {{-- <footer class="entry-footer flex justify-content-between align-items-center">
                                <div class="course-cost">
                                    $38 <span class="price-drop">$48</span>
                                </div><!-- .course-cost -->

                                <div class="course-ratings flex justify-content-end align-items-center">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o"></span>

                                    <span class="course-ratings-count">(4 votes)</span>
                                </div><!-- .course-ratings -->
                            </footer><!-- .entry-footer --> --}}
                        </div><!-- .course-content-wrap -->
                    </div><!-- .course-content -->
                </div><!-- .col -->

                <div class="col-12 col-md-6 col-lg-4 px-25">
                    <div class="course-content">
                        <figure class="course-thumbnail">
                            {{-- <a href="#"><img src="images/6.jpg" alt=""></a> --}}
                            <h2>Awarded</h2>
                        </figure><!-- .course-thumbnail -->

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <h2 class="entry-title">Once your application is approved,you will receive an email  with a file attached.You will be required to print the form and fill in the required information.
                                    The student will then submit the form physically to the required county staff.The county staff will then sign and stamp the form,after which the student will be awarded the bursary/scholarship</h2>

                                {{-- <div class="entry-meta flex align-items-center">
                                    <div class="course-author"><a href="#">Russell Stephens</a></div>

                                    <div class="course-date">Nov 06, 2018</div>
                                </div><!-- .course-date --> --}}
                            </header><!-- .entry-header -->

                            {{-- <footer class="entry-footer flex justify-content-between align-items-center">
                                <div class="course-cost">
                                    <span class="free-cost">Free</span>
                                </div><!-- .course-cost -->

                                <div class="course-ratings flex justify-content-end align-items-center">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o"></span>

                                    <span class="course-ratings-count">(4 votes)</span>
                                </div><!-- .course-ratings -->
                            </footer><!-- .entry-footer --> --}}
                        </div><!-- .course-content-wrap -->
                    </div><!-- .course-content -->
                </div><!-- .col -->

                <div class="col-12 px-25 flex justify-content-center">
                    {{-- <a class="btn" href="#">view all courses</a> --}}
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </section><!-- .courses-wrap -->


    <div class="clients-logo">
        <div class="container">
            <div class="row">
                <div class="col-12 flex flex-wrap justify-content-center justify-content-lg-between align-items-center">
                    <div class="logo-wrap">
                        <img src="/images/mainlogo.png" alt="" width="84px;" height="84px;">
                    </div><!-- .logo-wrap -->

                    <div class="logo-wrap">
                        <img src="/images/mainlogo.png" alt="" width="84px;" height="84px;">
                    </div><!-- .logo-wrap -->

                    <div class="logo-wrap">
                        <img src="/images/mainlogo.png" alt="" width="84px;" height="84px;">
                    </div><!-- .logo-wrap -->

                    <div class="logo-wrap">
                        <img src="/images/mainlogo.png" alt="" width="84px;" height="84px;">
                    </div><!-- .logo-wrap -->

                    {{-- <div class="logo-wrap">
                        <img src="/images123/mainlogo.png" alt=""> --}}
                    </div><!-- .logo-wrap -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .clients-logo -->

    <footer class="site-footer">
        <div class="footer-widgets">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="foot-about">
                            <a class="foot-logo" href="#"><img src="/images/mainlogo.png" alt="" width="64px;" height="64px;"></a>

                            <p>BASAP</p>

                            <p class="footer-copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by <a href="#" target="_blank">Migori County Government</a> Developed by <a href="https://twtechnologies.africa/" target="_blank">Tw Technologies</a>
                                </p>
                        </div><!-- .foot-about -->
                    </div><!-- .col -->

                    <div class="col-12 col-md-6 col-lg-3 mt-5 mt-md-0">
                        <div class="foot-contact">
                            <h2>Contact Us</h2>

                            <ul>
                                <li>Email: </li>
                                <li>Phone:</li>
                                <li>Address: Migori County, Kenya</li>
                            </ul>
                        </div><!-- .foot-contact -->
                    </div><!-- .col -->

                    <div class="col-12 col-md-6 col-lg-3 mt-5 mt-lg-0">
                        <div class="quick-links flex flex-wrap">
                            <h2 class="w-100">Quick Links</h2>

                            <ul class="w-50">
                                <li><a href="#">About </a></li>
                                <li><a href="{{ route('privacy') }}">Terms of Use </a></li>
                                <li><a href="{{ route('privacy') }}">Privacy Policy </a></li>
                                <li><a href="#">Contact Us</a></li>
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
            </div><!-- .container -->
        </div><!-- .footer-bar -->
    </footer><!-- .site-footer -->
    <script src="{{ asset('js/scripts.js') }}" defer></script>
<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/swiper.min.js'></script>
<script type='text/javascript' src='js/masonry.pkgd.min.js'></script>
<script type='text/javascript' src='js/jquery.collapsible.min.js'></script>
<script type='text/javascript' src='js/custom.js'></script>

</body>
</html>
