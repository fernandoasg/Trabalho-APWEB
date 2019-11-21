<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{

    public function removeRole(Request $request)
    {
        $user = User::find($request->user_id);
        $user->removeRole($request->role_name);
        return;
    }

    public function removePermission(Request $request)
    {
        $user = User::find($request->user_id);
        $user->revokePermissionTo($request->permission_name);
        echo 'Removendo permissao de ' . $request->permission_name . ' do usuario ' . $user;
    }
}
