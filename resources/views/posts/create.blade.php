@extends('layouts.main')

@section('tittle', 'Criar Publicação')

@section('content')

<div id="post-create-container" class="col-md-6 offset-md-3">
    <h1>Crie um Post</h1>
    <form action="/posts" method="POST">
        @csrf
        <div class="form-group">
            <label for="tittle">Jogador</label>
            <input type="text" class="form-control" id="tittle" name="tittle" placeholder="Insira um Jogador">
        </div>
        <div class="form-group">
            <label for="tittle">Times</label>
            <input type="text" class="form-control" id="team" name="team" placeholder="Times que já jogou">
        </div>
        <div class="form-group">
            <label for="tittle">Sobre</label>
            <textarea class="form-control" name="content" id="content" placeholder="Sobre ele"></textarea>
        </div>
        <div class="form-group">
            <label for="tittle">Privado?</label>
            <select name="private" id="private" class="form-control">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <input type="submit" class="btn btn-primary" value="Criar Post">
    </form>
</div>

@endsection