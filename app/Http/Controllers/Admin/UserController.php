<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
//use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public  function index()
    {
//        $users = \App\Models\User::all();
        $users = \App\Models\User::all();
        return view('admin.users.index', compact('users'));
//        .




    }
    public function create()
    {
        return view('admin.users.create');

    }

    public function button(){
        return view('button');
    }
    public  function admin()
    {
        return view('adminpanel.master');

    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('admin.users.index');

    }
    public  function destroy($id)
    {
        $users = \App\Models\User::find($id);
        if($users->hasRole('admin')){
            return redirect(route('admin.users.index'))->with('success','siz Adminsiz');

        }

        $users->delete();
        return redirect(route('admin.users.index'))->with('success','User deleted successfully');
    }
    public function show(User $user)
    {
        $roles=Role::all();
        $permissions=Permission::all();

        return view('admin.users.role', compact('user', 'roles', 'permissions'));

    }
    public  function assignRole(Request $request,User $user)
    {
//        dd($request->role);
        if($user->hasRole($request->role)){
            return redirect(route('admin.users.index'))->with('error','Role  exists');
        }
        $user->assignRole($request->role);
        return redirect(route('admin.users.index'))->with('success','Role assigned');

    }
    public function removeRole(User $user,$id) {
        // Foydalanuvchi berilgan rolni ega bo'lishini tekshiramiz
        $role=Role::find($id);
        $hasRole = $user->hasRole($role);

        if ($hasRole) {
            // Foydalanuvchining berilgan rolni ega bo'lishi halida uni olib tashlaymiz
            $user->removeRole($role);
            return redirect(route('admin.users.index'))->with('success', 'Role removed');
        } else {
            // Foydalanuvchi berilgan rolni ega emasligini aytadi
            return redirect(route('admin.users.index'))->with('error', 'Role does not exist');
        }
    }



    public function assignPermissions(Request $request, User $user)
    {
        if ($user->hasRole($request->permission)) {
            return redirect(route('admin.users.index'))->with('error', 'Permission already exists');
        }

        $user->givePermissionTo($request->permission);

        return redirect(route('admin.users.index'))->with('success', 'Permission assigned');
    }

    public function removePermission(User $user, $id) {
        $permission = Permission::find($id);

        if ($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);
            return redirect(route('admin.users.index'))->with('success', 'Permission removed');
        }
        return redirect(route('admin.users.index'))->with('error', 'Permission does not exist');
    }



}
