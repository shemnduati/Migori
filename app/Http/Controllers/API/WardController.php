<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ward;
use App\County;

class WardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$ward = Ward::all();
        //$county = County::all();
        //return $ward;
        //return Ward::all();
        $ward = Ward::with('county')->get();
        return $ward;

    }

    public function county()
    {
        return County::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:25|unique:counties',
            'county_id' => 'required|integer|max:25',
        ]);
        return Ward::Create([
            'name' => $request['name'],
            'county_id' => $request['county_id'],
        ]);
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
        $this->validate($request,[
            'name' => 'required|string|max:25',
            'county_id' => 'required|integer|max:25',
        ]);
        $ward = Ward::findOrFail($id);
        $ward->update([
            'name' => $request['name'],
            'county_id' => $request['county_id'],
        ]);
        return ['message' => 'ward is updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ward = Ward::findOrFail($id);

        $ward->delete();
    }
}
