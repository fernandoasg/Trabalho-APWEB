<?php

namespace App\Http\Controllers\Contato;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InformacoesLedes;

class ContatoController extends Controller
{
    public function index(){
        $dados_ledes = InformacoesLedes::all()->first();
        return view('contato')->with(compact('dados_ledes'));
    }

    public function __construct()
    {
          
    }

    public function sendContatctRequest(){

    }

}
