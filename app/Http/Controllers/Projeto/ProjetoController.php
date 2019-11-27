<?php

namespace App\Http\Controllers\Projeto;

use App\Models\Projeto\Membro;
use App\Models\Projeto\Projeto;
use App\Models\Projeto\Papel;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Projeto\MembroPapel;

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

        $oculto = $request->has('oculto');

        $data = $request->validate([
            'id' => ['required'],
            'nome' => ['required', 'max:20', 'unique:projetos'],
            'descricao' => ['required'],
            'data_inicio' => ['required', 'date'],
            'data_fim' => ['nullable', 'date', 'after:data_inicio'],
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
        $pessoas = Pessoa::all();
        $papeis = Papel::all();
        return view('projeto.create')->with(compact('pessoas', 'papeis'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => ['required', 'max:20', 'unique:projetos'],
            'descricao' => ['required'],
            'data_inicio' => ['required', 'date'],
            'data_fim' => ['nullable', 'date', 'after:data_inicio']
        ]);

        $arrayIdPessoa = array(); // Tem os ids dos membros
        $arrayIdPapel = array(); // Tem os nomes das funções
        $i = 0;
        while($request->exists('member'.$i)){
            $IdEFuncao = $request->get('member'.$i);
            $pos = strpos($IdEFuncao, '-');
            $string = substr($IdEFuncao, 0, $pos);
            array_push($arrayIdPessoa, $string);
            $string = substr($IdEFuncao, $pos+1);        
            array_push($arrayIdPapel, $string);
            $i += 1;
        }

        $projeto = Projeto::create($data);

        for ($i = 0; $i < count($arrayIdPessoa); $i++) {
            $membro = new Membro();
            $membro->data_entrada = $projeto->data_inicio;
            $membro->data_saida = '2333-07-01';
            $membro->projeto_id = $projeto->id;
            $membro->pessoa_id = $arrayIdPessoa[$i];
            $membro->save();

            $membroPapel = new MembroPapel();
            $membroPapel->papel_id = $arrayIdPapel[$i];
            $membroPapel->membro_id = $arrayIdPessoa[$i];
            $membroPapel->save();
        }      

        return redirect()->route('dashboard_projetos');
    }
}
