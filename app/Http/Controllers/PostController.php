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
}
