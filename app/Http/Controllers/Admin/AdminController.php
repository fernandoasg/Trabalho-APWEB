<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Projeto\Projeto;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

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
        $projetos = Projeto::all();
        return view('Admin.projetos',[
            'projetos' => $projetos,
        ]);
    }

    public function showPosts(){
        $this->checkADM();
        return view('Admin.posts');
    }

    public function showLedes(){
        $this->checkADM();
        $dados_ledes = DB::table('informacoes_ledes')->get()->first();
        return view('Admin.ledes')->with(compact('dados_ledes'));
    }

    public function updateLedes(){
        $this->checkADM();
        return view('Admin.ledes');
    }


    public function createProjeto(){
        $this->checkADM();
        return view ('Admin.cadastrarProjeto');
    }

}
