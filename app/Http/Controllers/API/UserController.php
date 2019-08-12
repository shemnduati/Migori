<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Ward;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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
    public function subadmin()
    {
     $subs = User::where('role','sub-admin')->get();
     $parent = array();

     foreach ($subs as $sub){
         $id = $sub['id'];
         $name = $sub['name'];
         $ward_name = Ward::where('id', $sub['ward'])->value('name');
         $email = $sub['email'];
         $reg = $sub['created_at'];
         $role = $sub['role'];
         $child=array(
             'id' =>$id,
            'name'=>$name,
             'ward'=>$ward_name,
             'email'=>$email,
             'reg'=>$reg,
             'role'=>$role
         );
         array_push($parent, $child);
     }

          return ['parent'=>$parent];
    }
    public function wards()
    {
        return Ward::all();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'ward'=> 'required',
        ]);
        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => 'sub-admin',
            'ward' => $request['ward'],
            'password' => Hash::make(123456789),
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
        $this->authorize('isAdmin');
        $user = User::findorFail($id);
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users,email,'.$user->id,
            'ward'=> 'required',
        ]);
       $user->update($request->all());
       /* $user->role = $request['role'];
        $user->update();*/
        return ['message'=>'user information updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('isAdmin');
        $user = User::findOrFail($id);
        $user->delete();
        return ['message'=> 'user deleted'];
    }
    public function search(){
        if ($search = \Request::get('q')) {
            $users = User::where(function($query) use ($search){
                $query->where('name','LIKE',"%$search%")
                    ->orWhere('email','LIKE',"%$search%")
                    ->orWhere('role','LIKE',"%$search%");
            })->paginate(20);
        }else{
            $users = User::latest()->paginate(10);
        }
        return $users;
    }
}
