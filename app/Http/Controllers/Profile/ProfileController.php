<?php

namespace App\Http\Controllers\Profile;

use App\Models\Endereco\Cidade;
use App\Models\Endereco\Estado;
use App\Models\Pessoa;
use App\Models\Projeto\Membro;
use App\Models\Projeto\Papel;
use App\Models\Projeto\Projeto;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{

    /**
     * Retorna os dados para a view das profiles de acordo com o usuário
     * rota: profile/        requer o usuário logado
     * rota: profile/{id}    requer o usuário com tal id
     * @param $id o id do usuário a ser buscado
     * @return array
     */
    public function getProfileViewData($id)
    {
        $user = '';

        // Se a funcão é que chamou esse método é a index o usuário é o logado
        if (debug_backtrace()[1]['function'] == 'index'){
            $user = Auth::user();
        }
        // Caso contrário busque pelo id do request
        else {
            $user = User::find($id);
        }

        $projetos = [];

        foreach ($user->pessoa->membros as $membro) {
            $projeto = Projeto::find($membro['projeto_id']);
            $projeto->{"papeis"} = $membro->papeis;
            array_push($projetos, $projeto);
        }

        $estado = '';
        $cidade = '';
        if (isset($user->pessoa->endereco)) {
            $cidade = Cidade::find($user->pessoa->endereco->cidade_id)->nome;
            $estado = Estado::find($user->pessoa->endereco->estado_id)->uf;
        }

        $view_data = [
            'username' => $user->name,
            'email' => $user->email,

            'nome' => $user->pessoa->nome_completo,
            'curso' => $user->pessoa->curso,
            'telefone' => $user->pessoa->telefone,
            'cidade' => $cidade,
            'estado' => $estado,
            'data_nascimento' => str_replace('-', '/', date("m-d-Y", strtotime($user->pessoa->data_nascimento))),

            'projetos' => $projetos
        ];

        return $view_data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware('auth');
        $view_data = $this->getProfileViewData(null);
        return view('profile/profile')->with(compact('view_data'));
    }

    public function show($id)
    {
        $view_data = $this->getProfileViewData($id);
        return view('profile/profile')->with(compact('view_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
