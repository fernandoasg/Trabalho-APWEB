<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class SobreController extends Controller
{
    public function index(){
        return view('sobre');
    }

    public function contato(){
        $dados_ledes = DB::table('informacoes_ledes')->get()->first();
        return view('contato')->with(compact('dados_ledes'));
    }
}
