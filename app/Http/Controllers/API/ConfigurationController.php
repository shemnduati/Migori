<?php

namespace App\Http\Controllers\API;

use App\Configuration;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $county =User::where('id',$id)->value('county');
        return Configuration::where('county',$county)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request,[
            'year' => 'required|string|max:25',
            'status' => 'required|boolean',
            'type' => 'required'
        ]);

         $county =User::where('id',$id)->value('county');
         $conf = Configuration::where('status', 1)->where('county',$county)->where('type',$request->type)->get();
            foreach ($conf as $co) {
                $confi = Configuration::findOrFail($co['id']);
                $confi->status = 0;
                $confi->craete();
            }

            return Configuration::Create([
                'year' => $request['year'],
                'status' => $request['status'],
                'county' => $county,
                'type' => $request['type'],
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

    public function getStatus($countyId)
    {

        $num = Configuration::where('county',$countyId)->where('type', 2)->where('status', 1)->count();

        return ['num'=>$num];
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
            // 'year' => 'required|string|max:25',
        ]);
        $user_id = Auth::user();
        $county =User::where('id',$user_id['id'])->value('county');

        $conf = Configuration::where('status', 1)->where('county',$county)->where('type',$request->type)->get();
        foreach ($conf as $co) {
            $confi = Configuration::findOrFail($co['id']);
            $confi->status = 0;
            $confi->update();
        }

        $configuration = Configuration::findOrFail($id);
        $configuration->status = $request['status'];
        $configuration->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $configuration = Configuration::findOrFail($id);

        $configuration->delete();
    }
}
