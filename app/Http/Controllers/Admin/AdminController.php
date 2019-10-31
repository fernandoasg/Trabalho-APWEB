<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Projeto\Projeto;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // Checa se o usuário logado é ADM, não pode ser feito no construtor pq o middleware ainda não rodou
    public function checkADM()
    {
        if (!Auth::user()->can('criar usuarios'))
            abort('401');
        return null;
    }

    public function index()
    {
        $this->checkADM();
        return view('admin.index');
    }

    public function showUsers()
    {
        $this->checkADM();
        $users = User::all();
        return view('admin.dashboard_users')->with(compact('users'));
    }

    public function showProjetos()
    {
        $this->checkADM();
        $projetos = Projeto::all();
        return view('admin.projetos')->with(compact('projetos'));
    }

    public function showPosts()
    {
        $this->checkADM();
        return view('admin.posts');
    }

    public function showLedes()
    {
        $this->checkADM();
        $dados_ledes = DB::table('informacoes_ledes')->get()->first();
        return view('admin.ledes')->with(compact('dados_ledes'));
    }

    public function updateLedes()
    {
        $this->checkADM();
        DB::table('informacoes_ledes')->where('id', 1)->update(array(
            'cep' => $_POST['cep'],
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'endereco' => $_POST['endereco'],
            'telefone' => $_POST['telefone'],
            'horario_abertura' => $_POST['horario_abertura'],
            'horario_encerramento' => $_POST['horario_encerramento'],
        ));
        return Redirect::route('dashboard_ledes');
    }

    public function createProjeto()
    {
        $this->checkADM();
        return view('admin.projeto.criar_projeto');
    }

    public function editarProjeto(Request $request)
    {
        $this->checkADM();
        $projeto = Projeto::find($request['id']);
        return view('Admin.editarProjeto')->with(compact('projeto'));
    }
}
