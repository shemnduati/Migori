<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }} - {{ config('app.subtitle') }}</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.jpeg"/>

        <!-- Fonts -->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
{{--        <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    </head>
    <body>
        <div id="app">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
                <div class="container">
                    <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="/img/favicon.jpeg" alt="" /> BAZA</a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars ml-1"></i></button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav text-uppercase ml-auto">
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Features</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
{{--                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Login</a></li>--}}
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
                    </div>
                </div>
            </nav>

            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="..." alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="..." alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="..." alt="Third slide">
                  </div>
                </div>
              </div>
            <!-- Masthead-->
            <header class="masthead" style="background-image: url('{{ asset('images/laptop.jpg')}}');">
                <div class="container">
                    <div class="masthead-subheading text-light">Welcome To BAZA</div>
                    <div class="masthead-heading">BURSARY AND SCHOLARSHIP APPLICATION PORTAL <br> (BASAP)</div>
                    <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger mr-3" href="/apply">Apply</a>
                    <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="/scholarship">Scholarship</a>
                </div>
            </header>
            <!-- Services-->
            <section class="page-section " id="services">
                <div class="container">
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase">Features</h2>
                        <h3 class="section-subheading text-muted">“When you want something, all the universe conspires in helping you achieve it”</h3>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-4">
                            <span class="fa-stack fa-4x"><i class="fas fa-circle fa-stack-2x text-primary"></i><i class="fas fa-mobile-alt fa-stack-1x fa-inverse"></i></span>
                            <h4 class="my-3">Bursary made simple</h4>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                        </div>
                        <div class="col-md-4">
                            <span class="fa-stack fa-4x"><i class="fas fa-circle fa-stack-2x text-primary"></i><i class="fas fa-shield-alt fa-stack-1x fa-inverse"></i></span>
                            <h4 class="my-3">Secure and private</h4>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                        </div>
                        <div class="col-md-4">
                            <span class="fa-stack fa-4x"><i class="fas fa-circle fa-stack-2x text-primary"></i><i class="fas fa-clock fa-stack-1x fa-inverse"></i></span>
                            <h4 class="my-3">Timely and convenient</h4>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-4">
                            <span class="fa-stack fa-4x"><i class="fas fa-circle fa-stack-2x text-primary"></i><i class="fas fa-user-friends fa-stack-1x fa-inverse"></i></span>
                            <h4 class="my-3">Find your mentor</h4>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                        </div>
                        <div class="col-md-4">
                            <span class="fa-stack fa-4x"><i class="fas fa-circle fa-stack-2x text-primary"></i><i class="fas fa-at fa-stack-1x fa-inverse"></i></span>
                            <h4 class="my-3">Join our community</h4>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                        </div>
                        <div class="col-md-4">
                            <span class="fa-stack fa-4x"><i class="fas fa-circle fa-stack-2x text-primary"></i><i class="fas fa-user-graduate fa-stack-1x fa-inverse"></i></span>
                            <h4 class="my-3">See career guide</h4>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- About-->
            <section class="page-section bg-light" id="about">
                <div class="container">
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase">About</h2>
                        <h3 class="section-subheading text-muted">Lets Talk about BAZA.</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde</p></div>
                    </div>
                </div>
            </section>
            <!-- Contact-->
            <section class="page-section" id="contact">
                <div class="container">
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase">Contact Us</h2>
                        <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                    </div>
                    <form id="contactForm" name="sentMessage" novalidate="novalidate">
                        <div class="row align-items-stretch mb-5">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name." />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address." />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group mb-md-0">
                                    <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number." />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-textarea mb-md-0">
                                    <textarea class="form-control" id="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <div id="success"></div>
                            <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">Send Message</button>
                        </div>
                    </form>
                </div>
            </section>
            <!-- Footer-->
            <footer class="footer py-4">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-4 text-lg-left"><a href="https://twtechnologies.africa">Copyright &copy; Baza {{date('Y')}}</a>.</strong> All rights reserved.</div>
                        <div class="col-lg-4 my-3 my-lg-0">
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a><a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a><a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        <div class="col-lg-4 text-lg-right"><a class="mr-3" href="{{ route('privacy') }}">Privacy Policy</a></div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- Scripts -->
{{--        <script src="{{ asset('js/app.js') }}" defer></script>--}}
        <script src="{{ asset('js/scripts.js') }}" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    </body>
</html>
