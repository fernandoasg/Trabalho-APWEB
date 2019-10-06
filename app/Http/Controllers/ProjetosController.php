<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
