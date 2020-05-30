<div id="app">
    <section class="header">
        <section class="Navigation">
            <nav class="navbar navbar-expand-md navbar-light bg-transparent">
                <div class="container-fluid">
                    <img src="/img/mainlogo.jpg" style="width: 100px; height: 100px" alt="">
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
                <img class="img img-fluid" src="images/book.jpg" alt="" style="height: 360px; width: 550px">
            </div>
            <div class="col-md-6 ">
                <div class="row">
                    <div style="border:none !important">                        
                    <div class="pt-5">
                            <p class="text-center text-dark no-padding">Migori County Government is committed to provide scholarships and bursaries to deserving
students in the county.</p>
                            <p class="text-center text-dark no-padding">The Scholarships are available to Secondary school, College and University students in
the county.</p>
                            <h3 class="text-center text-dark">Eligibility</h3>
                            <p class="text-center text-dark no-padding">For one to qualify for the scholarships and bursaries for Migori county, must be of the
following;</p>
                            <ul class="mf-ul">
                                <li>Applicant must be residents of Migori county</li>
                                <li>Candidates must have admission/calling letter for secondary school or college and
university.</li>
                                <li>Excellent academic performance</li>
                                <li>Evidence of being in needy</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="story pb-3">
        <div class="row no-padding justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center font-weight-bold">How To Apply</h3>
            </div>
            <div class="row no-padding container">
                <div class="col-md-1"> </div>
                <div class="col-md-10">
                <ol class="mf-ul">
                    <li>Obtain Bursaries/Scholarships application Forms from the Department of Education, Youth, Sports, Cultural and Social Services or download and print out form from the Migori county government website.</li>
                    <li>Fill the Forms accurately in capital letters</li>
                    <li>Have the Forms signed and stamped by the relevant authorities.</li>
                    <li>Attach all relevant documents as required.</li>     
                    <li>Return the Duly filled Forms to the Department of Education and wait for feedback.</li>                     
                </ol>
                </div>
                <div class="col-md-1"> </div>
                <div class="col-md-12">
                    <p class="text-center font-weight-bold">For more information or for clarification visit <span style="color:green;"> Migori Government website ebursary section</span></p>
                    <p style="text-align:center"> <a href="http://ebursary.migori.go.ke/login" class="text-center font-weight-bold"> APPLY NOW HERE </a> </p>

                </div>
            </div>

        </div>
    </section>
    <section class="study pt-5">
        <div>
            <img class="img-fluid img" src="images/study.jpg" alt="" style="width: 100%">

            <p class="lead pt-3 text-center">“When you want something, all the universe conspires in helping you achieve it”</p>

            <div class="container row">
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
