@extends('layouts.main')

@section('tittle', 'Criar Publicação')

@section('content')

<div id="post-create-container" class="col-md-6 offset-md-3">
    <h1>Crie um Post</h1>
    <form action="/posts" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Foto</label>
            <input type="file" id="image" name="image" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="tittle">Nome</label>
            <input type="text" class="form-control" id="tittle" name="tittle" placeholder="Nome do Jogador">
        </div>
        <div class="form-group">
            <label for="date">Nascimento</label>
            <input type="date" class="form-control" id="date" name="date" placeholder="Data de Nascimento">
        </div>
        <div class="form-group">
            <label for="team">Times</label>
            <input type="text" class="form-control" id="team" name="team" placeholder="Times que já jogou">
        </div>
        <div class="form-group">
            <label for="content">Sobre</label>
            <textarea class="form-control" name="content" id="content" placeholder="Sobre ele"></textarea>
        </div>
        <div class="form-group">
            <label for="private">Privado?</label>
            <select name="private" id="private" class="form-control">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tittle">Especificações</label>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="World Cup"> World Cup
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Champions League"> Champions League
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Top Score World Cup"> Top Score World Cup
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Ballon D'or"> Ballon D'or
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Euro"> Euro
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Copa América"> Copa América
            </div>
        </div>

        <input type="submit" class="btn btn-primary" value="Criar Post">
    </form>
</div>

@endsection