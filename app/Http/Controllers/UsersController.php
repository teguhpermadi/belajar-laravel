<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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

    public function anyData()
    {
        $roles = Role::all();
        $users = User::with('roles')->get();
        $admin = User::role('admin')->get();
        $ptk = User::role('ptk')->get();
        $pd = User::role('pd')->get();
        $nonmembers = $users->reject(function ($user, $key) {
            return $user->hasRole(['pd', 'ptk']);
        });

        return datatables()->of($users)
            ->addColumn('action', 'users.action-datatables')
            ->addColumn('avatar', 'users.avatar-datatables')
            ->addColumn('role', 'users.role-datatables')
            ->rawColumns(['action', 'avatar', 'role'])
            ->addIndexColumn()
            ->toJson();
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
        //
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
        $user = User::where('id', $id)->with('roles')->firstOrFail();
        $roles = Role::all();
        // dd($roles);
        return view('users.edit', ['user' => $user, 'roles' => $roles]);
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
        $user = User::where('id', $id)->firstOrFail();
        $user->syncRoles($request->roles);
        return to_route('users.index');
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
