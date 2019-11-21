<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Projeto\Projeto;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function showUsers()
    {
        $users = User::all();
        return view('admin.dashboard_users')->with(compact('users'));
    }

    public function showProjetos()
    {
        $projetos = Projeto::all();
        return view('admin.dashboard_projetos')->with(compact('projetos'));
    }

    public function showPosts()
    {
        return view('admin.posts');
    }

    public function showLedes()
    {
        $dados_ledes = DB::table('informacoes_ledes')->get()->first();
        return view('admin.dashboard_ledes')->with(compact('dados_ledes'));
    }

    public function updateLedes()
    {
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

}
