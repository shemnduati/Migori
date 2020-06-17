<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MCG Migori County Government</title>
    <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.jpeg"/>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <!-- ElegantFonts CSS -->
    <link rel="stylesheet" href="{{ asset('css/elegant-fonts.css') }}">

    <!-- themify-icons CSS -->
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>

        .btn {
            background-color: forestgreen;
            color: #fff;
            font-weight: 700;
        }

        i {
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="hero-content" style="margin-bottom: 10%;">

    <div class="container pt-5">
        <div class="row justify-content-center pt-5">
            <div class="col-md-8 pt-5">
                <div class="card">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">

                            <a class="nav-link active" href="/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register">Register</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                            <div class="card-body col-md-7 mr-auto ml-auto">
                                <form method="POST" class="col-md-12" action="{{ route('login') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="email">Email <span style="color: red">*</span></label>
                                        <div class="input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                                            </div>
                                            <input id="email" type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email" value="{{ old('email') }}" placeholder="Enter Email"
                                                   required autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password">Password <span style="color: red">*</span></label>
                                        <div class="input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-unlock"></i></div>
                                            </div>
                                            <input id="pwd" type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password" required autocomplete="current-password"
                                                   placeholder="Password">
                                            <div class="input-group-text"><i class="fas fa-eye-slash" id="eye"></i>
                                            </div>
                                            @error('password')

                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>

                                            @enderror
                                            <i class="glyphicon glyphicon-eye-open form-control-feedback"></i>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label logo2" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="">
                                            <button type="submit" class="btn btn px-5">
                                                {{ __('Login') }}
                                            </button>

                                            @if (Route::has('password.request'))
                                                <a class="pl-2 state btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                            <div class="card-body ">
                                <form method="POST" class="col-md-12 " action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <div class="col-md-5 input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                                            </div>
                                            <input id="fname" type="text"
                                                   class="form-control @error('fname') is-invalid @enderror"
                                                   name="fname" value="{{ old('fname') }}" required autocomplete="name"
                                                   autofocus placeholder="First name">
                                            @error('fname')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-5 input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                                            </div>
                                            <input id="lname" type="text"
                                                   class="form-control @error('lname') is-invalid @enderror"
                                                   name="lname" value="{{ old('lname') }}" required autocomplete="name"
                                                   autofocus placeholder="last name">
                                            @error('lname')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-5 input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                                            </div>
                                            <input id="email" type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email" value="{{ old('email') }}" placeholder="Enter Email"
                                                   required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-5 input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-id-card-alt"></i></div>
                                            </div>
                                            <input id="ID" type="number"
                                                   class="form-control @error('ID') is-invalid @enderror" name="ID"
                                                   value="{{ old('ID') }}" placeholder="ID Number/Birth certificate"
                                                   required>

                                            @error('ID')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-5 input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                            </div>
                                            <input id="phone" type="tel"
                                                   class="form-control @error('phone') is-invalid @enderror"
                                                   name="phone" value="{{ old('phone') }}" placeholder="0700000000"
                                                   required autocomplete="phone">

                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-5 input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-map-marker-alt"></i>
                                                </div>
                                            </div>
                                            <input id="place" type="text"
                                                   class="form-control @error('place') is-invalid @enderror"
                                                   name="place" value="{{ old('place') }}"
                                                   placeholder="place of residence" required>

                                            @error('place')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-5 input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-unlock"></i></div>
                                            </div>
                                            <input id="password" type="password" placeholder="Password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password" required autocomplete="new-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-5 input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-unlock"></i></div>
                                            </div>
                                            <input id="password-confirm" placeholder="Confirm Password" type="password"
                                                   class="form-control" name="password_confirmation" required
                                                   autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-10">
                                            <div class="form-check">
                                                <input class="form-check-input @error('terms') is-invalid @enderror"
                                                       type="checkbox" name="terms" id="terms" value="1">

                                                <label class="form-check-label logo2" for="terms">
                                                    <a class="pl-2 state btn-link" href="{{ route('privacy') }}">
                                                        {{ __('Agree with the terms and conditions') }}
                                                    </a>
                                                </label>
                                                @error('terms')
                                                <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-2">
                                            <button type="submit" class="btn btn px-5">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    var pwd = document.getElementById('pwd');
    var eye = document.getElementById('eye');


    eye.addEventListener('click', togglepass);

    function togglepass() {

        eye.classList.toggle('active');

        (pwd.type == 'password') ? pwd.type = 'text' : pwd.type = 'password';
    }
</script>

</body>
</html>
