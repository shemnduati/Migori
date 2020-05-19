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
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    </head>
    <body>
        <div id="app">
            <section class="header">
                <section class="Navigation">
                    <nav class="navbar navbar-expand-md navbar-light bg-transparent">
                        <div class="container-fluid">
                            <img src="/img/favicon.jpeg" style="width: 50px; height: 50px" alt="">
                            <a class="navbar-brand font-weight-bolder pl-3" href="{{ url('/') }}">
                                {{ config('app.name', 'BAZA') }}
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">

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
                        <h3 class="text-center font-weight-bold">Our Motivation</h3>
                    </div>
                    <div class="col-md-12 mb-4">
                        <h4 class="text-center font-weight-bold">We're passionate about making our students grow</h4>
                    </div>
                    <div class="row no-padding container">
                        <div class="col-md-6">
                            <h4 class="text-center font-weight-bold">Informative Speech</h4>
                            <p class="text-center">I could tell you many things about radium and radioactivity and it would take a long time. But as we can not do that, I shall only give you a short account of my early work about radium. Radium is no more a baby, it is more than twenty years old, but the conditions of the discovery were somewhat peculiar, and so it is always of interest to remember them and to explain them.We must go back to the year 1897. Professor Curie and I worked at that time in the laboratory of the school of Physics and Chemistry where Professor Curie held his lectures. </p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-center">I was engaged in some work on uranium rays which had been discovered two years before by Professor Becquerel.***I spent some time in studying the way of making good measurements of the uranium rays, and then I wanted to know if there were other elements, giving out rays of the same kind. So I took up a work about all known elements, and their compounds and found that uranium compounds are active and also all thorium compounds, but other elements were not found active, nor were their compounds. As for the uranium and thorium compounds, I found that they were active in proportion to their uranium or thorium content.</p>
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
        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
