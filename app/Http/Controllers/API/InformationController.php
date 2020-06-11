<?php

namespace App\Http\Controllers\API;

use App\Configuration;
use App\County;
use App\Institution;
use App\Mail\BursaryEmail;
use App\User;
use App\Ward;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Application;
use App\Family;
use App\MoreFamily;
use App\Geographical;
use App\Budget;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

        return ['applications' => $applications];

    }

    public function getApplications()
    {
        $applications = Application::latest()->where('year', date('Y'))->whereIn('status', [1, 3])->get();

        return ['applications' => $applications];

    }

    public function getApp()
    {
        if (auth()->user()->role == 'sub-official') {
            $county_id = User::where('id', Auth::user()->id)->value('county');
            return Application::latest()->where('bursary_type', 'County')->where('awarded', 1)->where('county',
                    $county_id)->with('family')
                    ->with('institution')->with('geographical.ward')->get();
        }
    }

    public function getAppnts()
    {
        if (auth()->user()->role == "sub-admin") {
            $userId = Auth::user()->id;
            $ward_id = User::where('id', $userId)->value('ward');
            $applications = Application::where('year', date('Y'))->where('ward_id', $ward_id)
                ->where('bursary_type', 'scholarship')->where('recommendation', '!=', '')->get();
            $parent = array();

            foreach ($applications as $apps) {
                $id = $apps['id'];
                $fname = $apps['firstName'];
                $Mname = $apps['middleName'];
                $Lname = $apps['lastName'];
                $index = $apps['indexNo'];
                $school = $apps['secSchoolName'];
                $reco = $apps['recommendation'];
                $ward_name = Ward::where('id', $apps['ward_id'])->value('name');
                $date = $apps['updated_at'];
                $child = array(
                    'id' => $id,
                    'fname' => $fname,
                    'Mname' => $Mname,
                    'Lname' => $Lname,
                    'indexNo'=>$index,
                    'reco' => $reco,
                    'index' => $index,
                    'school' => $school,
                    'ward' => $ward_name,
                    'date' => $date,

                );
                array_push($parent, $child);
            }
            return ['parent' => $parent];

        }
        if (auth()->user()->role == "sub-official") {
            $userId = Auth::user()->id;
            $ward_id = User::where('id', $userId)->value('ward');
            $applications = Application::where('year', date('Y'))->where('ward_id', $ward_id)
                ->where('bursary_type', 'scholarship')->where('status', 3)->get();
            $parent = array();

            foreach ($applications as $apps) {
                $id = $apps['id'];
                $fname = $apps['firstName'];
                $Mname = $apps['middleName'];
                $Lname = $apps['lastName'];
                $index = $apps['indexNo'];
                $school = $apps['secSchoolName'];
                $reco = $apps['recommendation'];
                $ward_name = Ward::where('id', $apps['ward_id'])->value('name');
                $date = $apps['updated_at'];
                $child = array(
                    'id' => $id,
                    'fname' => $fname,
                    'Mname' => $Mname,
                    'Lname' => $Lname,
                    'reco' => $reco,
                    'index' => $index,
                    'school' => $school,
                    'ward' => $ward_name,
                    'date' => $date,

                );
                array_push($parent, $child);
            }
            return ['parent' => $parent];
        }
    }

    public function getCountyBursary()
    {
        $county_id = User::where('id', Auth::user()->id)->value('county');
        return Application::latest()->where('bursary_type', 'County')->where('status', 1)->where('county',
            $county_id)->with('family')
            ->with('institution')->with('geographical.ward')->get();

    }

    public function Applicantz()
    {
        $county_id = User::where('id', Auth::user()->id)->value('county');
        $applications = Application::where('year', date('Y'))->where('county', $county_id)
            ->where('bursary_type', 'scholarship')->where('approved', 3)->get();
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

    public function getbusary()
    {
        $ward_id = auth()->user()->ward;
        return Application::latest()->where('bursary_type', 'County')->where('ward_id', $ward_id)->with('family')
            ->with('institution')->with('geographical.ward')->get();
    }

    public function getMyCountyId()
    {
        return auth()->user()->county;
    }

    public function getMyWardId()
    {
        return auth()->user()->ward;
    }

    public function getMyBursary()
    {
        $applications = Application::where('year', date('Y'))->where('user_id', Auth::user()->id)->get();

        return ['applications' => $applications];

    }

    public function getApplication()
    {
        $count = Application::where('year', date('Y'))->where('user_id', Auth::user()->id)->count();

        return ['count' => $count];

    }

    public function getMyStatus()
    {
        $status = Application::where('year', date('Y'))->where('user_id', Auth::user()->id)->value('status');
        return ['status' => $status];
    }

    public function getAmount()
    {
        $amount = Application::where('year', date('Y'))->where('user_id', Auth::user()->id)->value('amount');
        return ['amount' => $amount];
    }

    public function getMyWards()
    {
        $county_id = User::where('id', Auth::user()->id)->value('county');
        $wards = Ward::where('county_id', $county_id)->get();
        return ['wards' => $wards];
    }

    public function subAdminWard()
    {
        if (auth()->user()->role == "sub-admin") {
            return Ward::where('id', auth()->user()->ward)->value('name');
        }
    }

    public function getMyCounty()
    {
        $county_id = User::where('id', Auth::user()->id)->value('county');
        $county = County::where('id', $county_id)->firstOrFail();
        return collect($county)->toJson();
    }

    public function getApplicationYears($id)
    {
        $year = Configuration::where('county', $id)->where('status', 1)->where('type', 2)->get(['year', 'id']);
        return ['year' => $year];
    }

    public function getAppYears($id)
    {
        $year = Configuration::where('county', $id)->where('status', 1)->where('type', 1)->get(['year', 'id']);
        return ['year' => $year];
    }

    public function getWardsById($id)
    {
        if ($id == 0) {
            $county_id = User::where('id', Auth::user()->id)->value('county');
            $applications = Application::where('year', date('Y'))->where('bursary_type', 'County')
                ->where('county', $county_id)->where('status', 3)->get();
            $parent = array();

            foreach ($applications as $apps) {
                $id = $apps['id'];
                $firstName = $apps['firstName'];
                $lastName = $apps['lastName'];
                $reg = $apps['reg_no'];
                $father = Family::where('applicationId', $id)->where('user_id', $apps['user_id'])
                    ->where('relationship', 'Father')->value('name');
                $ward_name = Ward::where('id', $apps['ward_id'])->value('name');
                $institution = Institution::where('user_id', $apps['user_id'])->value('name');
                $polling = Geographical::where('applicationId', $id)->value('polling');
                $balance = Institution::where('applicationId', $id)->value('balance');
                $amount = $apps['amount'];
                $date = $apps['updated_at'];
                $child = array(
                    'id' => $id,
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'ward' => $ward_name,
                    'amount' => $amount,
                    'polling' => $polling,
                    'balance' => $balance,
                    'father' => $father,
                    'reg' => $reg,
                    'date' => $date,
                    'institution' => $institution,
                );
                array_push($parent, $child);
            }
            return ['parent' => $parent];
        } elseif ($id != 0) {

            $applications = Application::where('year', date('Y'))->where('bursary_type', 'County')
                ->where('ward_id', $id)->where('status', 3)->get();
            $parent = array();

            foreach ($applications as $apps) {
                $id = $apps['id'];
                $firstName = $apps['firstName'];
                $lastName = $apps['lastName'];
                $father = Family::where('applicationId', $id)->where('user_id', $apps['user_id'])->where('relationship',
                    'Father')->value('name');
                $reg = $apps['reg_no'];
                $ward_name = Ward::where('id', $apps['ward_id'])->value('name');
                $institution = Institution::where('user_id', $apps['user_id'])->value('name');
                $polling = Geographical::where('applicationId', $id)->value('polling');
                $balance = Institution::where('applicationId', $id)->value('balance');
                $amount = $apps['amount'];
                $date = $apps['updated_at'];
                $child = array(
                    'id' => $id,
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'ward' => $ward_name,
                    'amount' => $amount,
                    'balance' => $balance,
                    'father' => $father,
                    'polling' => $polling,
                    'reg' => $reg,
                    'date' => $date,
                    'institution' => $institution,
                );
                array_push($parent, $child);
            }
            return ['parent' => $parent];
        }
    }

    public function getWardsApp($id)
    {
        if ($id == 0) {

            $county_id = User::where('id', Auth::user()->id)->value('county');
            $applications = Application::where('year', date('Y'))->where('county', $county_id)
                ->where('bursary_type', 'scholarship')->where('status', 3)->get();
            $parent = array();

            foreach ($applications as $apps) {
                $id = $apps['id'];
                $fname = $apps['firstName'];
                $Mname = $apps['middleName'];
                $Lname = $apps['lastName'];
                $index = $apps['indexNo'];
                $school = $apps['secSchoolName'];
                $reco = $apps['recommendation'];
                $ward_name = Ward::where('id', $apps['ward_id'])->value('name');
                $date = $apps['updated_at'];
                $child = array(
                    'id' => $id,
                    'fname' => $fname,
                    'Mname' => $Mname,
                    'Lname' => $Lname,
                    'reco' => $reco,
                    'index' => $index,
                    'school' => $school,
                    'ward' => $ward_name,
                    'date' => $date,

                );
                array_push($parent, $child);
            }
            return ['parent' => $parent];
        } elseif ($id != 0) {

            $applications = Application::where('year', date('Y'))->where('ward_id', $id)->where('bursary_type',
                'scholarship')->where('status', 3)->get();
            $parent = array();

            foreach ($applications as $apps) {
                $id = $apps['id'];
                $fname = $apps['firstName'];
                $Mname = $apps['middleName'];
                $Lname = $apps['lastName'];
                $index = $apps['indexNo'];
                $school = $apps['secSchoolName'];
                $reco = $apps['recommendation'];
                $ward_name = Ward::where('id', $apps['ward_id'])->value('name');
                $date = $apps['updated_at'];
                $child = array(
                    'id' => $id,
                    'fname' => $fname,
                    'Mname' => $Mname,
                    'Lname' => $Lname,
                    'reco' => $reco,
                    'index' => $index,
                    'school' => $school,
                    'ward' => $ward_name,
                    'date' => $date,

                );
                array_push($parent, $child);
            }
            return ['parent' => $parent];
        }
    }

    public function getBursaryType($type)
    {
        $ward_id = User::where('id', Auth::user()->id)->value('ward');
        $applications = Application::where('year', date('Y'))->where('ward_id', $ward_id)->where('bursary_type',
            $type)->get();

        return ['applications' => $applications];
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
    public function recommend(Request $request, $applicationId)
    {
        $application = Application::findOrFail($applicationId);
        $application->recommendation = $request['recommendation'];
        $application->status = 2;
        $application->save();
    }

    public function recommendApplication(Request $request, $applicationId)
    {
        if (auth()->user()->role == "sub-admin") {
            $this->validate($request, [
                'recommendation' => 'required',
            ]);

            $application = Application::findOrFail($applicationId);
            $application->status = 1;
            $application->recommendation = $request['recommendation'];
            $application->update();
        }
    }

    public function award(Request $request, $applicationId)
    {
        if (auth()->user()->role == 'official') {
            $this->validate($request, [
                'amount' => 'required',
            ]);

            $application = Application::findOrFail($applicationId);
            $remaining = Budget::where('ward_id', $application->ward_id)->where('year', $application->application_year)->
            value('remaining');

            if ($remaining <= $request['amount']) {
                return response()->json([
                    'status' => 'error',
                    'msg' => 'Amount exceeds the available funds',
                ], 422);
            } else {
                if ($application->awarded == 0 && ($application->recommendation == 'Yes' ||
                        $application->recommendation == 'Partially')) {

                    \DB::transaction(function () use ($application, $remaining, $request) {
                        $id = Budget::where('ward_id', $application->ward_id)->where('year', $application->application_year)
                            ->value('id');
                        $budge = Budget::findOrFail($id);
                        $budge->remaining = $remaining - $request['amount'];
                        $budge->update();

                        $application->amount = $request['amount'];
                        $application->awarded = 1;
                        $application->update();
                    });

                 $email = User::where('id', $application->user_id)->value('email');
                    Mail::to($email)->send(new BursaryEmail());
                } else {
                    return response()->json([
                        'message' => 'there was a problem'
                    ], 422);
                }
            }
        } else {
            return response()->json([
                'message' => 'unauthorised'
            ], 401);
        }
    }

    public function notAward(Request $request, $applicationId)
    {
        if (auth()->user()->role == 'official') {
            $appli = Application::findOrFail($applicationId);
            $appli->awarded = 2;
            $appli->update();
        }else {
            return response()->json([
                'message' => 'unauthorised'
            ], 401);
        }
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
        $this->authorize('isAdmin');
        $user = User::findorFail($id);
        $this->validate($request, [
            'role' => 'required|string|max:191',
        ]);
//        $user->update($request->all());
        $user->role = $request['role'];
        $user->update();
        return ['message' => 'information updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('isAdmin');
        $user = User::findOrFail($id);
        $user->delete();
        return ['message' => 'user deleted'];
    }

    public function search()
    {
        $ward_id = User::where('id', Auth::user()->id)->value('ward');
        if ($search = \Request::get('q')) {
            $bursary = Application::where('year', date('Y'))->where('ward_id', $ward_id)->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%")
                    ->orWhere('serial', 'LIKE', "%$search%");
            })->get();
        } else {
            $ward_id = User::where('id', Auth::user()->id)->value('ward');
            $applications = Application::where('year', date('Y'))->where('ward_id', $ward_id)->get();
            $bursary = ['applications' => $applications];

        }
        return $bursary;
    }

    public function conf()
    {
        if (auth()->user()->role == 'sub-admin' || auth()->user()->role == 'official' || auth()->user()->role == 'sub-official') {
            return Configuration::latest()->where('type', 2)->get();
        } else {
            return response()->json([
                'message' => 'unauthorised'
            ], 401);
        }
    }
}
