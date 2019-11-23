<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class AjaxController extends Controller
{

    public function removeRole(Request $request)
    {
        $user = User::find($request->user_id);
        $user->removeRole($request->role_name);
        echo 'Removendo role de ' . $request->role_name . ' do usuario ' . $user->name;
    }

    public function removePermission(Request $request)
    {
        $user = User::find($request->user_id);
        $user->revokePermissionTo($request->permission_name);
        echo 'Removendo permissao de ' . $request->permission_name . ' do usuario ' . $user->name;
    }

    public function addPermission(Request $request)
    {
        $user = User::find($request->user_id);
        $user->givePermissionTo($request->permission_name);
        echo 'Adicionando permissao de ' . $request->permission_name . ' para o usuario ' . $user->name;
    }

    public function addRole(Request $request)
    {
        echo $request->role_name;
        $user = User::find($request->user_id);
        $user->assignRole(Role::findByName($request->role_name));
        echo 'Adicionando role de ' . $request->role_name . ' para o usuario ' . $user->name;
    }
}
