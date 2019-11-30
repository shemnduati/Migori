<?php

namespace App\Http\Controllers\API;

use App\Application;
use App\User;
use App\Ward;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StatsController extends Controller
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
        $county = User::where('id', auth()->user()->id)->value('county');
        $total_County_applicants = Application::where('county',$county)->where('bursary_type','County')->count();
        $total_scholarship_applicants = Application::where('county',$county)->where('bursary_type','scholarship')->count();
        $data = array(
            'total_County_applicants'=>$total_County_applicants,
            'total_scholarship_applicants'=>$total_scholarship_applicants,
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
    public function MyWards()
    {

       $county_id = User::where('id', Auth::user()->id)->value('county');
        $wards = Ward::where('county_id', $county_id)->get();
        $parent = array();
        foreach ( $wards as $ward){
            $name = $ward['name'];
            $total_app = Application::where('ward_id',$ward['id'])->where('bursary_type','County')->count();

            $child = array(
                'name'=>$name,
                'total' =>$total_app,
            );
            array_push($parent, $child);
        }


        return ['parent'=>$parent];
    }
    public function MyWardz()
    {

        $county_id = User::where('id', Auth::user()->id)->value('county');
        $wards = Ward::where('county_id', $county_id)->get();
        $parent = array();
        foreach ( $wards as $ward){
            $name = $ward['name'];
            $total_app = Application::where('ward_id',$ward['id'])->where('bursary_type','scholarship')->count();

            $child = array(
                'name'=>$name,
                'total' =>$total_app,
            );
            array_push($parent, $child);
        }


        return ['parent'=>$parent];
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
