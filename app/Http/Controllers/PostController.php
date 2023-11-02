<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
    public function index(){

        $posts = Post::all();//buscando todos os dados
        return view('welcome', ['posts' => $posts]);//mapeando posts que estará no meu html e passando a variavel $posts p ele
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){ //logica do post method, altero os dados do meu model instanciado
                                            // pelos dados q eu estou recebendo no request e salvo, simples.
        $post = new Post;

        $post->tittle = $request->tittle;
        $post->content = $request->content;
        $post->private = $request->private;
        $post->team = $request->team;

        //img upload
        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")). "." . $extension;

            $requestImage->move(public_path('img/players'), $imageName);

            $post->image = $imageName;
        }

        $post->save();

        return redirect('/')->with('msg', 'Publicação feita com sucesso!');


    }

    public function show($id){
        $post = Post::findOrFail($id);

        return view('posts.show', ['post' => $post]);
    }
}
