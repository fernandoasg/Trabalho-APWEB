<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function index()
    {
    	$noticias = Noticia::orderBy('data_criacao', 'desc')->paginate(10);
    	return view('noticias.index', ['noticias' => $noticias]);
    }

    public function create()
    {
    	return view('noticias.create');
    }

    public function save()
    {
    	$noticia = new Noticia;
    	$noticia->titulo = $request->titulo;
    	$noticia->descricao = $noticia->descricao;
    	$noticia->save();

    	return redirect()->route('noticias.index')->with('message', 'Notícia publicada!');
    }

    public function edit($id)
    {
    	$noticia = Noticia::findOrFail($id);
    	return view('noticias.edit', compact('noticia'));
    }

    public function destroy($id)
    {
    	$noticia = Noticia::findOrFail($id);
    	$noticia->delete();
    	return redirect()->route('noticias.index')->with('alert-success', 'Notícia excluída!');
    }
}
