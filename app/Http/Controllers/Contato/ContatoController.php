<?php

namespace App\Http\Controllers\Contato;

use App\Http\Controllers\Controller;
use App\Models\InformacoesLedes;

class ContatoController extends Controller
{
    public function index(){
        $dados_ledes = InformacoesLedes::all()->first();
        return view('contato')->with(compact('dados_ledes'));
    }
}
