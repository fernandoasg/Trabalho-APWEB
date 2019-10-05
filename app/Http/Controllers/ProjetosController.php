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

    public function sigfap(){
        return view('projeto', [
            'nomeProjeto'=>'SIGFAP'
        ]);
    }

    public function siai(){
        return view('projeto', [
            'nomeProjeto'=>'SIAI'
        ]);
    }

    public function ledes(){
        return view('projeto', [
            'nomeProjeto'=>'Portal LEDES'
        ]);
    }
}
