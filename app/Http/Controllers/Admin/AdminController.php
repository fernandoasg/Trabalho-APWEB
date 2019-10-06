<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // Checa se o usuário logado é ADM, não pode ser feito no construtor pq o middleware ainda não rodou
    public function checkADM(){
        if (!Auth::user()->can('criar usuarios'))
            abort('401');
        return null;
    }

    /**
     * Mostra a area do administrador
     */
    public function index(){
        $this->checkADM();
        return view('Admin.index');
    }

    public function showUsers(){
        $this->checkADM();
        $users = User::all();
        return view('Admin.users')->with(compact('users'));
    }

    public function showProjetos(){
        $this->checkADM();
        return view('Admin.projetos');
    }

    public function showPosts(){
        $this->checkADM();
        return view('Admin.posts');
    }

    public function showLedes(){
        $this->checkADM();
        return view('Admin.ledes');
    }


}
