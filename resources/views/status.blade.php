@extends('layouts.app')

@section('content')
    <div class="grad col-md-12 pb-3">
        <div class="text-center pt-4 baza">
            <h3 class="font-weight-bold">BURSARY APPLICATION SYSTEM</h3>
        </div>


        <div class="text-center pt-2">
            <h3 class="font-weight-bolder big"><span class="b">B </span><span class="a">A </span><span
                        class="z">Z </span><span class="x">A</span></h3>
            <a href="/">
                <button class="btn btn-primary">
                    <i class="fa fa-hand-point-left"></i>
                    Back to Home
                </button>
            </a>
        </div>
    </div>
    <mystatus></mystatus>
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
@endsection