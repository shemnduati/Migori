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

    public function sortScholarship($id){
        if (auth()->user()->role == "official") {
           if ($id == 0){
               $county_id = User::where('id', Auth::user()->id)->value('county');
               $applications = Application::where('year', date('Y'))->where('county', $county_id)->where('bursary_type','scholarship')->where('status', 3)->get();
               $parent = array();

               foreach ($applications as $apps) {
                   $id = $apps['id'];
                   $fname = $apps['firstName'];
                   $Mname = $apps['middleName'];
                   $Lname = $apps['lastName'];
                   $indexNo = $apps['indexNo'];
                   $ward_name = Ward::where('id', $apps['ward_id'])->value('name');
                   $date = $apps['updated_at'];
                   $child = array(
                       'id' => $id,
                       'fname' => $fname,
                       'Mname' => $Mname,
                       'Lname' => $Lname,
                       'ward' => $ward_name,
                       'indexNo' => $indexNo,
                       'date' => $date,
                       'school' => $apps['secSchoolName'],
                       'reco' => $apps['recommendation']
                   );
                   array_push($parent, $child);
               }
               return ['parent' => $parent];
           }else{
               $county_id = User::where('id', Auth::user()->id)->value('county');
               $applications = Application::where('year', date('Y'))->where('county', $county_id)->where('ward_id', $id)->where('bursary_type','scholarship')->where('status', 3)->get();
               $parent = array();

               foreach ($applications as $apps) {
                   $id = $apps['id'];
                   $fname = $apps['firstName'];
                   $Mname = $apps['middleName'];
                   $Lname = $apps['lastName'];
                   $indexNo = $apps['indexNo'];
                   $ward_name = Ward::where('id', $apps['ward_id'])->value('name');
                   $date = $apps['updated_at'];
                   $child = array(
                       'id' => $id,
                       'fname' => $fname,
                       'Mname' => $Mname,
                       'Lname' => $Lname,
                       'ward' => $ward_name,
                       'indexNo' => $indexNo,
                       'date' => $date,
                       'school' => $apps['secSchoolName'],
                       'reco' => $apps['recommendation']
                   );
                   array_push($parent, $child);
               }
               return ['parent' => $parent];
           }
        }
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

    public function getByWardScholarship($id){
        if (auth()->user()->role == "official") {
            return Application::where('bursary_type', "scholarship")->where('year', date('Y'))->where('status', 1)->where('county', auth()->user()->county)->where('ward_id', $id)->latest()->paginate(10);
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

    public function wardName($id)
    {
        return Ward::where('id', $id)->value('name');
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
