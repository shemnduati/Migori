<?php

namespace App\Http\Controllers\API;

use App\Application;
use App\User;
use App\Ward;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        //
    }

    public function getMyWards()
    {
        if (auth()->user()->role == "official") {
            return Ward::where('county_id', auth()->user()->county)->get();
        }
    }

    public function getByWard($id)
    {
        if (auth()->user()->role == "official") {
            $county_id = User::where('id', Auth::user()->id)->value('county');
            $applications = Application::latest()->where('year', date('Y'))->where('bursary_type','County')->where('ward_id', $id)->where('status', 1)->where('county', $county_id)->get();

            return ['applications' => $applications];
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
