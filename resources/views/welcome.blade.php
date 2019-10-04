<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Baza</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" type="image/x-icon" href="/img/logo.jpg"/>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <style>
            body{
                background-color: #ffffff;
            }
            .baza{
                color: #660033;
            }
            .a{
                color: #7030a0;
            }
            .b{
                color: #31849b;
            }
            .z{
                color: #e36c0a;
            }
            .x{
                color: #002060;
            }
            .grad {
              background-image: linear-gradient(to right, #ffffe2 , #ffff9f, #ffffe2);
            }
            .big{
                font-size: 40px;
            }
            .logo1{
                color: #c00000;
                font-weight: 700;
                font-size: 25px;

            }
            .logo2{
                color: #7030a0;
                font-weight: 700;
                font-size: 18px;
            }
            .logo img{
                padding-top: 40px;
                width: 100px;
                height: 120px;
            }
            .btn{
                background-color: #31849b;
                color: #fff;
                font-weight: 700;
            }
            .state{
                color: #1db5b5;
                font-size: 20px;
            }
            .bb{
                margin: 0 240px 0 210px;
            }

        </style>

    </head>
    <body>


        <div class="container-fluid" id="app">

            <div class="content">
                <div class="grad col-md-12 pb-3">
                    <div class="text-center pt-4 baza">
                        <h3 class="font-weight-bold">BURSARY APPLICATION SYSTEM</h3>
                    </div>


                    <div class="text-center pt-2">
                        <h3 class="font-weight-bolder big"><span class="b">B </span><span class="a">A </span><span class="z">Z </span><span class="x">A</span></h3>
                    </div>
                </div>
                <div class="row pl-5 col-md-12">
                    <div class="row col-md-10 logo">
                        <img src="/img/logo.jpg" alt="">
                        <p class="pt-5 p-1"><span class="logo1">BAZA</span><br><span class="logo2">With you every step</span></p>
                    </div>
                    <div class="col-md-2 mt-2 pt-5">
                        @if (Route::has('login'))
                            <div class="top-right links">
                                @auth
                                    <button class="nav-item dropdown btn btn-primary btn-sm">
                                        <a id="navbarDropdown" style="color: white;" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                                    </button>
                                    <a href="/apply" class="btn btn mb-2 mt-4 px-4 pr-2">Get Started</a>

{{--                                    <a class="btn btn px-5" href="{{ route('logout') }}"--}}
{{--                                       onclick="event.preventDefault();--}}
{{--                                                                 document.getElementById('logout-form').submit();">--}}
{{--                                            {{ __('Logout') }}--}}
{{--                                    </a>--}}

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn px-5">Login</a>
                                @endauth
                            </div>
                        @endif

                    </div>
                </div>
{{--                @auth--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="row col-md-4 col-sm-6 col-xm-6">--}}
{{--                        <mystatus></mystatus>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @endauth--}}
                <div class="banner d-flex justify-content-center">
                    <img class="align-self-center img-fluid" src="/img/frin.png" alt="">
                </div>
                <div class="pt-2">
                    <p class="text-center state">“When you want something, all the universe conspires in helping you achieve it”</p>
                </div>
                <div class="row pb-5">
                    <div class="col-md-2 col-sm-12 pl-5 p-2"></div>
                    <div class="col-md-3 col-sm-12 pl-5 p-2"><img src="/img/fone.png" alt="">Bursary made simple</div>
                    <div class="col-md-2 col-sm-12 pl-5 p-2"><img src="/img/secure.png" alt="">Secure and private</div>
                    <div class="col-md-3 col-sm-12 pl-5 p-2"><img src="/img/time.png" alt="">Timely and convenient</div>
                    <div class="col-md-2 col-sm-12 pl-5 p-2"></div>
                </div>
                <div class="row pb-5">
                    <div class="col-md-2 col-sm-12 pl-5 p-2"></div>
                    <div class="col-md-3 col-sm-12 pl-5 p-2"><img src="/img/mentor.png" alt="">Find your mentor</div>
                    <div class="col-md-2 col-sm-12 pl-5 p-2"><img src="/img/join.png" alt="">Join our community</div>
                    <div class="col-md-3 col-sm-12 pl-5 p-2"><img src="/img/grad.png" alt="">See career guide</div>
                    <div class="col-md-2 col-sm-12 pl-5 p-2"></div>
                </div>

            </div>
        </div>

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

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
