<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Player;
use App\Models\Team;

class PlayerController extends Controller
{

    public function create(){
        $teams = Team::all();
        return view('posts.create',['teams'=>$teams]);
    }


    public function store(Request $request){
        $player = new Player;

        $player->name = $request->name;
        $player->country = $request->country;
        $player->titles = $request->titles;
        $player->teams = $request->teams;
        $player->save();

        

        return redirect('/')->with('msg', 'Jogador criado!');
    }
}
