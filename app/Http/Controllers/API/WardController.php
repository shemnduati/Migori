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
        return Ward::with('county')->paginate(10);


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
            'Constituency' => 'required|String',
        ]);
        return Ward::Create([
            'name' => $request['name'],
            'county_id' => $request['county_id'],
            'Constituency'=> $request['Constituency'],
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
            'Constituency' => 'required|String',
        ]);
        $ward = Ward::findOrFail($id);
        $ward->update([
            'name' => $request['name'],
            'county_id' => $request['county_id'],
            'Constituency'=> $request['Constituency'],
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
    public function search(){
        if ($search = \Request::get('q')) {
            $users = Ward::with('county')->where(function($query) use ($search){
                $query->where('name','LIKE',"%$search%");
            })->paginate(20);
        }else{
            $users =  Ward::with('county')->paginate(10);
        }
        return $users;
    }
}
