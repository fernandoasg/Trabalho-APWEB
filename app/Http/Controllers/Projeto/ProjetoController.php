<?php

namespace App\Http\Controllers\Projeto;

use App\Models\Projeto\Projeto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjetoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['edit', 'index', 'update']);
    }

    public function show($id)
    {
        $projeto = Projeto::find($id);
        return view('projeto.index')->with(compact('projeto'));
    }

    public function edit($id)
    {

    }

    public function update(Request $request)
    {

        $data = $request->validate([
            'id'=>['required'],
            'nome' => ['required'],
            'descricao' => ['required'],
            'data_inicio'=> ['required'],
            'data_fim'=>['']
        ]);

        $projeto = Projeto::find($data['id']);

        $projeto->nome = $data['nome'];
        $projeto->descricao = $data['descricao'];
        $projeto->data_inicio = $data['data_inicio'];
        $projeto->data_fim = $data['data_fim'];

        $projeto->save();

        return redirect('/admin/projetos');
    }

    public function destroy($id)
    {
        Projeto::destroy($id);
        return redirect('/admin/projetos');
    }

    protected function create(array $data)
    {
        return Projeto::create([
            'nome' => $data['nome'],
            'descricao' => $data['descricao'],
            'data_inicio'=>$data['data_inicio'],
            'data_fim'=>$data['data_fim']
        ]);
    }

    public function store(Request $request){
    }

}

