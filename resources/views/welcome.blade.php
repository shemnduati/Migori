@extends('layouts.main')

@include('layouts.carousel')

@section('content')

    <section style="font-family: 'Raleway', sans-serif;" class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 align-content-lg-stretch">
                    <header class="heading">
                        <h2 class="entry-title">About B.A.S.A.P</h2>

                        <p>Migori County Government is committed to provide scholarships and bursaries to deserving students in the county. The Scholarships are available to Secondary school, College and University students in the county.</p>
                    </header><!-- .heading -->

                    <header class="heading">
                        <h2 class="entry-title">Eligibility</h2>

                        <p>
                            For one to qualify for the scholarships and bursaries for Migori county, must be of the following:

                            <ul class="p-0 m-0 green-ticked">
                                <li>Applicant must be residents of Migori county.</li>
                                <li>Candidates must have admission/calling letter for secondary school or college and university.</li>
                                <li>Excellent academic performance.</li>
                                <li>Evidence of being in needy.</li>
                            </ul><!-- .green-ticked -->
                        </p>
                    </header><!-- .heading -->

                </div><!-- .col -->


                <div class="col-12 col-lg-6 flex align-content-center mt-5 mt-lg-0">
                    <div class="ezuca-video position-relative">
                        <div class="video-play-btn position-absolute">
                            {{-- <img src="images/happy.jpg" alt=""> --}}
                        </div><!-- .video-play-btn -->

                        <img src="images/happy.jpg" alt="">
                    </div><!-- .ezuca-video -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </section><!-- .about-section -->



    <section class="featured-courses vertical-column courses-wrap">
        <div class="container" style="font-family: 'Raleway', sans-serif;">
            <h3 class="headingHome">How to apply</h3>
            <div class="steps">
                <div class="step">
                    <div>
                        <p class="CircleBorder"> 1 </p>
                    </div>
                    <div class="stepDescription">
                        <span>Step 1 (Registration)</span>
                        <span>Register to our online application system.Fill in the registration form and submit it.</span>
                    </div>
                </div>
                <div class="step">
                    <div>
                        <p class="CircleBorder"> 2 </p>
                    </div>
                    <div class="stepDescription">
                        <span>Step 2 (Verification)</span>
                        <span>Verification email will be send to your email.verify your email by clicking the verification button.</span>
                    </div>
                </div>
                <div class="step">
                    <div>
                        <p class="CircleBorder"> 3 </p>
                    </div>
                    <div class="stepDescription">
                        <span>Step 3 (Application)</span>
                        <span>To apply, click on scholarship or bursary button.Fill in the application form by providing the required details.
                            Ensure that you have provided the correct details then submit the application.
                        </span>
                    </div>
                </div>
                <div class="step">
                    <div>
                        <p class="CircleBorder"> 4 </p>
                    </div>
                    <div class="stepDescription">
                        <span>Step 4 (Processing)</span>
                        <span>Your application will go through various stages of verification.County staff will counter check all
                            the information provided then verify your application or decline if the information provided is wrong.
                        </span>
                    </div>
                </div>
                <div class="step">
                    <div>
                        <p class="CircleBorder"> 5 </p>
                    </div>
                    <div class="stepDescription">
                        <span>Step 5 (Status)</span>
                        <span>Student can follow up the application status of bursary/scholarship on their dashboard.read more
                            Login into your account,then on the dropdown where your name appears on the navigation tab, select my profile.
                            Here you can see the application status of your bursary/scholarship.
                        </span>
                    </div>
                </div>
                <div class="step">
                    <div>
                        <p class="CircleBorder"> 6 </p>
                    </div>
                    <div class="stepDescription">
                        <span>Awarded</span>
                        <span>You will receive an email notification when your bursary/scholarship application is approved.
                            You can then pick the awarded bursary/scholarship cheque from county offices or have it sent to the school directly.
                        </span>
                    </div>
                </div>
            </div>
        </div><!-- .container -->
    </section><!-- .courses-wrap -->


    @endsection
