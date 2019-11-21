<?php

namespace App\Http\Controllers\Profile;

use App\Models\Endereco\Cidade;
use App\Models\Endereco\Endereco;
use App\Models\Endereco\Estado;
use App\Models\Pessoa;
use App\Models\Projeto\Projeto;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
     * @param $id o id do usuário a ser buscado
     * @return array
     */
    public function getProfileViewData($id)
    {
        $user = User::find($id);

        if (!isset($user))
            abort(404);

        $usuario = [
            'id' => $user->id,
            'username' => $user->name,
            'email' => $user->email,
            'role' => ucfirst(str_replace(["\"", "[", "]"], "", $user->getRoleNames()))
        ];

        $endereco = [];
        $projetos = [];
        $pessoa = [];

        if (isset($user->pessoa->membros)) {
            foreach ($user->pessoa->membros as $membro) {
                $projeto = Projeto::find($membro['projeto_id']);
                $projeto->{"papeis"} = $membro->papeis;
                array_push($projetos, $projeto);
            }
        }

        if (isset($user->pessoa)) {
            $pessoa = $user->pessoa;

            $pessoa['nome'] = $pessoa->nome_completo;
            $pessoa['curso'] = $pessoa->curso;
            $pessoa['telefone'] = $pessoa->telefone;
            $pessoa['data_nascimento'] = $pessoa->data_nascimento;
            $pessoa['data_nascimento_dmY'] = date("d/m/Y", strtotime($pessoa->data_nascimento));
            $pessoa['sexo'] = trim($pessoa->sexo);

            if (isset($user->pessoa->endereco)) {
                $end = $user->pessoa->endereco;

                $endereco['cep'] = $end->cep;
                $endereco['bairro'] = $end->bairro;
                $endereco['rua'] = $end->rua;
                $endereco['rua_numero'] = $end->numero;

                $endereco['estado_id'] = $end->estado_id;
                $endereco['cidade_id'] = $end->cidade_id;

                $endereco['estado'] = Estado::find($end->estado_id)->uf;
                $endereco['cidade'] = Cidade::find($end->cidade_id)->nome;
            }
        }

        return [
            'pessoa' => $pessoa,
            'usuario' => $usuario,
            'endereco' => $endereco,
            'projetos' => $projetos,
        ];
    }

    public function index()
    {
        $view_data = $this->getProfileViewData(Auth::user()->id);
        return view('profile/profile')->with(compact('view_data'));
    }

    public function show($id)
    {
        $view_data = $this->getProfileViewData($id);
        return view('profile/profile')->with(compact('view_data'));
    }

    public function edit($id)
    {
        // Se o usuário a ser editado não é o logado ou não é ADM -> 401: Não autorizado
        if (!Auth::user()->can('editar usuarios') && Auth::user()->id != $id)
            abort(401);

        $view_data = $this->getProfileViewData($id);
        $estados = Estado::orderBy('nome', 'ASC')->get();

        return view('profile.profile_edit')->with(compact('estados', 'view_data'));
    }

    public function update(Request $request)
    {

        $user = User::find($_POST['user_id']);

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        if ($this->postContainsPersonData($_POST)) {

            $validatedPessoa = $request->validate([
                'nome_completo' => ['string', 'max:255'],
                'data_nascimento' => ['date_format:Y-m-d', 'before:today'],
                'sexo' => ['string', 'max:1', 'not_in:0'],
                'telefone' => ['string', 'max:20', 'nullable'],
                'curso' => ['string', 'max:255', 'nullable']
            ]);

            $validatedData = array_merge($validatedData, $validatedPessoa);

            // Se o usuário ja tem uma pessoa então a atualize senão crie uma e linke as FK
            if (isset($user->pessoa))
                $pessoa = Pessoa::where('user_id', $_POST['user_id'])->first();
            else
                $pessoa = new Pessoa();

            $pessoa->fill($validatedData);
            $pessoa->user_id = $user->id;
            $pessoa->save();

            DB::update("UPDATE users SET pessoa_id = '" . $pessoa->id . "' WHERE id = '" . $user->id . "'");

            if ($this->postContainsAddressData($_POST)) {

                $validatedEndereco = $request->validate([
                    'cep' => ['numeric', 'digits_between:7,9', 'nullable'],
                    'estado_id' => ['numeric'],
                    'cidade_id' => ['numeric'],
                    'bairro' => ['string', 'max:255', 'nullable'],
                    'rua' => ['string', 'max:255', 'nullable'],
                    'numero' => ['string', 'max:10', 'nullable']
                ]);

                if (isset($user->pessoa->endereco))
                    $endereco = Endereco::where('pessoa_id', $pessoa->id)->first();
                else
                    $endereco = new Endereco();

                $endereco->fill($validatedEndereco);
                $endereco->pessoa_id = $pessoa->id;
                $endereco->save();

                DB::update("UPDATE pessoas SET endereco_id = '" . $endereco->id . "' WHERE id = '" . $pessoa->id . "'");
            }
        }

        if (Auth::user()->id == $user->id)
            return Redirect::route('profile.index');

        return Redirect::route('dashboard_users');
    }

    public function destroy($id)
    {
        if (!Auth::user()->can('deletar usuarios'))
            return null;

        $user = User::find($id);
        if (isset($user->pessoa)) {
            if (isset($user->pessoa->endereco)) {
                DB::table('enderecos')->where('pessoa_id', $user->pessoa->id)->delete();
            }
            $user->pessoa->delete();
        }
        $user->delete();
        return;
    }

    private function postContainsPersonData($POST)
    {

        $keys_to_search = [
            'rua',
            'cep',
            'sexo',
            'cidade',
            'estado',
            'telefone',
            'numero_rua',
            'nome_completo',
            'data_nascimento'
        ];

        foreach ($keys_to_search as $key) {
            if (array_key_exists($key, $POST))
                if (!empty($POST[$key]))
                    return true;
        }
        return false;
    }

    private function postContainsAddressData($POST)
    {

        $keys_to_search = [
            'rua',
            'cep',
            'cidade',
            'estado',
            'numero_rua',
        ];

        foreach ($keys_to_search as $key) {
            if (array_key_exists($key, $POST))
                if (!empty($POST[$key]))
                    return true;
        }
        return false;
    }

}
