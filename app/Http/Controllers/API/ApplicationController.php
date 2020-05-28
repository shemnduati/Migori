<?php

namespace App\Http\Controllers\API;

use App\File;
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
            'year' => 'required|digits_between:1,7',
            'type' => 'required',
            'firstName' => 'required|string',
            'middleName' => 'required|string',
            'lastName' => 'required|string',
            'dob' => 'required|date',
            'email' => 'required|email',
            'gender' => 'required',
            'telephone' => 'required|phone:KE|min:10',
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
            'polling' => 'required|string',
            'iname' => 'required|string',
            'branch' => 'required|string',
            'yearz' => 'required',
            'payable' => 'required',
            'paid' => 'required',
            'balance' => 'required',
            'tSiblings' => 'required|integer',
            'inSchool' => 'required|integer',
            'sWorking' => 'required|integer',
            'pFees' => 'required|string',
            'passport' => 'required|array',
            'passport.*' => 'mimes:jpg,jpeg,png,pdf',
            'motherId' => 'required|array',
            'motherId.*' => 'mimes:jpg,jpeg,png,pdf',
            'fatherId' => 'required|array',
            'fatherId.*' => 'mimes:jpg,jpeg,png,pdf',
            'guardianId' => 'required|array',
            'guardianId.*' => 'mimes:jpg,jpeg,png,pdf',
            'files' => 'required|array',
            'files.*' => 'mimes:jpg,jpeg,png,pdf,docx',
            'pRelationship' => 'required|string',
            'ftelephone' => 'required|phone:KE|min:10',
            'mtelephone' => 'required|phone:KE|min:10',
            'gtelephone' => 'required|phone:KE|min:10',
            'bank' => 'required|string',
            'account' => 'required|integer',
            'bran' => 'required',
        ]);

        $check = Application::where('user_id', auth()->user()->id)->where('application_year', $request->yearz)->where('bursary_type', $request->type)->get();

        if (count($check) > 0) {
            return response()->json([
                'status' => 'error',
                'msg' => 'You already sent an application',
            ], 422);
        } else {
            $user = auth()->user()->id;
            $serial = auth('api')->user()->id . time();
            $application = new Application();
            $application->user_id = $user;
            $application->firstName = $request->firstName;
            $application->middleName = $request->middleName;
            $application->lastName = $request->lastName;
            $application->email = $request['email'];
            $application->id_no = $request['idNo'];
            $application->reg_no = $request['regNo'];
            $application->bursary_type = $request['type'];
            $application->application_year = $request['yearz'];
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
            $father->status = 0;
            $father->year = $request->yearz;

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
            $mother->status = 0;
            $mother->year = $request->yearz;

            $mother->save();

            $guardian = new Family();
            $guardian->user_id = $user;
            $guardian->name = $request['gname'];
            $guardian->relationship = 'Guardian';
            $guardian->living = $request['gliving'];
            $guardian->occupation = $request['goccupation'];
            $guardian->income = $request['gincome'];
            $guardian->tel = $request['gtelephone'];
            $guardian->applicationId = $appId;
            $guardian->status = 0;
            $guardian->year = $request->yearz;

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
            $more_family->year = $request->yearz;

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
            $geographical->year = $request->yearz;
            $geographical->polling = $request['polling'];
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
            $institution->year = $request->yearz;
            $institution->bank = $request['bank'];
            $institution->account = $request['account'];
            $institution->bank_branch = $request['bran'];


            $institution->save();

            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $uploadedFile) {
                    $ext = $uploadedFile->getClientOriginalExtension();
                    if (in_array($ext, ['jpg', 'png', 'jpeg', 'pdf', 'docx'])) {
                        $filename = $uploadedFile->storeAs('uploads', time() . $uploadedFile->getClientOriginalName());
                        $file = new File();
                        $file->kind = "Recommendation letter";
                        $file->applicationId = $appId;
                        $file->path = $filename;
                        $file->status = 0;
                        $file->type = "county";
                        $file->year = $request->yearz;
                        $file->save();
                    }
                }
            }

            if ($request->hasFile('passport')) {
                foreach ($request->file('passport') as $uploadedFile) {
                    $ext = $uploadedFile->getClientOriginalExtension();
                    if (in_array($ext, ['jpg', 'png', 'jpeg', 'pdf', 'docx'])) {
                        $filename = $uploadedFile->storeAs('uploads', time() . $uploadedFile->getClientOriginalName());
                        $file = new File();
                        $file->kind = "Passport photo";
                        $file->applicationId = $appId;
                        $file->path = $filename;
                        $file->status = 0;
                        $file->type = "county";
                        $file->year = $request->yearz;
                        $file->save();
                    }
                }
            }

            if ($request->hasFile('motherId')) {
                foreach ($request->file('motherId') as $uploadedFile) {
                    $ext = $uploadedFile->getClientOriginalExtension();
                    if (in_array($ext, ['jpg', 'png', 'jpeg', 'pdf', 'docx'])) {
                        $filename = $uploadedFile->storeAs('uploads', time() . $uploadedFile->getClientOriginalName());
                        $file = new File();
                        $file->kind = "Mother’s ID/Death Cert";
                        $file->applicationId = $appId;
                        $file->path = $filename;
                        $file->status = 0;
                        $file->type = "county";
                        $file->year = $request->yearz;
                        $file->save();
                    }
                }
            }

            if ($request->hasFile('fatherId')) {
                foreach ($request->file('fatherId') as $uploadedFile) {
                    $ext = $uploadedFile->getClientOriginalExtension();
                    if (in_array($ext, ['jpg', 'png', 'jpeg', 'pdf', 'docx'])) {
                        $filename = $uploadedFile->storeAs('uploads', time() . $uploadedFile->getClientOriginalName());
                        $file = new File();
                        $file->kind = "Father’s ID/Death Cert";
                        $file->applicationId = $appId;
                        $file->path = $filename;
                        $file->status = 0;
                        $file->type = "county";
                        $file->year = $request->yearz;
                        $file->save();
                    }
                }
            }

            if ($request->hasFile('guardianId')) {
                foreach ($request->file('guardianId') as $uploadedFile) {
                    $ext = $uploadedFile->getClientOriginalExtension();
                    if (in_array($ext, ['jpg', 'png', 'jpeg', 'pdf', 'docx'])) {
                        $filename = $uploadedFile->storeAs('uploads', time() . $uploadedFile->getClientOriginalName());
                        $file = new File();
                        $file->kind = "Guardian’s ID/Death Cert";
                        $file->applicationId = $appId;
                        $file->path = $filename;
                        $file->status = 0;
                        $file->type = "county";
                        $file->year = $request->yearz;
                        $file->save();
                    }
                }
            }
            return response(['status' => 'success'], 200);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($applicationId)
    {
        $application = Application::where('id', $applicationId)->first();
        $family = Family::where('applicationId', $applicationId)->get();
        $morefamily = MoreFamily::where('applicationId', $applicationId)->first();
        $institution = Institution::where('applicationId', $applicationId)->first();
        $geos = Geographical::where('applicationId', $applicationId)->first();


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
            'Village' => $geos['Village'],
            'show' => 1

        );

        if (auth()->user()->role == 'sub-admin' && auth()->user()->ward == $application['ward_id']) {
            return ['application' => $application, 'family' => $family, 'morefamily' => $morefamily, 'geographical' => $geographical, 'institution' => $institution];
        }

        if (auth()->user()->role == 'official' && auth()->user()->county == $application['county']) {
            return ['application' => $application, 'family' => $family, 'morefamily' => $morefamily, 'geographical' => $geographical, 'institution' => $institution];
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, $id)
    {
        //
    }

    public
    function getDetails()
    {
        $user = User::where('id', auth()->user()->id)->first();

        return ['user' => $user];
    }

    public
    function accept($applicantId)
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

    public
    function send($applicantId)
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

    public
    function reject($applicantId)
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
    public
    function destroy($id)
    {
        //
    }
}
