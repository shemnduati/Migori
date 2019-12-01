<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    protected function redirectTo( ) {
    if (Auth::check() && Auth::user()->role == 'admin') {
        return('/dashboard');
    }
    elseif (Auth::check() && Auth::user()->role == 'student') {
        return('/student');
    } elseif (Auth::check() && Auth::user()->role == 'sub-admin') {
        return('/dashboard');
    } elseif (Auth::check() && Auth::user()->role == 'sub-official') {
        return('/dashboard');
    }elseif (Auth::check() && Auth::user()->role == 'official') {
        return('/dashboard');
    }elseif (Auth::check() && Auth::user()->role == 'sub-official') {
        return('/dashboard');
    }

}


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
