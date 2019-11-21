<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        $roles = null;
        $direct_permissions = null;

        if(!empty($user->roles()->first())) //Tem que ser o first aqui devido a um bug do pacote de ACL que retorna uma coleção vazia se utilizar o get
            $roles = $user->roles;

        return view('user.edit')->with(compact('roles', 'user'));
    }

    public function update(Request $request)
    {
        dd($request);
    }

}
