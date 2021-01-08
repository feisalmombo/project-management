<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Role;
use App\Permission;
use App\UserStatus;
use Excel;
use App\ActivityLog;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('create_customer')) {
                return $next($request);
            }
            return redirect()->back();
        });
        $this->validate(request(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:13',
            'password' => 'required|min:6',
        ]);

        $dev_role = Role::where('slug', 'customer')->first();
        //return $dev_role;
        $dev_perm = Permission::where('slug', 'create')->first();

        $users = new User();
        $users->first_name = $request->first_name;
        $users->middle_name = $request->middle_name;
        $users->last_name = $request->last_name;
        $users->email = $request->email;
        $users->phone_number = $request->phone_number;
        $users->password = bcrypt($request->password);

        //return $users;
        $st = $users->save();

        $users->roles()->attach($dev_role);
        $users->permissions()->attach($dev_perm);
        $userstatus = new UserStatus();
        $userstatus->user_id = $users->id;
        $userstatus->slug = false;
        $userstatus->save();
        if (!$st) {
            return redirect()->back()->with('message', 'Failed to register');
        }
        // return redirect()->back()->with('message', 'Registration Successfully, Please login');
        return redirect('/login')->with('message', 'Registration Successfully, Please login');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
