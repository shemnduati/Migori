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
        $total_student = User::where('role', 'student')->count();
        $total_subadmin = User::where('role', 'sub-admin')->count();
        $total_official = User::where('role', 'official')->count();
        $total_subofficial = User::where('role', 'sub-official')->count();
        $total_apllication = Application::where('bursary_type', 'County')->count();
        $total_awarded = Application::where('recommendation', '!=', '')->where('bursary_type', 'County')->count();
        $total_county = Application::where('bursary_type', 'scholarship')->count();
        $totalAwarded = Application::where('recommendation', '!=', '')->where('approved', 3)->where('bursary_type', 'scholarship')->count();
        $data = array(
            'total_student' => $total_student,
            'total_subadmin' => $total_subadmin,
            'total_official'=> $total_official,
            'total_subofficial'=> $total_subofficial,
            'total_application' => $total_apllication,
            'total_county' => $total_county,
            'total_awarded' => $total_awarded,
            'totalAwarded' => $totalAwarded
        );
        return ['data' => $data];

    }

    public function sub()
    {
        if (auth()->user()->role == "sub-admin") {
            $total_student = User::where('role', 'student')->count();
            $total_subadmin = User::where('role', 'sub-admin')->count();
            $ward_id = User::where('id', Auth::user()->id)->value('ward');
            $total_apllication = Application::where('ward_id', $ward_id)->where('year', date('Y'))->where('bursary_type', 'County')->count();
            $total_awarded = Application::where('recommendation', '!=', '')->where('year', date('Y'))->where('bursary_type', 'County')->count();
            $total_county = Application::where('ward_id', auth()->user()->ward)->where('bursary_type', 'scholarship')->count();
            $totalAwarded = Application::where('ward_id', auth()->user()->ward)->where('recommendation', '!=', '')->where('bursary_type', 'scholarship')->count();
            $budget = (int)Budget::where('ward_id', auth()->user()->ward)->where('year', date('Y'))->value('amount');
            $remaining = (int)Budget::where('ward_id', auth()->user()->ward)->where('year', date('Y'))->value('remaining');
            $data = array(
                'total_student' => $total_student,
                'total_subadmin' => $total_subadmin,
                'total_application' => $total_apllication,
                'total_county' => $total_county,
                'total_awarded' => $total_awarded,
                'totalAwarded' => $totalAwarded,
                'budget' => $budget,
                'remaining' => $remaining,
                'totalReco' => Application::where('ward_id', $ward_id)->where('year', date('Y'))->where('bursary_type', 'County')->where('recommendation', '!=', '')->count()
            );
            return ['data' => $data];
        }

        if (auth()->user()->role == "official") {
            $data = array(
                'totalAwarded' => Application::where('county', auth()->user()->county)->where('year', date('Y'))->where('bursary_type', 'County')->where('status', 3)->count(),
                'scholar' => Application::where('county', auth()->user()->county)->where('year', date('Y'))->where('bursary_type', 'scholarship')->where('approved', 3)->count()
            );
            return ['data' => $data];
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
