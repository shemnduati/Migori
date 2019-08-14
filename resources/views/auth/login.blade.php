<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Baza</title>
    <link rel="shortcut icon" type="image/x-icon" href="/img/logo.jpg"/>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body{
              background-image: linear-gradient(to right, #ffffe2 , #ffff9f, #ffffe2);
        }
        .btn{
                background-color: #31849b;
                color: #fff;
                font-weight: 700;
            }
        .logo2{
                color: #7030a0;
                font-weight: 700;
            }
        .state{
                color: #1db5b5;
            }    
    </style>
</head>
<body>
<div class="container pt-5">
    <div class="row justify-content-center pt-5">
        <div class="col-md-4 pt-5">
            <div class="card">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                      <div class="card-body">
                          <form method="POST" class="col-md-12" action="{{ route('login') }}">
                              @csrf

                              <div class="form-group row">
                                  
                                  <div class="input-group mb-2 mr-sm-2">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                                      </div>
                                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email" required autocomplete="email" autofocus>

                                      @error('email')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group row">
                                  
                                  <div class="input-group mb-2 mr-sm-2">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-unlock"></i></div>
                                      </div>
                                      <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                      @error('password')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <div class="">
                                      <div class="form-check">
                                          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

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
                      <div class="card-body">
                          <form method="POST" class="col-md-12" action="{{ route('register') }}">
                              @csrf

                              <div class="form-group row">
                                  
                                  <div class="input-group mb-2 mr-sm-2">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                                      </div>
                                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Username">
                                      @error('name')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                              </div>

                              <div class="form-group row">
                                  
                                  <div class="input-group mb-2 mr-sm-2">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                                      </div>
                                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email" required autocomplete="email">

                                      @error('email')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group row">
                                  
                                  <div class="input-group mb-2 mr-sm-2">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-unlock"></i></div>
                                      </div>
                                      <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                      @error('password')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group row">
                                  
                                  <div class="input-group mb-2 mr-sm-2">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-unlock"></i></div>
                                      </div>
                                      <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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

</body>
</html>
