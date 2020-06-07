<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
     protected $redirectTo = '/student';

    // protected function redirectTo( )
    // {
    //     if (Auth::check() && Auth::user()->role == 'admin') {
    //         return ('/home');
    //     } elseif (Auth::check() && Auth::user()->role == 'student') {
    //         return ('/email/verify');
    //     }
    // }
//    protected function redirectTo( )
//    {
//        if (Auth::check() && Auth::user()->role == 'admin') {
//            return ('/home');
//        } elseif (Auth::check() && Auth::user()->role == 'student') {
//            return ('/student');
//        }
//    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'ID' => ['required', 'integer'],
            'place' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['fname'],
            'last_name' => $data['lname'],
            'ID_number' => $data['ID'],
            'phone' => $data['phone'],
            'place' => $data['place'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
