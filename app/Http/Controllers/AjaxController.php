<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{

    /**
     * Printa as tags de opções de cidades de acordo com o estado enviado na request
     * @param Request $request
     */
    public function getCidades(Request $request){
        {

            // O valor delimitador
            $value = $request->get('value');

            $data = DB::table('cidades')
                ->where('id_estado', $value)
                ->orderBy('nome')
                ->get();

            $output = '';

            foreach($data as $row)
            {
                $output .= '<option value="'.$row->id.'">'.$row->nome.'</option>';
            }
            echo $output;
        }
    }
}
