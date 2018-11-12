<?php

namespace IntelGUA\Sisaludent\Http\Controllers;

use IntelGUA\Sisaludent\User;
use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;



class UsersController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('users.index');
    }
    public function getUsers()
    {
        $user = User::with("roles")->with("permissions")->orderby('id', 'DESC')->get();
        return (compact('user'));
        //return $user;
    }
    public function getRoles()
    {
        $role = Role::orderby('id', 'DESC')->get();
        return $role;
    }
    public function getPermissions()
    {
        $permission = Permission::orderby('id', 'DESC')->get();
        return $permission;
    }

    public function getStatus()
    {
        $status = User::select('status', 'id')->get();
        return $status;
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
        if ($request->ajax()) {
            DB::beginTransaction();
            try {
                $user = new User();
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->password = Hash::make($request->input('password'));
                $user->status = $request->input('status');
                if ($request->status == 'on') {
                    $user->status = 1;
                }
                $user->save();

                $role_id = $request->input('role_id');
                $user->roles()->attach($role_id);
                $permission_id = $request->input('permission_id');
                // $user->permissions()->attach($permission_id);
                $user->permissions()->attach($permission_id);
                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
            }
            return $request;
        }
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
    public function edit(Request $request, $id)
    {
        if ($request->ajax()) {
            $user = User::with("roles")->with("permissions")->find($request->id);
            return response($user);
        }
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
        if ($request->ajax()) {
            $user = User::find($request->id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->save();
            $role_id = $request->input('role_id');
            $user->roles()->sync($role_id);
            $permission_id = $request->input('permission_id');
            $user->permissions()->sync($permission_id);
            return response($user);
        }
    }

    public function Status(Request $request, $id)
    {
        if ($request->ajax()) {
            $status = User::find($request->id);
            $status->status = $request->input('status');
            $status->save();
            return response($status);
        }
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
