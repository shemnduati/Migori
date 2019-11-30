<?php

namespace App\Http\Controllers\API;

use App\Application;
use App\County;
use App\User;
use App\Ward;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserController extends Controller
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
        return User::latest()->paginate(10);
    }

    public function profile()
    {
        return auth()->user();
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users,email,' . $user->id,
            'password' => 'sometimes|required|min:6'
        ]);

        if (!empty($request->password)) {
            $request->merge(['password' => Hash::make($request['password'])]);
        }
        $user->update($request->all());
        return ['message' => "Success"];
    }

    public function subadmin()
    {
        $subs = User::where('role', 'sub-admin')->get();
        $parent = array();

        foreach ($subs as $sub) {
            $id = $sub['id'];
            $name = $sub['name'];
            $ward_name = Ward::where('id', $sub['ward'])->value('name');
            $County_name = County::where('id', $sub['county'])->value('name');
            $email = $sub['email'];
            $reg = $sub['created_at'];
            $role = $sub['role'];
            $child = array(
                'id' => $id,
                'name' => $name,
                'ward' => $ward_name,
                'email' => $email,
                'county' => $County_name,
                'reg' => $reg,
                'role' => $role
            );
            array_push($parent, $child);
        }

        return ['parent' => $parent];
    }

    public function MySubAdmin()
    {
        $county_id = User::where('id', Auth::user()->id)->value('county');
        $subs = User::where('role', 'sub-admin')->where('county', $county_id)->get();
        $parent = array();
        foreach ($subs as $sub) {
            $id = $sub['id'];
            $name = $sub['name'];
            $ward_name = Ward::where('id', $sub['ward'])->value('name');
            $County_name = County::where('id', $sub['county'])->value('name');
            $email = $sub['email'];
            $reg = $sub['created_at'];
            $role = $sub['role'];
            $child = array(
                'id' => $id,
                'name' => $name,
                'ward' => $ward_name,
                'county' => $County_name,
                'email' => $email,
                'reg' => $reg,
                'role' => $role
            );
            array_push($parent, $child);
        }

        return ['parent' => $parent];
    }

    public function official()
    {
        $offs = User::where('role', 'official')->get();
        $parent = array();

        foreach ($offs as $off) {
            $id = $off['id'];
            $name = $off['name'];
            $County_name = County::where('id', $off['county'])->value('name');
            $email = $off['email'];
            $reg = $off['created_at'];
            $role = $off['role'];
            $child = array(
                'id' => $id,
                'name' => $name,
                'county' => $County_name,
                'email' => $email,
                'reg' => $reg,
                'role' => $role
            );
            array_push($parent, $child);
        }

        return ['parent' => $parent];
    }

    public function getCounties()
    {
        $counties = County::all();

        return ['counties' => $counties];
    }

    public function getMyCounties()
    {

        $counties = County::where('id', auth()->user()->county)->value('name');

        return ['counties' => $counties];
    }

    public function getWards()
    {
        $wards = Ward::all();

        return ['wards' => $wards];
    }

    public function getMyWard()
    {

    }

    public function getCountyWards($countyId)
    {
        $wards = Ward::where('county_id', $countyId)->get();

        return ['wards' => $wards];
    }

    public function wards()
    {
        return Ward::all();
    }

    public function officialUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'county' => 'required',
        ]);
        return User::create([
            'county' => $request['county'],
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => 'official',
            'password' => Hash::make(123456789),
            'email_verified_at' => Carbon::now(),

        ]);
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
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'ward' => 'required',
        ]);
        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => 'sub-admin',
            'ward' => $request['ward'],
            'password' => Hash::make(123456789),
            'email_verified_at' => Carbon::now(),
            'county' => $request['county']
        ]);
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
        $this->authorize('isAdmin');
        $user = User::findorFail($id);
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users,email,' . $user->id,
            'ward' => 'sometimes|required',
            'county' => 'sometimes|required',
        ]);
        $user->update($request->all());
        /* $user->role = $request['role'];
         $user->update();*/
        return ['message' => 'user information updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$this->authorize('isAdmin');
        $user = User::findOrFail($id);
        $user->delete();
        return ['message' => 'user deleted'];
    }

    public function search()
    {
        if ($search = \Request::get('q')) {
            $users = User::where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%")
                    ->orWhere('email', 'LIKE', "%$search%")
                    ->orWhere('role', 'LIKE', "%$search%");
            })->paginate(20);
        } else {
            $users = User::latest()->paginate(10);
        }
        return $users;
    }
}
