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

        $data = $request->validate([

            'nome' => ['required'],
            'descricao' => ['required'],
            'data_inicio'=> ['required'],
            'data_fim'=>['']

        ]);

        Projeto::create($data);

        return redirect('/admin/projetos');

    }

    public function updateProjeto(Request $request){


        $data = $request->validate([
            'id'=>['required'],
            'nome' => ['required'],
            'descricao' => ['required'],
            'data_inicio'=> ['required'],
            'data_fim'=>['']

        ]);

        $projeto = Projeto::find($data['id']);

        $projeto->nome = $data['nome'];
        $projeto->descricao = $data['descricao'];
        $projeto->data_inicio = $data['data_inicio'];
        $projeto->data_fim = $data['data_fim'];


        $projeto->push();

        return redirect('/admin/projetos');


    }


    public function deleteProjeto(Request $request){
        
        $id = $request['id'];
        
        Projeto::destroy($id);

        return redirect('/admin/projetos');
    }

}
