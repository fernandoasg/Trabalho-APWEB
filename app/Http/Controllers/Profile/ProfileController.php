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
     * @param $id o id do usuário a ser buscado, null se é o logado
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
        } else
            $projetos = null;

        if (isset($user->pessoa)) {
            $dados_pessoa['nome'] = isset($user->pessoa->nome_completo) ? $user->pessoa->nome_completo : '';
            $dados_pessoa['curso'] = isset($user->pessoa->curso) ? $user->pessoa->curso : 'Curso não informado';
            $dados_pessoa['telefone'] = isset($user->pessoa->telefone) ? $user->pessoa->telefone : 'Telefone não informado';
            $dados_pessoa['data_nascimento'] = isset($user->pessoa->data_nascimento) ? $user->pessoa->data_nascimento : '';
            $dados_pessoa['sexo'] = isset($user->pessoa->sexo) ? trim($user->pessoa->sexo) : '';
            str_replace('-', '/', date("m-d-Y", strtotime($dados_pessoa['data_nascimento'])));

            if (isset($user->pessoa->endereco)) {
                $dados_pessoa['cep'] = $user->pessoa->endereco->cep;
                $dados_pessoa['bairro'] = $user->pessoa->endereco->bairro;
                $dados_pessoa['rua'] = $user->pessoa->endereco->rua;
                $dados_pessoa['rua_numero'] = $user->pessoa->endereco->numero;
                $dados_pessoa['cidade'] = Cidade::find($user->pessoa->endereco->cidade_id)->nome;
                $dados_pessoa['cidade_id'] = $user->pessoa->endereco->cidade_id;
                $dados_pessoa['estado'] = Estado::find($user->pessoa->endereco->estado_id)->uf;
                $dados_pessoa['estado_id'] = $user->pessoa->endereco->estado_id;
            } else {
                $dados_pessoa['cidade'] = 'Endereço não informado';
                $dados_pessoa['estado'] = '';
            }

        } else
            $dados_pessoa = null;

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
     * @param $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->id != $id)
            abort(401);

        $estados = Estado::orderBy('nome', 'ASC')->get();
        $view_data = $this->getProfileViewData($id);
        return view('profile.profile_edit')->with(compact('estados', 'view_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        "_token" => "bZXSoF321jONkIJMybssmfCzz5HLXi9lh6NqoXQb"
//        "_method" => "PATCH"
//        "name" => "teste"
//        "email" => "teste@gmail.com"
//        "nome_completo" => null
//        "data_nascimento" => null
//        "sexo" => "F"
//        "telefone" => null
//        "curso" => null
//        "cep" => null
//        "rua" => null
//        "numero_rua" => null

        //Se o usuario nao tem pessoa e deixou pessoa null, nao crie pessoa
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255']
        ]);

        /*
         * Se algum dos dados de pessoa ou endereco foi preenchido entao valide os dados de pessoa
         */
        if (!empty($_POST['nome_completo']) || !empty($_POST['data_nascimento']) || $_POST['sexo'] != 0 ||
            !empty($_POST['telefone']) || !empty($_POST['cep']) || !empty($_POST['estado']) ||
            !empty($_POST['cidade']) ||
            !empty($_POST['rua']) || !empty($_POST['numero_rua']))
        {

            $validatedPessoa = $request->validate([
                'nome_completo' => ['string', 'max:255'],
                'data_nascimento' => ['date_format:Y-m-d', 'before:today'],
                'sexo' => ['string', 'max:1', 'not_in:0'],
                'telefone' => ['string', 'max:20', 'nullable'],
                'curso' => ['string', 'max:255', 'nullable']
            ]);

            $validatedData = array_merge($validatedData, $validatedPessoa);

            //SE O USUARIO TEM PESSOA ATT SE NAO CRIE UMA E LINKE COM O USER
            $pessoa = new Pessoa();

            $_POST['user_id'];

            /*
             * Se algum dos dados de endereço foi preenchido entao valide os dados de endereco
             */
            if(!empty($_POST['cep']) || !empty($_POST['estado']) || !empty($_POST['cidade']) ||
               !empty($_POST['rua']) || !empty($_POST['numero_rua']))
            {

                $validatedEndereco = $request->validate([
                    'cep' => ['numeric', 'max:8', 'min:8', 'nullable'],
                    'estado' => ['numeric', 'max:2'],
                    'cidade' => ['numeric', 'max:5'],
                    'rua' => ['string', 'max:255', 'nullable'],
                    'numero_rua' => ['string', 'max:6', 'nullable']
                ]);
                $validatedData = array_merge($validatedData, $validatedEndereco);

                //SE A PESSOA TEM ENDERECO ATT SE NAO CRIE UM ENDERECO E LINKE COM PESSOA
            }
        }
        //Se o usuario tem pessoa verifiquei nome, data nascimento e sexo
        //Se o usuario tem pessoa e nao tem endereco e deixou null, nao crie endereco
        //Se o usuario tem pessoa, tem endereco verifique atributos do endereço

        dd([$_POST, $validatedData]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
