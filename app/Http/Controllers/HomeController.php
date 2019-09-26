<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;

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

    public function apply()
    {
        return view('apply');
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
