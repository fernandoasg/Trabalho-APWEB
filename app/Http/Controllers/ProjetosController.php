<?php

namespace App\Http\Controllers;
use App\Models\Projeto\Projeto;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;


class ProjetosController extends Controller
{
    public function index(){
        return view('projetos', [
            'projeto1'=>'SIGFAP',
            'projeto2'=>'SIAI',
            'projeto3'=>'Portal LEDES'
        ]);
    }

    public function  mostra($nomeProjeto){
        return view('projeto', [
            'nomeProjeto'=>$nomeProjeto,
            'descricaoProjeto'=>'Descrição do projeto replicada 10 vezes Descrição do projeto replicada 10 vezes Descrição do projeto replicada 10 vezes Descrição do projeto replicada 10 vezes Descrição do projeto replicada 10 vezes Descrição do projeto replicada 10 vezes Descrição do projeto replicada 10 vezes Descrição do projeto replicada 10 vezes Descrição do projeto replicada 10 vezes Descrição do projeto replicada 10 vezes',
            'vantagensProjeto'=>'Vantagens do projeto x20 Vantagens do projeto x20 Vantagens do projeto x20 Vantagens do projeto x20 Vantagens do projeto x20 Vantagens do projeto x20 Vantagens do projeto x20 Vantagens do projeto x20 Vantagens do projeto x20 Vantagens do projeto x20 Vantagens do projeto x20 Vantagens do projeto x20 Vantagens do projeto x20 Vantagens do projeto x20  Vantagens do projeto x20 Vantagens do projeto x20 Vantagens do projeto x20 Vantagens do projeto x20 Vantagens do projeto x20 Vantagens do projeto x20'
        ]);
    }


    protected function create(array $data)
    {
        return Projeto::create([
            'nome' => $data['nome'],
            'descricao' => $data['descricao'],
            'data_inicio'=>$data['data_inicio'],
            'data_fim'=>$data['data_fim']
        ]);
    }

    public function storeProjeto(Request $request){
        event(new Registered($projeto = $this->create($request->all())));

        return redirect('/admin/projetos');

    }
}
