<?php

namespace App\Http\Controllers;

use App\Application;
use App\Mail\sendContact;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    Public function contact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
            'phone'=>'required',
        ]);
        $email = User::where('role','admin')->value('email');
        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message'=>$request->message,
        );
        Mail::to($email)->send(new sendContact($data));
        return view('contact')->with('successMsg','Message sent Successfully');
    }

    public function status()
    {
        return view('status');
    }

    public function apply()
    {
        return view('apply');
    }

    public function scholarship()
    {
        return view('scholarship');
    }


    public function download()
    {
        return view('download');
    }

    public function student()
    {
        return view('welcome');
    }

    public function apps()
    {
        $apps= Application::where('status', 0)->where('user_id', Auth::user()->id)->count();
        return view('layout.dashboard')->with('apps', $apps);
    }
}
