<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{

    /**
     * Printa as tags de opções de cidades de acordo com o estado enviado na request
     * @param Request $request
     */
    public function getCidades(Request $request){
        {

            // O campo a ser usado como chave
            $select = $request->get('select');

            // O valor delimitador
            $value = $request->get('value');

            // ???
            $dependent = $request->get('dependent');

            $data = DB::table('cidades')
                ->where($select, $value)
                ->groupBy($dependent)
                ->get();

            $output = '<option value="">Select '.ucfirst($dependent).'</option>';

            foreach($data as $row)
            {
                $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
            }

            dd($output);
            echo $output;
        }
    }
}
