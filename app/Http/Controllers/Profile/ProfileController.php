<?php

namespace App\Http\Controllers\Profile;

use App\Models\Endereco\Cidade;
use App\Models\Endereco\Endereco;
use App\Models\Endereco\Estado;
use App\Models\Pessoa;
use App\Models\Projeto\Projeto;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['edit', 'index', 'update']);
    }

    /**
     * Retorna os dados para a view das profiles de acordo com o usuário
     *
     * @param $id o id do usuário a ser buscado, se NULL busca o usuário logado
     * @return array
     */
    public function getProfileViewData($id)
    {
        // Se a funcão é que chamou esse método é a index o usuário é o logado, caso contrário busque pelo id do url
        $user = (debug_backtrace()[1]['function'] == 'index') ? $user = Auth::user() : $user = User::find($id);

        // Se não existe um usuário com tal ID -> 404
        if (!isset($user))
            abort(404);

        $projetos = [];
        if (isset($user->pessoa->membros)) {
            foreach ($user->pessoa->membros as $membro) {
                $projeto = Projeto::find($membro['projeto_id']);
                $projeto->{"papeis"} = $membro->papeis;
                array_push($projetos, $projeto);
            }
        }

        if (isset($user->pessoa)) {
            $dados_pessoa['nome'] = isset($user->pessoa->nome_completo) ? $user->pessoa->nome_completo : '';
            $dados_pessoa['curso'] = isset($user->pessoa->curso) ? $user->pessoa->curso : '';
            $dados_pessoa['telefone'] = isset($user->pessoa->telefone) ? $user->pessoa->telefone : '';
            $dados_pessoa['data_nascimento'] = isset($user->pessoa->data_nascimento) ? $user->pessoa->data_nascimento : '';
            $dados_pessoa['data_nascimento_dmY'] = isset($user->pessoa->data_nascimento) ? date("d/m/Y", strtotime($user->pessoa->data_nascimento)) : '';
            $dados_pessoa['sexo'] = isset($user->pessoa->sexo) ? trim($user->pessoa->sexo) : '';

            if (isset($user->pessoa->endereco)) {
                $dados_pessoa['cep'] = $user->pessoa->endereco->cep;
                $dados_pessoa['estado'] = Estado::find($user->pessoa->endereco->estado_id)->uf;
                $dados_pessoa['estado_id'] = $user->pessoa->endereco->estado_id;
                $dados_pessoa['cidade'] = Cidade::find($user->pessoa->endereco->cidade_id)->nome;
                $dados_pessoa['cidade_id'] = $user->pessoa->endereco->cidade_id;
                $dados_pessoa['bairro'] = $user->pessoa->endereco->bairro;
                $dados_pessoa['rua'] = $user->pessoa->endereco->rua;
                $dados_pessoa['rua_numero'] = $user->pessoa->endereco->numero;
            } else {
                $dados_pessoa['cep'] = null;
                $dados_pessoa['estado'] = null;
                $dados_pessoa['estado_id'] = null;
                $dados_pessoa['cidade'] = null;
                $dados_pessoa['cidade_id'] = null;
                $dados_pessoa['bairro'] = null;
                $dados_pessoa['rua'] = null;
                $dados_pessoa['rua_numero'] = null;
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
     * Exibe página de profile do usuário logado
     */
    public function index()
    {
        $view_data = $this->getProfileViewData(null);
        return view('profile/profile')->with(compact('view_data'));
    }

    /**
     * Exibe página de profile do usuário requisitado pelo ID
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        $view_data = $this->getProfileViewData($id);
        return view('profile/profile')->with(compact('view_data'));
    }

    /**
     * Exibe página de edição de profile
     *
     * @param $id
     * @return Response
     */
    public function edit($id)
    {
        // Se o usuário a ser editado não é o logado -> 401: Não autorizado
        if (Auth::user()->id != $id)
            abort(401);

        $estados = Estado::orderBy('nome', 'ASC')->get();
        $view_data = $this->getProfileViewData($id);
        return view('profile.profile_edit')->with(compact('estados', 'view_data'));
    }

    /**
     * Atualiza o usuário
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        //Se o usuario nao tem pessoa e deixou pessoa null, nao crie pessoa
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255']
        ]);

        /*
         * Se algum dos dados de pessoa ou endereco foi preenchido entao valide os dados de pessoa
         */
        if (!empty($_POST['nome_completo']) || !empty($_POST['data_nascimento']) || $_POST['sexo'] != 0 ||
            !empty($_POST['telefone']) || !empty($_POST['cep']) || !empty($_POST['estado']) || !empty($_POST['cidade']) ||
            !empty($_POST['rua']) || !empty($_POST['numero_rua'])) {

            $validatedPessoa = $request->validate([
                'nome_completo' => ['string', 'max:255'],
                'data_nascimento' => ['date_format:Y-m-d', 'before:today'],
                'sexo' => ['string', 'max:1', 'not_in:0'],
                'telefone' => ['string', 'max:20', 'nullable'],
                'curso' => ['string', 'max:255', 'nullable']
            ]);
            $validatedData = array_merge($validatedData, $validatedPessoa);

            // Se o usuário ja tem uma pessoa então a atualize senão crie uma e linke as FK
            if (isset(Auth::user()->pessoa))
                $pessoa = Pessoa::where('user_id', $_POST['user_id'])->first();
            else
                $pessoa = new Pessoa();

            $pessoa->nome_completo = $validatedData['nome_completo'];
            $pessoa->data_nascimento = $validatedData['data_nascimento'];
            $pessoa->sexo = $validatedData['sexo'];
            $pessoa->curso = $validatedData['curso'];
            $pessoa->telefone = $validatedData['telefone'];
            $pessoa->user_id = Auth::user()->id;
            $pessoa->save();
            DB::update("update users set pessoa_id = '" . $pessoa->id . "' where id = '" . Auth::user()->id . "'");

            /*
             * Se algum dos dados de endereço foi preenchido entao valide os dados de endereco
             */
            if (!empty($_POST['cep']) || !empty($_POST['estado']) || !empty($_POST['cidade']) ||
                !empty($_POST['rua']) || !empty($_POST['numero_rua'])) {
                $validatedEndereco = $request->validate([
                    'cep' => ['numeric', 'digits_between:7,9', 'nullable'],
                    'estado' => ['numeric'],
                    'cidade' => ['numeric'],
                    'bairro' => ['string', 'max:255', 'nullable'],
                    'rua' => ['string', 'max:255', 'nullable'],
                    'numero_rua' => ['string', 'max:10', 'nullable']
                ]);

                $validatedData = array_merge($validatedData, $validatedEndereco);

                // Se a pessoa ja tem endereco atualize senão crie um
                if (isset(Auth::user()->pessoa->endereco))
                    $endereco = Endereco::where('pessoa_id', $pessoa->id)->first();
                else
                    $endereco = new Endereco();

                $endereco->cep = $validatedData['cep'];
                $endereco->estado_id = $validatedData['estado'];
                $endereco->cidade_id = $validatedData['cidade'];
                $endereco->bairro = $validatedData['bairro'];
                $endereco->rua = $validatedData['rua'];
                $endereco->numero = $validatedData['numero_rua'];
                $endereco->pessoa_id = $pessoa->id;
                $endereco->save();
                DB::update("update pessoas set endereco_id = '" . $endereco->id . "' where id = '" . $pessoa->id . "'");
            }
        }
        return Redirect::route('profile.index');
    }

    /**
     * Exibe a página com o formulário para criar uma profile
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Armazena uma profile criada
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }
}
