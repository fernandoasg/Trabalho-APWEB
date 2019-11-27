<?php

namespace App\Http\Controllers\Post;

use App\Models\Pessoa;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->get();
        return view('home')->with(compact('posts'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $post = Post::find($id);
        $autor = Pessoa::find($post->pessoa_id);
        return view('posts.post')->with(compact('post', 'autor'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
