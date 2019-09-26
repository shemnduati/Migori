<?php

namespace App\Http\Controllers\API;

use App\Budget;
use App\County;
use App\User;
use App\Ward;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BudgetController extends Controller
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
        $budgs = Budget::where('county', auth()->user()->county)->get();
        $parent = array();

        foreach ($budgs as $budg) {
            $id = $budg['id'];
            $ward_id = $budg['ward_id'];
            $ward_name = Ward::where('id', $ward_id)->value('name');
            $amount = $budg['amount'];
            $remaining = $budg['remaining'];
            $year = $budg['year'];
            $child = array(
                'id' => $id,
                'name' => $ward_name,
                'amount' => $amount,
                'remaining' => $remaining,
                'year' => $year,
            );
            array_push($parent, $child);
        }
        return ['parent' => $parent];
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
            'amount' => 'required|integer',
            'ward' => 'required'
        ]);
        $exist = Budget::where('ward_id', $request->ward)->where('year', date('Y'))->count();

        if ($exist > 0) {
            return response()->json([
                'status' => 'error',
                'msg' => 'Budget for this word has already been set',
            ], 422);
        } else {
            $county = Ward::where('id', $request['ward'])->value('county_id');
            return Budget::create([
                'county' => $county,
                'ward_id' => $request['ward'],
                'amount' => $request['amount'],
                'remaining' => $request['amount'],
                'year' => date('Y'),
            ]);
        }
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

    public function getMyWards()
    {
        $county_id = User::where('id', Auth::user()->id)->value('county');
        $wards = Ward::where('county_id', $county_id)->get();
        return ['wards' => $wards];
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
        $budget = Budget::findOrFail($id);
        $previous = $budget->amount;
        $remaining = $budget->remaining;
        $diff = $request->amount - $previous;

        $this->validate($request, [
            'amount' => 'required',
            'ward' => 'required',
        ]);
        $budget->ward_id = $request->ward;
        $budget->remaining = $remaining + $diff;
        $budget->amount = $request->amount;
        $budget->update();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $budget = Budget::findOrFail($id);
        $budget->delete();
        return ['message' => 'budget deleted'];
    }
}
