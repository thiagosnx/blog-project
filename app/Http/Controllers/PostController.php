<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index(){

        $search = request('search');

        if($search){

            $posts = Post::where([
                ['tittle', 'like', '%'.$search.'%']
            ])->get();

        }else{
            $posts = Post::all();//buscando todos os dados
        }

       
        return view('welcome', ['posts' => $posts, 'search' => $search]);//mapeando posts que estará no meu html e passando a variavel $posts p ele
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){ //logica do post method, altero os dados do meu model instanciado
                                            // pelos dados q eu estou recebendo no request e salvo, simples.
        $post = new Post;

        $post->tittle = $request->tittle;
        $post->date = $request->date;
        $post->content = $request->content;
        $post->private = $request->private;
        $post->team = $request->team;
        $post->items= $request->items;

        //img upload
        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")). "." . $extension;

            $requestImage->move(public_path('img/players'), $imageName);

            $post->image = $imageName;
        }

        $user = auth()->user();
        $post->user_id = $user->id;


        $post->save();

        return redirect('/')->with('msg', 'Publicação feita com sucesso!');


    }

    public function show($id){
        $post = Post::findOrFail($id);

        $user = auth()->user();
        $hasUserReacted = false;

        if($user){
            $userReacts = $user->postsAsReaction->toArray();

            foreach($userReacts as $userReact){
                if($userReact['id'] == $id){
                    $hasUserReacted = true;
                }
            }
        }

        $postOwner = User::where('id', $post->user_id)->first()->toArray(); //encontrando usario pelo id

        return view('posts.show', ['post' => $post, 'postOwner' => $postOwner, 'hasUserReacted' => $hasUserReacted]);
    }

    public function dashboard(){
        $user = auth()->user();

        $posts = $user->posts;

        $postsAsReaction = $user->postsAsReaction;

        return view('posts.dashboard', ['posts' => $posts, 'postsAsReaction' => $postsAsReaction]);
    }

    public function destroy($id){
        Post::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Publicação exclúida!');
    }

    public function edit($id){
        $user = auth()->user();

        $post = Post::findOrFail($id);

        if($user->id != $post->user_id){
            return redirect('/dashboard');
        }
            
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request){

        $data = $request->all();

        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")). "." . $extension;

            $requestImage->move(public_path('img/players'), $imageName);

            $data['image'] = $imageName;
        }


        Post::findOrFail($request->id)->update($data);
        return redirect('/dashboard')->with('msg', 'Publicação editada!');
    }

    public function reactPost($id){
        $user = auth()->user();

        $user->postsAsReaction()->attach($id);

        $post = Post::findOrFail($id);

        return back()->with('msg', 'Like no ' . $post->tittle);
    }

    public function unreactPost($id){
        $user = auth()->user();
        $user->postsAsReaction()->detach($id);
        $post = Post::findOrFail($id);
        return back()->with('msg', 'Curtida removida de ' . $post->tittle);
    }
}
