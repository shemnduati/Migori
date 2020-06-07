@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumbs">
                <ul class="flex flex-wrap align-items-center p-0 m-0">
                    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                    <li>F.A.Qs</li>
                </ul>
            </div><!-- .breadcrumbs -->
        </div><!-- .col -->
    </div><!-- .row -->

    <div class="row justify-content-between">

        <div class="col-md-12 col-lg-6">
            <div class="contact-form">
                <h3>F.A.Qs</h3>

                <ol>
                    <li>

                        <div class="card">

                            <div class="card card-header">
                            <p>
                                <a type="link" class="btn btn-link" data-toggle="collapse" data-target="#demo" style="border-color: transparent;">How do I create an account?</a>
                            </p>

                            </div>

                            <div class="card card-body collapse" id="demo">

                                It’s pretty simple. Click here or click the register link on the navigation bar. Once you sign up, you will be required to activate your account before you can access county services. 

                            </div>

                        </div>
                        
                    </li>

                    <li>

                        <div class="card" style="margin-top: 5%;">

                            <div class="card card-header">
                            <p>
                                <a type="link" class="btn btn-link" data-toggle="collapse" data-target="#demo1" style="border-color: transparent;">
                                    If I forget my password, how can I <br> recover it?
                                </a>
                            </p>

                            </div>

                            <div class="card card-body collapse" id="demo1">

                                No worries. Simply click here to reset your password. Once done check your email for further reset instructions. Note that this link can also be accessed from the Login interface. 

                            </div>

                        </div>
                        
                    </li>

                    <li>

                        <div class="card" style="margin-top: 5%;">

                            <div class="card card-header">
                            <p>
                                <a type="link" class="btn btn-link" data-toggle="collapse" data-target="#demo2" style="border-color: transparent;">
                                    How do I get notified?
                                </a>
                            </p>

                            </div>

                            <div class="card card-body collapse" id="demo2">

                                Email is the primary notification channel. All-important notifications will be channeled to the email used during signup. 

                            </div>

                        </div>
                        
                    </li>

                   
                </ol>        
             
            </div><!-- .contact-form -->
        </div><!-- .col -->

        <div class="col-md-12 col-lg-6">
            <div class="contact-form">
                <h3>.</h3>

                <ol start="4">
                    <li>

                        <div class="card">

                            <div class="card card-header">
                            <p>
                                <a type="link" class="btn btn-link" data-toggle="collapse" data-target="#demo6" style="border-color: transparent;">
                                    Who Is Eligible To Apply For Scholarship <br> Or Bursary?
                                </a>
                            </p>

                            </div>

                            <div class="card card-body collapse" id="demo6">

                                <ul class="p-0 m-0 green-ticked">
                                    <li>Needy students within the county?</li>
                                    <li>Needy Student learning in different institutions outside the county but are residents of Migori county.</li>
                                    <li>Needy Candidates with admission/calling letter for secondary school or college and university.</li>
                                </ul>

                            </div>

                        </div>

                    </li>

                    <li>

                        <div class="card" style="margin-top: 5%;">

                            <div class="card card-header">
                            <p>
                                <a type="link" class="btn btn-link" data-toggle="collapse" data-target="#demo7" style="border-color: transparent;">
                                    When Is The Scholarship/Bursary <br> Application Open For Applicants?
                                </a>
                            </p>

                            </div>

                            <div class="card card-body collapse" id="demo7">

                                The county government will make announcements of when students can start apply for scholarship or county bursaries. Always check on the county. Government website.

                            </div>

                        </div>


                    </li>

                    <li>


                        <div class="card" style="margin-top: 5%;">

                            <div class="card card-header">
                            <p>
                                <a type="link" class="btn btn-link" data-toggle="collapse" data-target="#demo8" style="border-color: transparent;">
                                    If approved where do I get my <br> bursary/scholarship cheque?
                                </a>
                            </p>

                            </div>

                            <div class="card card-body collapse" id="demo8">

                                You will receive an email notification when your bursary/scholarship application isapproved. You can then pick the awarded bursary/scholarship cheque from county offices or have it sent to the school directly.

                            </div>

                        </div>

                    </li>
                    
                </ol>        
             
            </div><!-- .contact-form -->
        </div><!-- .col -->




    </div><!-- .row -->
</div><!-- .container -->


    
@endsection