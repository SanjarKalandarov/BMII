<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $permissions = Permission::all();
        $permissions = Permission::all();
        return view('admin.permission.index', compact('permissions'));
//        .,,,

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Permission::create($request->all());
        return redirect(route('admin.permissions.index'))->with('success', 'Permission Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $permissions=Permission::find($id);
        $roles =Role::all();
        return view('admin.permission.edit', compact('permissions','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $permissions = Permission::find($id);
        $permissions->update($request->all());
        return redirect(route('admin.permissions.index'))->with('success', 'Permissions updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Permission::find($id)->delete();
        return redirect(route('admin.permissions.index'))->with('success', 'Successfully deleted');
    }
   public  function assignRole(Request $request,Permission $permission)
   {
       dd($request);
       if($permission->hasRole($request->role)){
           return redirect(route('admin.permissions.index'))->with('success','Role already exists');
       }
       $permission->assignRole($request->role);
       return redirect(route('admin.permissions.index'))->with('success','Role assigned');

   }
 public function  removeRole(Permission $permission,Role $role) {
        if($permission->hasRole($role)){
            $permission->removeRole($role);
            return  redirect(route('admin.permissions.index'))->with('success','Role removed');
        }
        return redirect(route('admin.permissions.index'))->with('success','Role not exists');
 }


}
