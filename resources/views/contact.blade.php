@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumbs">
                <ul class="flex flex-wrap align-items-center p-0 m-0">
                    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                    <li>Contact</li>
                </ul>
            </div><!-- .breadcrumbs -->
        </div><!-- .col -->
    </div><!-- .row -->

    <div class="row justify-content-between">

        <div class="col-12 col-lg-6">
            <div class="contact-form">
                <h3>Get In Touch</h3>
                @if(!empty($successMsg))
                    <div class="alert alert-success"> {{ $successMsg }}</div>
                @endif
                <form id="contactForm" method="POST"action="{{ url('/contact') }}" name="sentMessage" enctype="multipart/form-data" novalidate="novalidate">
                    {{ csrf_field() }}
                    <div class="row align-items-stretch mb-12">
                        <div class="col-md-12">

                            <div class="form-group mb-md-0">
                                <input class="form-control" id="name" type="text"  name="name" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name." />
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-md-0">
                                <input class="form-control" id="email"  name="email" type="email" placeholder="Your Email*" required="required" data-validation-required-message="Please enter your email address." />
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-md-0">
                                <input class="form-control" id="phone" type="tel"  name="phone" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number." />
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="col-md-12 mb-md-0">
                            <div class="form-group form-group-textarea mb-md-0">
                                <textarea class="form-control"  name="message" id="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message." rows="8"></textarea>
                                @if ($errors->has('message'))
                                    <span class="text-danger">{{ $errors->first('message') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div id="success"></div>
                        <button class="btn btn-success btn-xl text-uppercase" id="sendMessageButton" type="submit">Send Message</button>
                    </div>
                </form>
            </div><!-- .contact-form -->
        </div><!-- .col -->

        <div class="col-12 col-lg-6">
            <div class="contact-info">
                <h3>Contact Information</h3>

                <p>For futher enqueries, you can always get to us through : </p>

                <ul class="p-0 m-0">
                    <li><span>Location:</span>Migori County Government, Migori Town, Migori Kenya</li>
                    <li><span>Email:</span><a href="#">enquiries@migori.com</a></li>
                    <li><span>Phone:</span><a href="#">(203) 123-6666</a></li>
                </ul>
            </div><!-- .contact-info -->
        </div><!-- .col -->
    </div><!-- .row -->
</div><!-- .container -->


@endsection
