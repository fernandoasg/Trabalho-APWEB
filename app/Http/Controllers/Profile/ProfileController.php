<?php

namespace App\Http\Controllers\Profile;

use App\Models\Endereco\Cidade;
use App\Models\Endereco\Estado;
use App\Models\Pessoa;
use App\Models\Projeto\Membro;
use App\Models\Projeto\Projeto;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware('auth');

        // Registros membros da pessoa logada
        $projetos = [];
        foreach (Auth::user()->pessoa->membros as $membro){
            array_push($projetos, Projeto::find($membro['projeto_id']));
        }

        $view_data = [

//          User
            'username' => Auth::user()->name,
            'email' => Auth::user()->email,

//          Pessoa
            'nome' => Auth::user()->pessoa->nome_completo,
            'curso' => Auth::user()->pessoa->curso,
            'telefone' => Auth::user()->pessoa->telefone,
            'cidade' => Cidade::find(Auth::user()->pessoa->endereco->cidade_id)->nome,
            'estado' => Estado::find(Auth::user()->pessoa->endereco->estado_id)->uf,
            'data_nascimento' => str_replace('-', '/', date("m-d-Y", strtotime(Auth::user()->pessoa->data_nascimento))),

//           Projeto
            'projetos' => $projetos

        ];

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
    public function show($id)
    {
        //
    }

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
