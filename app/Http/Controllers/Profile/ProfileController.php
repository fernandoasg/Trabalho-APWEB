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

    public function __construct()
    {
        $this->middleware('auth')->only(['edit', 'index']);
    }

    /**
     * Retorna os dados para a view das profiles de acordo com o usuário
     * rota: profile/        requer o usuário logado
     * rota: profile/{id}    requer o usuário com tal id
     * @param $id o id do usuário a ser buscado
     * @return array
     */
    public function getProfileViewData($id)
    {

        // Se a funcão é que chamou esse método é a index o usuário é o logado, caso contrário busque pelo id do url
        $user = (debug_backtrace()[1]['function'] == 'index') ? $user = Auth::user() : $user = User::find($id);

        if (!isset($user))
            abort(404);

        $projetos = [];

        if (isset($user->pessoa->membros)) {
            foreach ($user->pessoa->membros as $membro) {
                $projeto = Projeto::find($membro['projeto_id']);
                $projeto->{"papeis"} = $membro->papeis;
                array_push($projetos, $projeto);
            }
        } else {
            $projetos = null;
        }

        if (isset($user->pessoa)) {
            $dados_pessoa['nome'] = (isset($user->pessoa->nome_completo) ? $user->pessoa->nome_completo : '');
            $dados_pessoa['curso'] = (isset($user->pessoa->curso) ? $user->pessoa->curso : 'Curso não informado');
            $dados_pessoa['telefone'] = (isset($user->pessoa->telefone) ? $user->pessoa->telefone : 'Telefone não informado');
            $dados_pessoa['data_nascimento'] = (isset($user->pessoa->data_nascimento) ? $user->pessoa->data_nascimento : '');
            str_replace('-', '/', date("m-d-Y", strtotime($dados_pessoa['data_nascimento'])));

            if (isset($user->pessoa->endereco)){
                $dados_pessoa['cidade'] = Cidade::find($user->pessoa->endereco->cidade_id)->nome;
                $dados_pessoa['estado'] = Estado::find($user->pessoa->endereco->estado_id)->uf;
            } else {
                $dados_pessoa['cidade'] = 'Endereço não informado';
                $dados_pessoa['estado'] = '';
            }

        } else {
            $dados_pessoa = null;
        }

        $view_data = [

            'usuario' => [
                'id' => $user->id,
                'username' => $user->name,
                'email' => $user->email,
            ],

            'pessoa' => $dados_pessoa,

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
        if (Auth::user()->id != $id)
            abort(401);
        $estados = Estado::orderBy('nome', 'ASC')->get();
        return view('profile.profile_edit')->with(compact('estados'));
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
