<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = empty($user->roles()->first()) ? null : $user->roles;
        $all_roles = Role::all();
        $direct_permissions = empty($user->getDirectPermissions()->first()) ? null : $user->getDirectPermissions();

        $non_selected_user_direct_permissions = empty($direct_permissions) ? Permission::all() : Permission::all()->diff($direct_permissions);

        return view('user.edit')->with(compact('roles', 'user', 'direct_permissions', 'non_selected_user_direct_permissions', 'all_roles'));
    }

    public function update(Request $request)
    {
        dd($request);
    }

}
