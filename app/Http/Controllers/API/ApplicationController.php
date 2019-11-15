<?php

namespace App\Http\Controllers\API;

use App\Mail\BursaryEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Application;
use App\Family;
use App\MoreFamily;
use App\Geographical;
use App\Institution;
use App\County;
use App\Ward;
use App\User;
use Hashids\Hashids;
use Auth;
use Illuminate\Support\Facades\Mail;

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

        return ['counties' => $counties];
    }

    public function getWards()
    {
        $wards = Ward::all();

        return ['wards' => $wards];
    }

    public function getCountyWards($countyId)
    {
        $wards = Ward::where('county_id', $countyId)->get();

        return ['wards' => $wards];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'year' => 'required|min:1|max:7',
            'type' => 'required',
            'name' => 'required|string',
            'dob' => 'required|date',
            'email' => 'required|email',
            'gender' => 'required',
            'telephone' => 'required',
            'regNo' => 'required',
            'class' => 'required',
            'idNo' => 'required',
            'fname' => 'required|string',
            'fliving' => 'required',
            'foccupation' => 'required|string',
            'mname' => 'required|string',
            'mliving' => 'required',
            'moccupation' => 'required|string',
            'gname' => 'required|string',
            'gliving' => 'required',
            'goccupation' => 'required|string',
            'fincome' => 'required',
            'mincome' => 'required',
            'gincome' => 'required',
            'county' => 'required',
            'ward' => 'required',
            'constituency' => 'required|string',
            'location' => 'required|string',
            'division' => 'required|string',
            'sublocation' => 'required|string',
            'village' => 'required|string',
            'iname' => 'required|string',
            'branch' => 'required|string',
            'year' => 'required',
            'payable' => 'required',
            'paid' => 'required',
            'balance' => 'required',
            'tSiblings' => 'required',
            'inSchool' => 'required',
            'sWorking' => 'required',
            'pFees' => 'required',
            'pRelationship' => 'required',
            'passport' => 'required',
            'fatherId' => 'required',
            'motherId' => 'required',
            'guardianId' => 'required',
            'ftelephone' => 'required',
            'mtelephone' => 'required',
            'gtelephone' => 'required',
        ]);

        $check = Application::where('user_id', auth()->user()->id)->where('year', date('Y'))->where('bursary_type', $request->type)->get();

        if (count($check) > 0) {
            return response()->json([
                'status' => 'error',
                'msg' => 'You already sent an application',
            ], 422);
        } else {

            $available = User::where('ward', $request['ward'])->count();
            if ($available > 0) {
                $user = auth('api')->user()->id;
                $serial = auth('api')->user()->id . time();
                $application = new Application();
                $application->user_id = $user;
                $application->name = $request['name'];
                $application->passport = $request['passport'];
                $application->email = $request['email'];
                $application->id_no = $request['idNo'];
                $application->reg_no = $request['regNo'];
                $application->bursary_type = $request['type'];
                $application->dob = $request['dob'];
                $application->status = 0;
                $application->gender = $request['gender'];
                $application->tel = $request['telephone'];
                $application->county = $request['county'];
                $application->ward_id = $request['ward'];
                $application->year = date('Y');
                $application->serial = str_pad($serial, 4, '0', STR_PAD_LEFT);

                $application->save();
                $appId = $application->id;


                $father = new Family();
                $father->user_id = $user;
                $father->name = $request['fname'];
                $father->relationship = 'Father';
                $father->applicationId = $appId;
                $father->living = $request['fliving'];
                $father->occupation = $request['foccupation'];
                $father->income = $request['fincome'];
                $father->tel = $request['ftelephone'];
                $father->cert = $request->fatherId;
                $father->status = 0;
                $father->year = date('Y');

                $father->save();

                $mother = new Family();
                $mother->user_id = $user;
                $mother->name = $request['mname'];
                $mother->applicationId = $appId;
                $mother->relationship = 'Mother';
                $mother->living = $request['mliving'];
                $mother->occupation = $request['moccupation'];
                $mother->income = $request['mincome'];
                $mother->tel = $request['mtelephone'];
                $mother->cert = $request->motherId;
                $mother->status = 0;
                $mother->year = date('Y');

                $mother->save();

                $guardian = new Family();
                $guardian->user_id = $user;
                $guardian->name = $request['gname'];
                $guardian->relationship = 'Guardian';
                $guardian->living = $request['gliving'];
                $guardian->occupation = $request['goccupation'];
                $guardian->income = $request['gincome'];
                $guardian->tel = $request['gtelephone'];
                $guardian->cert = $request->guardianId;
                $guardian->applicationId = $appId;
                $guardian->status = 0;
                $guardian->year = date('Y');

                $guardian->save();

                $more_family = new MoreFamily();
                $more_family->user_id = $user;
                $more_family->totalSiblings = $request['tSiblings'];
                $more_family->workingSiblings = $request['sWorking'];
                $more_family->schoolSiblings = $request['inSchool'];
                $more_family->pFees = $request['pFees'];
                $more_family->status = 0;
                $more_family->applicationId = $appId;
                $more_family->pFeesRelationship = $request['pRelationship'];
                $more_family->year = date('Y');

                $more_family->save();

                $geographical = new Geographical();
                $geographical->user_id = $user;
                $geographical->County = $request['county'];
                $geographical->Ward = $request['ward'];
                $geographical->Division = $request['division'];
                $geographical->Location = $request['location'];
                $geographical->status = 0;
                $geographical->applicationId = $appId;
                $geographical->Sublocation = $request['sublocation'];
                $geographical->Village = $request['village'];
                $geographical->year = date('Y');

                $geographical->save();

                $institution = new Institution();
                $institution->user_id = $user;
                $institution->name = $request['iname'];
                $institution->applicationId = $appId;
                $institution->branch = $request['branch'];
                $institution->class = $request['class'];
                $institution->yearofstudy = $request['year'];
                $institution->fees = $request['payable'];
                $institution->status = 0;
                $institution->amount_paid = $request['paid'];
                $institution->balance = $request['balance'];
                $institution->year = date('Y');

                $institution->save();
        }else{
            $user = auth('api')->user()->id;
            $serial = auth('api')->user()->id . time();
            $application = new Application();
            $application->user_id = $user;
            $application->name = $request['name'];
            $application->passport = $request['passport'];
            $application->email = $request['email'];
            $application->id_no = $request['idNo'];
            $application->reg_no = $request['regNo'];
            $application->bursary_type = $request['type'];
            $application->dob = $request['dob'];
            $application->status = 2;
            $application->gender = $request['gender'];
            $application->tel = $request['telephone'];
            $application->ward_id = $request['ward'];
            $application->county = $request['county'];
            $application->year = date('Y');
            $application->serial = str_pad($serial, 4, '0', STR_PAD_LEFT);

                $application->save();
                $appId = $application->id;


                $father = new Family();
                $father->user_id = $user;
                $father->name = $request['fname'];
                $father->relationship = 'Father';
                $father->applicationId = $appId;
                $father->living = $request['fliving'];
                $father->occupation = $request['foccupation'];
                $father->income = $request['fincome'];
                $father->tel = $request['ftelephone'];
                $father->cert = $request->fatherId;
                $father->status = 2;
                $father->year = date('Y');

                $father->save();

                $mother = new Family();
                $mother->user_id = $user;
                $mother->applicationId = $appId;
                $mother->name = $request['mname'];
                $mother->relationship = 'Mother';
                $mother->living = $request['mliving'];
                $mother->occupation = $request['moccupation'];
                $mother->income = $request['mincome'];
                $mother->tel = $request['mtelephone'];
                $mother->cert = $request->motherId;
                $mother->status = 2;
                $mother->year = date('Y');

                $mother->save();

                $guardian = new Family();
                $guardian->user_id = $user;
                $guardian->applicationId = $appId;
                $guardian->name = $request['gname'];
                $guardian->relationship = 'Guardian';
                $guardian->living = $request['gliving'];
                $guardian->occupation = $request['goccupation'];
                $guardian->income = $request['gincome'];
                $guardian->tel = $request['gtelephone'];
                $guardian->cert = $request->guardianId;
                $guardian->status = 2;
                $guardian->year = date('Y');

                $guardian->save();

                $more_family = new MoreFamily();
                $more_family->user_id = $user;
                $more_family->applicationId = $appId;
                $more_family->totalSiblings = $request['tSiblings'];
                $more_family->workingSiblings = $request['sWorking'];
                $more_family->schoolSiblings = $request['inSchool'];
                $more_family->pFees = $request['pFees'];
                $more_family->status = 2;
                $more_family->pFeesRelationship = $request['pRelationship'];
                $more_family->year = date('Y');

                $more_family->save();

                $geographical = new Geographical();
                $geographical->user_id = $user;
                $geographical->applicationId = $appId;
                $geographical->County = $request['county'];
                $geographical->Ward = $request['ward'];
                $geographical->Division = $request['division'];
                $geographical->Location = $request['location'];
                $geographical->Sublocation = $request['sublocation'];
                $geographical->Village = $request['village'];
                $geographical->status = 2;
                $geographical->year = date('Y');

                $geographical->save();

                $institution = new Institution();
                $institution->user_id = $user;
                $institution->applicationId = $appId;
                $institution->name = $request['iname'];
                $institution->branch = $request['branch'];
                $institution->class = $request['class'];
                $institution->yearofstudy = $request['year'];
                $institution->fees = $request['payable'];
                $institution->amount_paid = $request['paid'];
                $institution->balance = $request['balance'];
                $institution->status = 2;
                $institution->year = date('Y');

                $institution->save();
            }

        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($applicationId)
    {
        $application = Application::where('id', $applicationId)->where('year', date('Y'))->first();
        $family = Family::where('applicationId', $applicationId)->where('year', date('Y'))->get();
        $morefamily = MoreFamily::where('applicationId', $applicationId)->where('year', date('Y'))->first();
        $institution = Institution::where('applicationId', $applicationId)->where('year', date('Y'))->first();
        $geos = Geographical::where('applicationId', $applicationId)->where('year', date('Y'))->first();


        $County = County::where('id', $geos['County'])->value('name');
        $Ward = Ward::where('id', $geos['Ward'])->value('name');
        $Division = $geos['Division'];
        $Location = $geos['Location'];
        $ward_id = $geos['Ward'];
        $county_id = $geos['County'];

        $geographical = array(
            'County' => $County,
            'Ward' => $Ward,
            'wardId' => $ward_id,
            'countyId' => $county_id,
            'Division' => $Division,
            'Location' => $Location,
            'Sublocation' => $geos['Sublocation'],
            'Village' => $geos['Village']

        );

        return ['application' => $application, 'family' => $family, 'morefamily' => $morefamily, 'geographical' => $geographical, 'institution' => $institution];
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

    public function getDetails()
    {
        $user = User::where('id', auth()->user()->id)->first();

        return ['user' => $user];
    }

    public function accept($applicantId)
    {
        $application = Application::where('user_id', $applicantId)->where('status', 1)->first();
        $appli = Application::findOrFail($application['id']);
        $appli->status = 3;
        $appli->update();

        $family = Family::where('user_id', $applicantId)->where('status', 1)->get();
        foreach ($family as $fam) {
            $fami = Family::findOrFail($fam['id']);
            $fami->status = 3;
            $fami->update();
        }

        $morefamily = MoreFamily::where('user_id', $applicantId)->where('status', 1)->first();
        $more = MoreFamily::findOrFail($morefamily['id']);
        $more->status = 3;
        $more->update();

        $institution = Institution::where('user_id', $applicantId)->where('status', 1)->first();
        $insti = Institution::findOrFail($institution['id']);
        $insti->status = 3;
        $insti->update();

        $geographical = Geographical::where('user_id', $applicantId)->where('status', 1)->first();
        $geo = Geographical::findOrFail($geographical['id']);
        $geo->status = 3;
        $geo->update();

        // $email = User::where('id',$applicantId)->value('email');
        // Mail::to( $email)->send(new BursaryEmail());

    }

    public function send($applicantId)
    {
        $application = Application::where('user_id', $applicantId)->where('status', 0)->first();
        $appli = Application::findOrFail($application['id']);
        $appli->status = 1;
        $appli->update();

        $family = Family::where('user_id', $applicantId)->where('status', 0)->get();
        foreach ($family as $fam) {
            $fami = Family::findOrFail($fam['id']);
            $fami->status = 1;
            $fami->update();
        }

        $morefamily = MoreFamily::where('user_id', $applicantId)->where('status', 0)->first();
        $more = MoreFamily::findOrFail($morefamily['id']);
        $more->status = 1;
        $more->update();

        $institution = Institution::where('user_id', $applicantId)->where('status', 0)->first();
        $insti = Institution::findOrFail($institution['id']);
        $insti->status = 1;
        $insti->update();

        $geographical = Geographical::where('user_id', $applicantId)->where('status', 0)->first();
        $geo = Geographical::findOrFail($geographical['id']);
        $geo->status = 1;
        $geo->update();

//        $email = User::where('id', $applicantId)->value('email');
//        Mail::to($email)->send(new BursaryEmail());

    }

    public function reject($applicantId)
    {
        $application = Application::where('user_id', $applicantId)->where('status', 0)->first();
        $appli = Application::findOrFail($application['id']);
        $appli->status = 2;
        $appli->update();

        $family = Family::where('user_id', $applicantId)->where('status', 0)->get();
        foreach ($family as $fam) {
            $fami = Family::findOrFail($fam['id']);
            $fami->status = 2;
            $fami->update();
        }

        $morefamily = MoreFamily::where('user_id', $applicantId)->where('status', 0)->first();
        $more = MoreFamily::findOrFail($morefamily['id']);
        $more->status = 2;
        $more->update();

        $institution = Institution::where('user_id', $applicantId)->where('status', 0)->first();
        $insti = Institution::findOrFail($institution['id']);
        $insti->status = 2;
        $insti->update();

        $geographical = Geographical::where('user_id', $applicantId)->where('status', 0)->first();
        $geo = Geographical::findOrFail($geographical['id']);
        $geo->status = 2;
        $geo->update();
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
