<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function __construct()
    {
        //todo verificar se o usuario logado é adm
        $this->middleware('auth');
    }

    /**
     * Mostra a area do administrador
     */
    public function index(){
        return view('Admin.index');
    }
}
