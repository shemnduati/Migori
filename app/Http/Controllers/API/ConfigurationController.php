<?php

namespace App\Http\Controllers\API;

use App\Configuration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Configuration::all();
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
            'year' => 'required|string|max:25|unique:configurations',
            'status' => 'required|boolean',
        ]);

        $conf = Configuration::where('status', 1)->get();
        foreach ($conf as $co) {
            $confi = Configuration::findOrFail($co['id']);
            $confi->status = 0;
            $confi->craete();
        }

        return Configuration::Create([
            'year' => $request['year'],
            'status' => $request['status'],
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

    public function getStatus()
    {
        $num = Configuration::where('status', 1)->count();

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

        $conf = Configuration::where('status', 1)->get();
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
