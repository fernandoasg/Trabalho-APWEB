<?php /** @noinspection ALL */

namespace App\Http\Controllers\Endereco;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{

    /**
     * Printa as tags de opções de cidades de acordo com o estado enviado na request
     * @param Request $request
     */
    public function getCidades(Request $request)
    {
        $data = DB::table('cidades')
            ->where('id_estado', $request->get('value'))
            ->orderBy('nome')
            ->get();

        $output = '';

        foreach ($data as $cidade) {
            $output .= '<option value="' . $cidade->id . '">' . $cidade->nome . '</option>';
        }
        echo $output;
    }

    /**
     * Retorna o ID do estado e o ID da cidade solicitados
     * @param Request $request
     */
    public function getEstadoCidade(Request $request)
    {

        $data = DB::table('estados')
            ->where('uf', '=', $request->get('uf'))
            ->get('id');

        // Só retorna um estado
        foreach ($data as $estado)
            $uf_id = $estado->id;

        $data = DB::table('cidades')
            ->where('id_estado', '=', $uf_id)
            ->where('nome', 'like', '%'. $request->get('cidade') . '%')
            ->get('id');

        // Só retorna uma cidade
        foreach ($data as $cidade)
            $cidade_id = $cidade->id;

        echo json_encode(array($uf_id, $cidade_id));
    }
}


