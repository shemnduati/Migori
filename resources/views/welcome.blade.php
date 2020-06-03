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
<<<<<<< HEAD
           
            <div class="nav-bar navbar-expand-lg navbar-default navbar-brand fixed-top">
=======

            <div class="nav-bar">
>>>>>>> bfa09abeb1f9d1626f46712c03b0fb04cc3a1cfd
                <div class="container">
                    <div class="row">
                        <div class="col-7 col-lg-4">
                            <div class="site-branding">
                                <h1 class="site-title">
                                    <a href="#" rel="home" style="color: yellow;">
                                       <img src="/images/mainlogo.png" alt="Main logo" width="48px;" height="48px;" style="padding-top: 0px;">
                                        Migori e-bursary
                                    </a></h1>
                            </div><!-- .site-branding -->
                        </div><!-- .col -->

                        <div class="col-5 col-lg-8 flex justify-content-end align-content-center">
                            <nav class="site-navigation flex justify-content-end ">
                                <ul class="flex flex-column flex-lg-row justify-content-lg-end justify-content-md-end align-content-center">
                                    <li class="current-menu-item"><a href="#">Home</a></li>
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

                        {{-- <div class="hero-content-wrap flex flex-column justify-content-center align-items-start">
                            <header class="entry-header">
                                <h3 style="color: greenyellow">Bursary And Scholarship<br/>Application Portal <br>(BASAP) Apply here</h3>
                            </header><!-- .entry-header -->

                            <footer class="entry-footer read-more">
                                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger mr-3" href="/apply">County bursary</a><br>
                                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="/scholarship">Scholarship</a>
                            </footer><!-- .entry-footer -->
                        </div><!-- .hero-content-wrap --> --}}
                    </div><!-- .col -->
                    
                </div><!-- .row -->
                
            </div><!-- .container -->
            <div id="demo" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                  <li data-target="#demo" data-slide-to="0" class="active"></li>
                  <li data-target="#demo" data-slide-to="1"></li>
                  <li data-target="#demo" data-slide-to="2"></li>
                </ul>
                
                <!-- The slideshow -->
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="images/Slider2.jpg" alt="Los Angeles" width="100%" height="500">
                    <div class="carousel-caption">

                        <div class="hero-content-wrap flex flex-column align-items-start" style="padding-top: 60%;">
                            <header class="entry-header">
                                <h3 style="color: #3d9a38;">Bursary And Scholarship Application Portal <br>(BASAP)</h3>
                            </header><!-- .entry-header -->

                            <footer class="entry-footer read-more" style="border-color: #3d9a38;">
                                <a href="#">Apply Here</a>
                            </footer><!-- .entry-footer -->
                        </div><!-- .hero-content-wrap -->
                        {{-- <h3>Los Angeles</h3>
                        <p>We had such a great time in LA!</p> --}}
                      </div>
                  </div>
                  <div class="carousel-item">
                    <img src="images/Slider1.jpg" alt="Chicago" width="100%" height="500">

                    <div class="carousel-caption">

                        <div class="hero-content-wrap flex flex-column align-items-start" style="padding-top: 40%;">
                            <header class="entry-header">
                                <h3 style="color: #3d9a38;"></h3>
                            </header><!-- .entry-header -->

                            <footer class="entry-footer read-more">
                                {{-- <a href="#">Apply Here</a> --}}
                            </footer><!-- .entry-footer -->
                        </div><!-- .hero-content-wrap -->
                        <h3>Kid reading in a library</h3>
                        
                      </div>
                    
                  </div>
                  <div class="carousel-item">
                    <img src="images/Slider4.jpg" alt="New York" width="1100" height="500">

                    <div class="carousel-caption">

                        <div class="hero-content-wrap flex flex-column align-items-start" style="padding-top: 40%;">
                            <header class="entry-header">
                                <h3 style="color: #0f150e;">Bursary And Scholarship Application Portal <br>(BASAP)</h3>
                            </header><!-- .entry-header -->

                            <footer class="entry-footer read-more">
                                <a href="#">Apply Here</a>
                            </footer><!-- .entry-footer -->
                        </div><!-- .hero-content-wrap -->
                        {{-- <h3>Los Angeles</h3>
                        <p>We had such a great time in LA!</p> --}}
                      </div>
                  </div>
                </div>
                
                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                  <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                </a>
              </div>
        </div><!-- .hero-content-hero-content-overlay -->

    </div><!-- .hero-content -->


    <section class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 align-content-lg-stretch">
                    <header class="heading">
                        <h2 class="entry-title">About BASAP</h2>

<<<<<<< HEAD
                        <p style="font-weight: 800; font-size: 18px;">Migori County Government is committed to provide scholarships and bursaries to deserving students in the county.</p>
                        <p style="font-weight: 800; font-size: 18px;">The Scholarships are available to Secondary school, College and University students in the county.</p>
=======
                        <p>Migori County Government is committed to providing  scholarships and bursaries to deserving students in the county.</p>
                        <p>The Scholarships are available to Secondary school, College and University students in the county.</p>
>>>>>>> bfa09abeb1f9d1626f46712c03b0fb04cc3a1cfd
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

                        {{-- <h2 class="entry-title">Eligibility :</h2> --}}
                        
                        <div class="row" style="margin-top: 20%;">

                            <div class="col-md-4">
                                <img src="images/Eligibility.png" alt="Eligibility" width="48px" height="48px" style="float: left">
                                
                            </div>
                            <div class="col-md-2" style="margin-left: 0%;">
                                <div style="float: right;"> <h1>Eligibility </h1></div>
                            </div>

                           
                        </div>

                        <p style="font-weight: 800; font-size: 18px;">
                            For one to qualify for the scholarships and bursaries for Migori county, must be of the following;
                        </p>

                        <ol style="font-weight: 800; font-size: 18px;">
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
<<<<<<< HEAD
                            <a href="#"><img src="images/icon1.png" alt=""></a>
                            <h2>Step 1</h2>
=======
                            {{-- <a href="#"><img src="images/1.jpg" alt=""></a> --}}
                            <h2>Step 1(Registration)</h2>
>>>>>>> bfa09abeb1f9d1626f46712c03b0fb04cc3a1cfd
                        </figure><!-- .course-thumbnail -->

                        <div class="course-content-wrap">
                            <header class="entry-header">
<<<<<<< HEAD

                                <h4>
                                    <p class="entry-title">
                                        Obtain Bursaries/Scholarships application Forms  <a data-toggle="collapse" href="#collapseExample" aria-controls="collapseExample" style="color: green"> read more</a>

                                        <div class="collapse" id="collapseExample" class="notbold" style="">
    
                                            <h5> from the Department of Education, Youth, Sports, Cultural and Social Services or download and print out form from the Migori county government website. </h5>
                                            
                                        </div>
                                    </p>
                                </h4>
=======
                                <h2 class="entry-title">Register to our online application system (BASAP).Fill in the registration form and submit it.</h2>
>>>>>>> bfa09abeb1f9d1626f46712c03b0fb04cc3a1cfd

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
<<<<<<< HEAD
                            <a href="#"><img src="images/icon2.png" alt=""></a>
                            <h2>Step 2</h2>
=======
                            {{-- <a href="#"><img src="images/2.jpg" alt=""></a> --}}
                            <h2>Step 2(verification)</h2>
>>>>>>> bfa09abeb1f9d1626f46712c03b0fb04cc3a1cfd
                        </figure><!-- .course-thumbnail -->

                        <div class="course-content-wrap">
                            <header class="entry-header">
<<<<<<< HEAD
                                <h2 class="entry-title"><p>Fill in the Forms accurately in capital letters.</p></h2>
=======
                                <h2 class="entry-title">Verification email will be send  to your email.verify your email by clicking the verification button.</h2>
>>>>>>> bfa09abeb1f9d1626f46712c03b0fb04cc3a1cfd

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
<<<<<<< HEAD
                            <a href="#"><img src="images/icon3.png" alt=""></a>
                            <h2>Step 3</h2>
=======
                            {{-- <a href="#"><img src="images/3.jpg" alt=""></a> --}}
                            <h2>Step 3(Application)</h2>
>>>>>>> bfa09abeb1f9d1626f46712c03b0fb04cc3a1cfd
                        </figure><!-- .course-thumbnail -->

                        <div class="course-content-wrap">
                            <header class="entry-header">
<<<<<<< HEAD
                                <h2 class="entry-title"><p>Have the Forms signed and stamped by the <a data-toggle="collapse" href="#collapse1" aria-controls="collapseExample" style="color: green">read more</a></p></h2>
=======
                                <h2 class="entry-title">Fill in the application form by providing the required details.Ensure that you have provided the correct details then submit the application.</h2>
>>>>>>> bfa09abeb1f9d1626f46712c03b0fb04cc3a1cfd

                                <div class="collapse" id="collapse1" class="notbold" style="">
    
                                    <h5> relevant authorities. </h5>
                                    
                                </div>
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
<<<<<<< HEAD
                            <a href="#"><img src="images/icon4.png" alt=""></a>
                            <h2>Step 4</h2>
=======
                            {{-- <a href="#"><img src="images/4.jpg" alt=""></a> --}}
                            <h2>Step 4(processing)</h2>
>>>>>>> bfa09abeb1f9d1626f46712c03b0fb04cc3a1cfd
                        </figure><!-- .course-thumbnail -->

                        <div class="course-content-wrap">
                            <header class="entry-header">
<<<<<<< HEAD
                                <h2 class="entry-title"><p>Attach all relevant documents as required.</p></h2>
=======
                                <h2 class="entry-title">Your application will go through various stages of verification.County staff will counter check all the information provided then verify your application or decline if the information provided is wrong.</h2>
>>>>>>> bfa09abeb1f9d1626f46712c03b0fb04cc3a1cfd

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
<<<<<<< HEAD
                            <a href="#"><img src="images/icon5.png" alt=""></a>
                            <h2>Step 5</h2>
=======
                            {{-- <a href="#"><img src="images/5.jpg" alt=""></a> --}}
                            <h2>Step 5(Status)</h2>
>>>>>>> bfa09abeb1f9d1626f46712c03b0fb04cc3a1cfd
                        </figure><!-- .course-thumbnail -->

                        <div class="course-content-wrap">
                            <header class="entry-header">
<<<<<<< HEAD
                                <h2 class="entry-title"><p>Return the Duly filled Forms to the <a data-toggle="collapse" href="#collapse2" aria-controls="collapseExample" style="color: green">read more</a></p></h2>

                                <div class="collapse" id="collapse1" class="notbold" style="">
    
                                    <h5>  Department of Education and wait for feedback. </h5>
                                    
                                </div>
=======
                                <h2 class="entry-title">Student can follow up the application status of bursary/scholarship on their dashboard.Login into your account,then on the dropdown where your name appears on the navigation tab, select my profile.Here you can see the application status of your bursary/scholarship.</h2>
>>>>>>> bfa09abeb1f9d1626f46712c03b0fb04cc3a1cfd

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
<<<<<<< HEAD
                            <a href="#"><img src="images/icon6.png" alt=""></a>
                            <h2>For more Information</h2>
=======
                            {{-- <a href="#"><img src="images/6.jpg" alt=""></a> --}}
                            <h2>Awarded</h2>
>>>>>>> bfa09abeb1f9d1626f46712c03b0fb04cc3a1cfd
                        </figure><!-- .course-thumbnail -->

                        <div class="course-content-wrap">
                            <header class="entry-header">
<<<<<<< HEAD
                                <h2 class="entry-title"><a href="#">For more information or clarification about  <a data-toggle="collapse" href="#collapse2" aria-controls="collapse2" style="color: green">read more</a></h2>
=======
                                <h2 class="entry-title">You will  receive an email notification when your bursary/scholarship application is approved.You can then pick the awarded bursary/scholarship cheque from county offices or have it sent to the school directly.   </h2>
>>>>>>> bfa09abeb1f9d1626f46712c03b0fb04cc3a1cfd

                                <div class="collapse" id="collapse2" class="notbold" style="">
    
                                    <h5> visit Migori Government website ebursary section </h5>
                                    
                                </div>
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


    {{--<div class="clients-logo">
        <div class="container">
            <div class="row">
                <div class="col-12 flex flex-wrap justify-content-center justify-content-lg-between align-items-center">
                    <div class="logo-wrap">
                        <img src="/images/mainlogo.png" alt="" width="84px;" height="84px;">
                    </div><!-- .logo-wrap -->

                    <div class="logo-wrap">
                        <img src="/images/kel.png" alt="" width="84px;" height="84px;">
                    </div><!-- .logo-wrap -->

                    <div class="logo-wrap">
                        <img src="/images/mainlogo.png" alt="" width="84px;" height="84px;">
                    </div><!-- .logo-wrap -->

                    <div class="logo-wrap">
                        <img src="/images/kel.png" alt="" width="84px;" height="84px;">
                    </div><!-- .logo-wrap -->

                    --}}{{-- <div class="logo-wrap">
                        <img src="/images123/mainlogo.png" alt=""> --}}{{--
                    </div><!-- .logo-wrap -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .clients-logo -->--}}

    <footer class="site-footer">
        <div class="footer-widgets">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="foot-about">
                            <a class="foot-logo" href="#"><img src="/images/mainlogo.png" alt="" width="80%;" height="80%;"></a>


<<<<<<< HEAD
                            {{-- <p class="footer-copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by <a href="#" target="_blank">Migori County Goverment</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p> --}}
=======
                            <p class="footer-copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by <a href="#" target="_blank">Migori County Government</a> Developed by <a href="https://twtechnologies.africa/" target="_blank">Tw Technologies</a>
                                </p>
>>>>>>> bfa09abeb1f9d1626f46712c03b0fb04cc3a1cfd
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
