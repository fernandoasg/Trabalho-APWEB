<?php

namespace App\Http\Controllers\Projeto;

use App\Models\Projeto\Membro;
use App\Models\Projeto\Projeto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjetoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'update']);
    }

    public function index()
    {
        $projetos = Projeto::all();
        return view('projeto.projetos')->with(compact('projetos'));
    }

    public function show($id)
    {
        $projeto = Projeto::find($id);
        $membros = Membro::where('projeto_id', $id)->get();
        return view('projeto.index')->with(compact('projeto', 'membros'));
    }

    public function edit($id)
    {
        $projeto = Projeto::find($id);
        return view('projeto.edit')->with(compact('projeto'));
    }

    public function update(Request $request)
    {

        $data = $request->validate([
            'id' => ['required'],
            'nome' => ['required'],
            'descricao' => ['required'],
            'data_inicio' => ['required'],
            'data_fim' => ['']
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

    protected function create()
    {
        return view('projeto.create')->with(compact('projeto')); 
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'nome' => ['required'],
            'descricao' => ['required'],
            'data_inicio' => ['required'],
            'data_fim' => ['']
        ]);


        Projeto::create($data);

        return redirect('/admin/projetos');

    }

}

