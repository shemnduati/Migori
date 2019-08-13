<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Application;
use App\Family;
use App\MoreFamily;
use App\Geographical;
use App\Institution;
use App\County;
use App\Ward;

class ApplicationController extends Controller
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

    public function getCounties()
    {
        $counties = County::all();

        return ['counties'=>$counties];
    }

    public function getWards()
    {
        $apps= Application::where('status', 0)->where('user_id', Auth::user()->id)->count();
        return view('layout.dashboard')->with('apps', $apps);

        $wards = Ward::all();

        return ['wards'=>$wards];
    }

    public function getCountyWards($countyId)
    {
        $wards = Ward::where('county_id', $countyId)->get();

        return ['wards'=>$wards];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $passport_name = "";
        $guardianId_name = "";
        $fatherId_name = "";
        $motherId_name = "";


        if ($request->passport) {
            $ext = explode('/', explode(':', substr($request->passport, 0, strpos($request->passport, ';')))[1])[1];

            if ($ext == 'pdf') {

            }elseif ($ext == 'png' || $ext == 'jpeg') {
              $passport_name = auth('api')->user()->id.time().'passport'.'.' . explode('/', explode(':', substr($request->passport, 0, strpos($request->passport, ';')))[1])[1];
              \Image::make($request->passport)->save(public_path('uploads/').$passport_name);
            }
        }

        if ($request->fatherId) {
            $ext = explode('/', explode(':', substr($request->fatherId, 0, strpos($request->fatherId, ';')))[1])[1];

            if ($ext == 'pdf') {
                $fatherId_name = auth('api')->user()->id.time().'fatherId'.'.' . explode('/', explode(':', substr($request->fatherId, 0, strpos($request->fatherId, ';')))[1])[1];
                $pdf_decoded = base64_decode ($request->fatherId);
                $File = file_put_contents($fatherId_name, $pdf_decoded);
                header('Content-Type: application/pdf');

                // $File->save(public_path('uploads/').$fatherId_name);
                move_uploaded_file($fatherId_name, public_path('uploads/').$fatherId_name);
            }elseif ($ext == 'png' || $ext == 'jpeg') {
              $fatherId_name = auth('api')->user()->id.time().'fatherId'.'.' . explode('/', explode(':', substr($request->fatherId, 0, strpos($request->fatherId, ';')))[1])[1];
              \Image::make($request->fatherId)->save(public_path('uploads/').$fatherId_name);
            }
        }

        if ($request->motherId) {
            $ext = explode('/', explode(':', substr($request->motherId, 0, strpos($request->motherId, ';')))[1])[1];

            if ($ext == 'pdf') {

            }elseif ($ext == 'png' || $ext == 'jpeg') {
              $motherId_name = auth('api')->user()->id.time().'motherId'.'.' . explode('/', explode(':', substr($request->motherId, 0, strpos($request->motherId, ';')))[1])[1];
              \Image::make($request->motherId)->save(public_path('uploads/').$motherId_name);
            }
        }

        if ($request->guardianId) {
            $ext = explode('/', explode(':', substr($request->guardianId, 0, strpos($request->guardianId, ';')))[1])[1];

            if ($ext == 'pdf') {

            }elseif ($ext == 'png' || $ext == 'jpeg') {
              $guardianId_name = auth('api')->user()->id.time().'guardianId'.'.' . explode('/', explode(':', substr($request->guardianId, 0, strpos($request->guardianId, ';')))[1])[1];
              \Image::make($request->guardianId)->save(public_path('uploads/').$guardianId_name);
            }
        }

         $user = auth('api')->user()->id;

         $application = new Application();
         $application->user_id = $user;
         $application->name = $request['name'];
         $application->passport = $passport_name;
         $application->email = $request['email'];
         $application->id_no = $request['idNo'];
         $application->reg_no = $request['regNo'];
         $application->bursary_type = $request['type'];
         $application->dob = $request['dob'];
         $application->gender = $request['gender'];
         $application->tel = $request['telephone'];

         $application->save();


         $father = new Family();
         $father->user_id = $user;
         $father->name = $request['fname'];
         $father->relationship = 'Father';
         $father->living = $request['fliving'];
         $father->occupation = $request['foccupation'];
         $father->income = $request['fincome'];
         $father->tel = $request['ftelephone'];
         $father->cert = $fatherId_name;

         $father->save();

         $mother = new Family();
         $mother->user_id = $user;
         $mother->name = $request['mname'];
         $mother->relationship = 'Mother';
         $mother->living = $request['mliving'];
         $mother->occupation = $request['moccupation'];
         $mother->income = $request['mincome'];
         $mother->tel = $request['mtelephone'];
         $mother->cert = $motherId_name;

         $mother->save();

         $guardian = new Family();
         $guardian->user_id = $user;
         $guardian->name = $request['gname'];
         $guardian->relationship = 'Guardian';
         $guardian->living = $request['gliving'];
         $guardian->occupation = $request['goccupation'];
         $guardian->income = $request['gincome'];
         $guardian->tel = $request['gtelephone'];
         $guardian->cert = $guardianId_name;

         $guardian->save();

         $more_family=new MoreFamily();
         $more_family->user_id = $user;
         $more_family->totalSiblings = $request['tSiblings'];
         $more_family->workingSiblings = $request['sWorking'];
         $more_family->schoolSiblings = $request['inSchool'];
         $more_family->pFees = $request['pFees'];
         $more_family->pFeesRelationship = $request['pRelationship'];

         $more_family->save();

         $geographical = new Geographical();
         $geographical->user_id = $user;
         $geographical->County = $request['county'];
         $geographical->Ward = $request['ward'];
         $geographical->Division = $request['division'];
         $geographical->Location = $request['location'];
         $geographical->Sublocation = $request['sublocation'];
         $geographical->Village = $request['village'];

         $geographical->save();

         $institution = new Institution();
         $institution->user_id = $user;
         $institution->name = $request['iname'];
         $institution->branch = $request['branch'];
         $institution->class = $request['class'];
         $institution->yearofstudy = $request['year'];
         $institution->fees = $request['payable'];
         $institution->amount_paid = $request['paid'];
         $institution->balance = $request['balance'];

         $institution->save();

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
