<?php

namespace App\Http\Controllers\API;

use App\County;
use App\Institution;
use App\User;
use App\Ward;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Application;
use App\Family;
use App\MoreFamily;
use App\Geographical;
use Illuminate\Support\Facades\Auth;

class InformationController extends Controller
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
        // return User::latest()->paginate(10);
        $applications = Application::where('status', 0)->get();

        return ['applications'=>$applications];

    }

    public function getApplications()
    {
        // return User::latest()->paginate(10);
        $applications = Application::where('year', date('Y'))->whereIn('status', [1,3])->get();

        return ['applications'=>$applications];

    }

    public function getCountyBursary()
    {
        $county_id = User::where('id',Auth::user()->id)->value('county');
        $applications = Application::where('year', date('Y'))->where('county',$county_id)->get();

        return ['applications'=>$applications];

    }
    public function Applicants()
    {
        $county_id = User::where('id',Auth::user()->id)->value('county');
        $applications = Application::where('year', date('Y'))->where('county',$county_id)->where('status',3)->get();
        $parent = array();

        foreach ( $applications as $apps){
            $id = $apps['id'];
            $name = $apps['name'];
            $reg = $apps['reg_no'];
            $ward_name = Ward::where('id', $apps['ward_id'])->value('name');
            $institution = Institution::where('user_id',$apps['user_id'])->value('name');
            $amount = $apps['amount'];
            $date = $apps['updated_at'];
            $child=array(
                'id' =>$id,
                'name'=>$name,
                'ward'=>$ward_name,
                'amount'=>$amount,
                'reg'=>$reg,
                'date'=>$date,
                'institution' => $institution,
            );
            array_push($parent, $child);
        }
        return ['parent'=>$parent];
    }
    public function getbusary()
    {
        // return User::latest()->paginate(10);
        $ward_id = User::where('id',Auth::user()->id)->value('ward');
        $applications = Application::where('year', date('Y'))->where('ward_id',$ward_id)->get();

        return ['applications'=>$applications];

    }
    public function getMyWards()
    {
        $county_id = User::where('id',Auth::user()->id)->value('county');
        $wards = Ward::where('county_id',$county_id)->get();
        return['wards'=>$wards];
    }
    public function getMyCounty()
    {
        $county_id = User::where('id',Auth::user()->id)->value('county');
        $county = County::where('id',$county_id)->get();
        return['county'=>$county];
    }
    public function getWardsById($id)
    {
        if ($id==0) {
            $county_id = User::where('id',Auth::user()->id)->value('county');
            $applications = Application::where('year', date('Y'))->where('county',$county_id)->where('status',3)->get();
            $parent = array();

            foreach ( $applications as $apps){
                $id = $apps['id'];
                $name = $apps['name'];
                $reg = $apps['reg_no'];
                $ward_name = Ward::where('id', $apps['ward_id'])->value('name');
                $institution = Institution::where('user_id',$apps['user_id'])->value('name');
                $amount = $apps['amount'];
                $date = $apps['updated_at'];
                $child=array(
                    'id' =>$id,
                    'name'=>$name,
                    'ward'=>$ward_name,
                    'amount'=>$amount,
                    'reg'=>$reg,
                    'date'=>$date,
                    'institution' => $institution,
                );
                array_push($parent, $child);
            }
            return ['parent'=>$parent];
        }elseif($id != 0){

            $applications = Application::where('year', date('Y'))->where('ward_id',$id)->where('status',3)->get();
            $parent = array();

            foreach ( $applications as $apps){
                $id = $apps['id'];
                $name = $apps['name'];
                $reg = $apps['reg_no'];
                $ward_name = Ward::where('id', $apps['ward_id'])->value('name');
                $institution = Institution::where('user_id',$apps['user_id'])->value('name');
                $amount = $apps['amount'];
                $date = $apps['updated_at'];
                $child=array(
                    'id' =>$id,
                    'name'=>$name,
                    'ward'=>$ward_name,
                    'amount'=>$amount,
                    'reg'=>$reg,
                    'date'=>$date,
                    'institution' => $institution,
                );
                array_push($parent, $child);
            }
            return ['parent'=>$parent];
        }
    }
    public function getBursaryType($type){
       $ward_id = User::where('id',Auth::user()->id)->value('ward');
        $applications = Application::where('year', date('Y'))->where('ward_id',$ward_id)->where('bursary_type', $type)->get();

        return ['applications'=>$applications];
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
    public function recommend(Request $request, $applicationId)
    {
        $application = Application::findOrFail($applicationId);
        $application->recommendation = $request['recommendation'];
        $application->save();
    }

    public function award(Request $request, $applicationId)
    {
        $application = Application::findOrFail($applicationId);
        $application->amount = $request['amount'];
        $application->update();

        $appli = Application::findOrFail($applicationId);
        $appli->status = 3;
        $appli->update();

        $applicantId = Application::where('id', $applicationId)->value('user_id');
        $family = Family::where('user_id', $applicantId)->where('year', date('Y'))->get();
        foreach ($family as $fam) {
            $fami = Family::findOrFail($fam['id']);
            $fami->status=3;
            $fami->update();
        }

        $morefamily = MoreFamily::where('user_id', $applicantId)->where('year', date('Y'))->first();
        $more=MoreFamily::findOrFail($morefamily['id']);
        $more->status = 3;
        $more->update();

        $institution = Institution::where('user_id', $applicantId)->where('year', date('Y'))->first();
        $insti = Institution::findOrFail($institution['id']);
        $insti->status=3;
        $insti->update();

        $geographical = Geographical::where('user_id', $applicantId)->where('year', date('Y'))->first();
        $geo=Geographical::findOrFail($geographical['id']);
        $geo->status=3;
        $geo->update();
    }

    public function notAward(Request $request, $applicationId)
    {

        $appli = Application::findOrFail($applicationId);
        $appli->status = 2;
        $appli->update();

        $applicantId = Application::where('id', $applicationId)->value('user_id');
        $family = Family::where('user_id', $applicantId)->where('year', date('Y'))->get();
        foreach ($family as $fam) {
            $fami = Family::findOrFail($fam['id']);
            $fami->status=2;
            $fami->update();
        }

        $morefamily = MoreFamily::where('user_id', $applicantId)->where('year', date('Y'))->first();
        $more=MoreFamily::findOrFail($morefamily['id']);
        $more->status = 2;
        $more->update();

        $institution = Institution::where('user_id', $applicantId)->where('year', date('Y'))->first();
        $insti = Institution::findOrFail($institution['id']);
        $insti->status=2;
        $insti->update();

        $geographical = Geographical::where('user_id', $applicantId)->where('year', date('Y'))->first();
        $geo=Geographical::findOrFail($geographical['id']);
        $geo->status=2;
        $geo->update();
    }

    public function getType($id)
    {
        if ($id==1) {
            $applications = Application::where('year', date('Y'))->where('county', auth()->user()->county)->whereIn('status', [0,2,3])->get();

            return ['applications'=>$applications];
        }elseif ($id==2) {
            $applications = Application::where('status', 0)->where('year', date('Y'))->where('county', auth()->user()->county)->get();

            return ['applications'=>$applications];
        }elseif ($id==3) {
            $applications = Application::where('status', 3)->where('year', date('Y'))->where('county', auth()->user()->county)->get();

            return ['applications'=>$applications];
        }elseif ($id==4) {
            $applications = Application::where('status', 2)->where('year', date('Y'))->where('county', auth()->user()->county)->get();

            return ['applications'=>$applications];
        }
    }

    public function getstatus($id)
    {
        $ward_id = User::where('id',Auth::user()->id)->value('ward');
        if ($id==1) {
            $applications = Application::where('year', date('Y'))->where('ward_id',$ward_id)->get();

            return ['applications'=>$applications];
        }elseif ($id==2) {
            $applications = Application::where('status', 0)->where('year', date('Y'))->where('ward_id',$ward_id)->get();

            return ['applications'=>$applications];
        }elseif ($id==3) {
            $applications = Application::where('status', 1)->where('year', date('Y'))->where('ward_id',$ward_id)->get();

            return ['applications'=>$applications];
        }elseif ($id==4) {
            $applications = Application::where('status', 2)->where('year', date('Y'))->where('ward_id',$ward_id)->get();

            return ['applications'=>$applications];
        }
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
        $this->authorize('isAdmin');
        $user = User::findorFail($id);
        $this->validate($request, [
            'role' => 'required|string|max:191',
        ]);
//        $user->update($request->all());
        $user->role = $request['role'];
        $user->update();
        return ['message'=>'information updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('isAdmin');
        $user = User::findOrFail($id);
        $user->delete();
        return ['message'=> 'user deleted'];
    }
    public function search(){
        $ward_id = User::where('id',Auth::user()->id)->value('ward');
        if ($search = \Request::get('q')) {
            $bursary = Application::where('year', date('Y'))->where('ward_id',$ward_id)->where(function($query) use ($search){
                $query->where('name','LIKE',"%$search%")
                    ->orWhere('serial','LIKE',"%$search%");
            })->get();
        }else{
            $ward_id = User::where('id',Auth::user()->id)->value('ward');
            $applications = Application::where('year', date('Y'))->where('ward_id',$ward_id)->get();
            $bursary = ['applications'=>$applications];

        }
        return $bursary;
    }
}
