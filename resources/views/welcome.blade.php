<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Baza</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.jpeg"/>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

{{--        <style>--}}
{{--            body{--}}
{{--                background-color: #ffffff;--}}
{{--            }--}}
{{--            .baza{--}}
{{--                color: #161266;--}}
{{--            }--}}
{{--            .a{--}}
{{--                color: #7030a0;--}}
{{--            }--}}
{{--            .b{--}}
{{--                color: #31849b;--}}
{{--            }--}}
{{--            .z{--}}
{{--                color: #e36c0a;--}}
{{--            }--}}
{{--            .x{--}}
{{--                color: #002060;--}}
{{--            }--}}
{{--            .grad {--}}
{{--              background-image: linear-gradient(to right, #D5F5CE , #ABEE98, #D5F5CE);--}}
{{--            }--}}
{{--            .big{--}}
{{--                font-size: 40px;--}}
{{--            }--}}
{{--            .logo1{--}}
{{--                color: #c00000;--}}
{{--                font-weight: 700;--}}
{{--                font-size: 25px;--}}

{{--            }--}}
{{--            .logo2{--}}
{{--                color: #7030a0;--}}
{{--                font-weight: 700;--}}
{{--                font-size: 18px;--}}
{{--            }--}}
{{--            .logo img{--}}
{{--                padding-top: 40px;--}}
{{--                width: 100px;--}}
{{--                height: 120px;--}}
{{--            }--}}
{{--            .btn{--}}
{{--                background-color: #31849b;--}}
{{--                color: #fff;--}}
{{--                font-weight: 700;--}}
{{--            }--}}
{{--            .state{--}}
{{--                color: #1db5b5;--}}
{{--                font-size: 20px;--}}
{{--            }--}}
{{--            .bb{--}}
{{--                margin: 0 240px 0 210px;--}}
{{--            }--}}

{{--        </style>--}}

    </head>
    <body>


        <div id="app">
            <section class="header">
                <section class="Navigation">
                    <nav class="navbar navbar-expand-md navbar-light bg-transparent">
                        <div class="container-fluid">
                            <a class="navbar-brand font-weight-bolder" href="{{ url('/') }}">
                                {{ config('app.name', 'BAZA') }}
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <!-- Left Side Of Navbar -->
{{--                                <ul class="navbar-nav mr-auto">--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link text-light ml-3" href="">About</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link text-light ml-3" href="">Contact</a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}

                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ml-auto">

                                    <!-- Authentication Links -->
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
                </section>

                <div class="content container">
                    <div class="banner">
                        <h3 class="text-center lead font-weight-bold">MIGORI COUNTY GOVERNMENT</h3>
                        <p class="text-center text-light">BURSARY AND SCHOLARSHIP APPLICATION PORTAL (BASAP)</p>
                        <a href="/apply" class="btn btn-outline-dark button">APPLY</a>
                        <a href="/scholarship" class="btn btn-outline-dark button">SCHOLARSHIP</a>
                    </div>
                </div>
            </section>
            <section class="learn container">
                <div class="row no-padding">
                    <div class="col-md-6">
                        <img src="images/book.jpg" alt="" style="height: 360px; width: 550px">
                    </div>
                    <div class="col-md-6 ">
                        <div class="row justify-content-center" style="padding: 100px 0">
                            <div class="border border-dark" style="height: 150px; width: 400px; background-image: linear-gradient(to right, #D5F5CE , #ABEE98, #D5F5CE)">
                                <div class="pt-5 ">
                                    <p class="text-center text-dark no-padding"><b>Applications</b></p>
                                    <h3 class="text-center text-dark">can all be done home</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="story pb-3">
                <div class="row no-padding justify-content-center">
                    <div class="col-md-12">
                        <h3 class="text-center font-weight-bold">Our Story</h3>
                    </div>
                    <div class="col-md-12 mb-4">
                        <h4 class="text-center font-weight-bold">We're passionate about making our students grow</h4>
                    </div>
                    <div class="row no-padding container">
                        <div class="col-md-6">
                            <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad animi culpa cum cupiditate debitis dolore dolorem, eius error et hic nemo pariatur reiciendis saepe ut vero! Culpa doloremque enim esse.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad animi culpa cum cupiditate debitis dolore dolorem, eius error et hic nemo pariatur reiciendis saepe ut vero! Culpa doloremque enim esse.</p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, dolorem earum et eveniet in ipsa iure libero maiores nihil non obcaecati quaerat quibusdam quisquam quod recusandae sit soluta voluptate voluptatum? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad animi culpa cum cupiditate debitis dolore dolorem, eius error et hic nemo pariatur reiciendis saepe ut vero! Culpa doloremque enim esse.</p>
                        </div>
                    </div>

                </div>
            </section>

            <section class="study pt-5">
                <img src="images/study.jpg" alt="" style="width: 100%">

                <p class="lead pt-3 text-center">“When you want something, all the universe conspires in helping you achieve it”</p>

                <div class="container">
                    <div class=" cent">
                        <div class="col-md-4 cent">
                            <div class="text-center bg-dark cent" style="border-radius: 50%; height: 200px; width: 200px ">
                                <p>Bursary <br> made simple</p>
                            </div>
                        </div>
                        <div class="col-md-4 cent">
                            <div class="text-center bg-dark cent" style="border-radius: 50%; height: 200px; width: 200px ">
                                <p>Secure <br>and private</p>
                            </div>
                        </div>
                        <div class="col-md-4 cent">
                            <div class="text-center bg-dark cent" style="border-radius: 50%; height: 200px; width: 200px ">
                                <p>Timely <br>and convenient</p>
                            </div>
                        </div>
                    </div>
                    <div class="py-3 cent">
                        <div class="col-md-4 cent">
                            <div class="text-center bg-dark cent" style="border-radius: 50%; height: 200px; width: 200px ">
                                <p>Find <br> your mentor</p>
                            </div>
                        </div>
                        <div class="col-md-4 cent">
                            <div class="text-center bg-dark cent" style="border-radius: 50%; height: 200px; width: 200px ">
                                <p>Join our <br> community</p>
                            </div>
                        </div>
                        <div class="col-md-4 cent">
                            <div class="text-center bg-dark cent" style="border-radius: 50%; height: 200px; width: 200px ">
                                <p>See career <br> guide</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="footer pt-3">
                <footer class=" p-3 mx-3">
                            <!-- To the right -->
                    <div class="float-right d-none d-sm-inline">
                        <a class="pl-2 state btn-link" href="{{ route('privacy') }}">
                            {{ __('Terms and condition') }}
                        </a>
                    </div>
                    <!-- Default to the left -->
                    <strong><a href="https://twtechnologies.africa">Copyright &copy; Baza {{date('Y')}}</a>.</strong> All rights reserved.
                </footer>
            </section>

                {{--            <div class="content">--}}
{{--            <div class="grad col-md-12 py-3">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-2 text-center">--}}
{{--                            <img class="align-self-center img-fluid" src="/img/grad.jpeg" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="col-md-8">--}}
{{--                            <div class="text-center pt-4 baza">--}}
{{--                                <h3 class="font-weight-bold">MIGORI COUNTY GOVERNMENT</h3>--}}
{{--                            </div>--}}


{{--                            <div class="text-center pt-2 baza">--}}
{{--                                <h3 class="font-weight-bold">BURSARY AND SCHOLARSHIP APPLICATION PORTAL (BASAP)</h3>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-2 text-center">--}}
{{--                            <img class="align-self-center img-fluid" src="/img/mig.jpeg" alt="">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row pl-5 col-md-12">--}}
{{--                    <div class="row col-md-8 logo">--}}

{{--                    </div>--}}
{{--                    <div class="col-md-4 mt-2 pt-5">--}}
{{--                        @if (Route::has('login'))--}}
{{--                            <div class="top-right links">--}}
{{--                                @auth--}}
{{--                                    <button class="nav-item dropdown btn btn-primary btn-sm">--}}
{{--                                        <a id="navbarDropdown" style="color: white;" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                            {{ Auth::user()->name }} <span class="caret"></span>--}}
{{--                                        </a>--}}
{{--                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                                            <a href="/status" class="dropdown-item">Application Status</a>--}}
{{--                                            <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                               onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                                {{ __('Logout') }}--}}
{{--                                            </a>--}}

{{--                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                                                @csrf--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </button>--}}
{{--                                    <a href="/apply" class="btn btn px-4 pr-2">County Bursary</a>--}}
{{--                                    <a href="/scholarship" class="btn btn px-4 pr-2">Scholarship</a>--}}

{{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}
{{--                                @else--}}
{{--                                    <a href="{{ route('login') }}" class="btn btn px-5">Login</a>--}}
{{--                                @endauth--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="banner d-flex justify-content-center">--}}
{{--                    <img class="align-self-center img-fluid" src="/img/frin.png" alt="">--}}
{{--                </div>--}}
{{--                <div class="pt-2">--}}
{{--                    <p class="text-center state">“When you want something, all the universe conspires in helping you achieve it”</p>--}}
{{--                </div>--}}
{{--                <div class="row pb-5">--}}
{{--                    <div class="col-md-2 col-sm-12 pl-5 p-2"></div>--}}
{{--                    <div class="col-md-3 col-sm-12 pl-5 p-2"><img src="/img/fone.png" alt="">Bursary made simple</div>--}}
{{--                    <div class="col-md-2 col-sm-12 pl-5 p-2"><img src="/img/secure.png" alt="">Secure and private</div>--}}
{{--                    <div class="col-md-3 col-sm-12 pl-5 p-2"><img src="/img/time.png" alt="">Timely and convenient</div>--}}
{{--                    <div class="col-md-2 col-sm-12 pl-5 p-2"></div>--}}
{{--                </div>--}}
{{--                <div class="row pb-5">--}}
{{--                    <div class="col-md-2 col-sm-12 pl-5 p-2"></div>--}}
{{--                    <div class="col-md-3 col-sm-12 pl-5 p-2"><img src="/img/mentor.png" alt="">Find your mentor</div>--}}
{{--                    <div class="col-md-2 col-sm-12 pl-5 p-2"><img src="/img/join.png" alt="">Join our community</div>--}}
{{--                    <div class="col-md-3 col-sm-12 pl-5 p-2"><img src="/img/grad.png" alt="">See career guide</div>--}}
{{--                    <div class="col-md-2 col-sm-12 pl-5 p-2"></div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}

{{--        <footer class=" p-3 mx-3">--}}
{{--            <!-- To the right -->--}}
{{--            <div class="float-right d-none d-sm-inline">--}}
{{--                <a class="pl-2 state btn-link" href="{{ route('privacy') }}">--}}
{{--                    {{ __('Terms and condition') }}--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <!-- Default to the left -->--}}
{{--            <strong><a href="https://twtechnologies.africa">Copyright &copy; Baza {{date('Y')}}</a>.</strong> All rights reserved.--}}
{{--        </footer>--}}

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
