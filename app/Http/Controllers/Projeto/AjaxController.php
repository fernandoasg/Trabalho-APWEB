<?php

namespace App\Http\Controllers\Projeto;

use App\Models\Projeto\Projeto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    public function changeVisibilidade(Request $request)
    {
        $visibilidade = $request->get('visibilidade');
        $projeto = Projeto::find($request->get('projeto_id'));

        if ($projeto->visibilidade === true)
            $visibilidade_anterior = 'true';
        else
            $visibilidade_anterior = 'false';

        echo 'Alterando a visibilidade do projeto ' . $projeto->nome . ' para ' . $visibilidade . ' antes era ' . $visibilidade_anterior;

        $projeto->visibilidade = $visibilidade;
        $projeto->save();
    }
}
