<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SobreController extends Controller
{
    public function index(){
        return view('sobre');
    }

    public function contato(){
        return view('contato');
    }
}
