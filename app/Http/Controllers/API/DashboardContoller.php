<?php

namespace App\Http\Controllers\API;

use App\Application;
use App\Budget;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardContoller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_student = User::where('role','student')->count();
        $total_subadmin = User::where('role','sub-admin')->count();
        $total_apllication = Application::all()->count();
        $total_awarded = Application::where('status','1')->count();
        $data = array(
            'total_student'=>$total_student,
            'total_subadmin'=>$total_subadmin,
            'total_application'=> $total_apllication,
            'total_awarded'=>$total_awarded,
        );
        return['data'=>$data];

    }
    public function sub()
    {
        $total_student = User::where('role','student')->count();
        $total_subadmin = User::where('role','sub-admin')->count();
        $ward_id = User::where('id',Auth::user()->id)->value('ward');
        $total_apllication = Application::where('ward_id',$ward_id)->count();
        $total_recommended =  Application::where('ward_id',$ward_id)->where('status',1)->count();
        $total_awarded = Application::where('ward_id',$ward_id)->where('status',3)->count();
        $budget = (int) Budget::where('ward_id', auth()->user()->ward)->where('year', date('Y'))->value('amount');
        $remaining = (int) Budget::where('ward_id', auth()->user()->ward)->where('year', date('Y'))->value('remaining');
        $data = array(
            'total_student'=>$total_student,
            'total_subadmin'=>$total_subadmin,
            'total_application'=> $total_apllication,
            'total_awarded'=>$total_awarded,
            'total_recommended'=>$total_recommended,
            'budget'=>$budget,
            'remaining'=>$remaining
        );
        return['data'=>$data];

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
