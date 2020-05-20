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
use App\User;

class FormController extends Controller
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

    public function getDetails($serial)
    {
        $applicantId = auth()->user()->id;
        $appId = Application::where('serial', $serial)->value('id');
        $verified = Application::where('user_id', $applicantId)->where('serial', $serial)->where('status', 3)->count();

        if ($verified > 0) {
            $application = Application::where('user_id', $applicantId)->where('serial', $serial)->first();
            $family = Family::where('applicationId', $appId)->get();
            $morefamily = MoreFamily::where('applicationId', $appId)->first();
            $institution = Institution::where('applicationId', $appId)->first();
            $geos = Geographical::where('applicationId', $appId)->first();


            $County = County::where('id', $geos['County'])->value('name');
            $Ward = Ward::where('id', $geos['Ward'])->value('name');
            $Division = $geos['Division'];
            $Location = $geos['Location'];

            $geographical = array(
                'County' => $County,
                'Ward' => $Ward,
                'Division' => $Division,
                'Location' => $Location,
                'Sublocation' => $geos['Sublocation'],
                'Village' => $geos['Village']

            );
            return ['application' => $application, 'family' => $family, 'morefamily' => $morefamily, 'geographical' => $geographical, 'institution' => $institution, 'verified' => $verified];
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
