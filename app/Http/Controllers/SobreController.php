<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SobreController extends Controller
{
    public function index(){
        return view('sobre');
    }

    public function contato(){
//        +"id": 1
//        +"nome": "Laboratório Ledes"
//        +"email": "ledes.laboratorio@gmail.com"
//        +"horario_abertura": "08:00:00"
//        +"horario_encerramento": "21:00:00"
//        +"endereco": "Campo Grande MS, Cidade Universitária, caixa postal 549"
//        +"cep": "79070-900"
        $dados_ledes = DB::table('informacoes_ledes')->get()->first();
        return view('contato')->with(compact('dados_ledes'));
    }
}
