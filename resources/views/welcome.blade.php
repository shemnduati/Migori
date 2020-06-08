@extends('layouts.main')

@include('layouts.carousel')

@section('content')

    <section class="about-section">
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
                            <a href="#"><img src="images/icon1.png" alt="" height="230px"></a>
                            <h2>Step 1(Registration)</h2>
                        </figure><!-- .course-thumbnail -->

                        <div class="course-content-wrap">
                            <header class="entry-header">

                                <h4>
                                    <p class="entry-title">
                                        Obtain Bursaries/Scholarships application Forms  <a data-toggle="collapse" href="#collapseExample" aria-controls="collapseExample" style="color: green"> read more</a>

                                        <div class="collapse" id="collapseExample" class="notbold" style="">
    
                                            <h5> from the Department of Education, Youth, Sports, Cultural and Social Services or download and print out form from the Migori county government website. </h5>
                                            
                                        </div>
                                    </p>
                                </h4>

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
                            <a href="#"><img src="images/icon2.png" alt="" height="230px"></a>
                            <h2>Step 2</h2>
                        </figure><!-- .course-thumbnail -->

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <h2 class="entry-title"><p>Fill in the Forms accurately in capital letters.</p></h2>

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
                            <a href="#"><img src="images/icon3.png" alt="" height="230px"></a>
                            <h2>Step 3</h2>
                        </figure><!-- .course-thumbnail -->
                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <h2 class="entry-title"><p>Have the Forms signed and stamped by the <a data-toggle="collapse" href="#collapse1" aria-controls="collapseExample" style="color: green">read more</a></p></h2>

                                <div class="collapse" id="collapse1" class="notbold" style="">
                                    <h5> Ensure that you have provided the correct details then submit the application. </h5>
                                </div>
                                {{-- <div class="entry-meta flex align-items-center">
                                    <div class="course-author"><a href="#">Ms. Lucius</a></div>

                                    <div class="course-date">Dec 18, 2018</div>
                                </div><!-- .course-date --> --}}
                            </header><!-- .entry-header -->

                           
                        </div><!-- .course-content-wrap -->
                    </div><!-- .course-content -->
                </div><!-- .col -->

                <div class="col-12 col-md-6 col-lg-4 px-25">
                    <div class="course-content">
                        <figure class="course-thumbnail">
                            <a href="#"><img src="images/icon4.png" alt="" height="230px"></a>
                            <h2>Step 4</h2>
                        </figure><!-- .course-thumbnail -->
                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <h2 class="entry-title"><p>Attach all relevant documents as required.</p></h2>

                            </header><!-- .entry-header -->

                        </div><!-- .course-content-wrap -->
                    </div><!-- .course-content -->
                </div><!-- .col -->

                <div class="col-12 col-md-6 col-lg-4 px-25">
                    <div class="course-content">
                        <figure class="course-thumbnail">
                            <a href="#"><img src="images/icon5.png" alt="" height="230px"></a>
                            <h2>Step 5</h2>
                        </figure><!-- .course-thumbnail -->

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <h2 class="entry-title"><p>Return the Duly filled Forms to the <a data-toggle="collapse" href="#collapse2" aria-controls="collapseExample" style="color: green">read more</a></p></h2>

                                <div class="collapse" id="collapse1" class="notbold" style="">
                                    <h5>Login into your account,then on the dropdown where your name appears on the navigation tab, select my profile.Here you can see the application status of your bursary/scholarship. </h5>
                                </div>

                                
                            </header><!-- .entry-header -->

                        </div><!-- .course-content-wrap -->
                    </div><!-- .course-content -->
                </div><!-- .col -->

                <div class="col-12 col-md-6 col-lg-4 px-25">
                    <div class="course-content">
                        <figure class="course-thumbnail">
                            <a href="#"><img src="images/icon6.png" alt="" height="230px"></a>
                            <h2>Step 6</h2>
                        </figure><!-- .course-thumbnail -->
                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <h2 class="entry-title"><p>For more information or clarification about  <a data-toggle="collapse" href="#collapse2" aria-controls="collapse11" style="color: green">read more</p></h2>

                                <div class="collapse" id="collapse11" class="notbold" style="">
    
                                    <h5> visit Migori Government website ebursary section </h5>
    
                                    
                                </div>

                                
                            </header><!-- .entry-header -->

                        </div><!-- .course-content-wrap -->
                    </div><!-- .course-content -->
                </div><!-- .col -->

                
                <div class="col-12 px-25 flex justify-content-center">
                    {{-- <a class="btn" href="#">view all courses</a> --}}
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </section><!-- .courses-wrap -->


    @endsection
