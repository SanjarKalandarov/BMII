<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index()
    {
//        $roles=Role::whereNotIn('name', ['admin'])->get();
        $roles=Role::whereNotIn('name', ['admin'])->get();
        return view('admin.role.index',compact('roles'));
//        .


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request);
        $roles=new Role();
        $roles->name=$request->name;
        $roles->save();
        return redirect(route('admin.roles.index')) ->with('success', ' Role Created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permissions=Permission::all();
        $role=Role::find($id);
        return view('admin.role.edit',compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules=Role::find($id);
        $rules->update($request->all());
        return redirect(route('admin.roles.index'))->with('success','Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Role::find($id)->delete();
        return redirect(route('admin.roles.index'))->with('success','Successfully deleted');
    }
    public function givePermission(Request $request, Role $role)
    {
//        dd($request);
        if ($role->hasPermissionTo($request->permission)) {
            return redirect(route('admin.roles.index'))->with('error', 'Permission exists');
        }
        $role->givePermissionTo($request->permission);
        return redirect(route('admin.roles.index'))->with('success', 'Permission added');
    }
    public function  revokePermission(Role $role,Permission $permission)
    {
        if($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);
            return  redirect(route('admin.roles.index'))->with('success','Permission revoked');
        }
        return redirect(route('admin.roles.index'))->with('success','Permission not exists');

    }
}
