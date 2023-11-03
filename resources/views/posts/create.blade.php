@extends('layouts.main')

@section('tittle', 'Criar Publicação')

@section('content')

<div id="post-create-container" class="col-md-6 offset-md-3">
    <h1>Crie um Jogador</h1>
    <form action="/players" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nome do Jogador">
        </div>
       

        <div class="form-group">
            <label for="country">País</label>
            <select name="country" id="country" class="form-control">
                <option value="Brasil">Brasil</option>
                <option value="Espanha">Espanha</option>
                <option value="Alemanha">Alemanha</option>
                <option value="Inglaterra">Inglaterra</option>
                <option value="França">França</option>
                <option value="Itália">Itália</option>
            </select>
        </div>

        <div class="form-group">
            <label for="tittle">Títulos</label>
            <div class="form-group">
                <input type="checkbox" name="titles[]" value="World Cup"> World Cup
            </div>
            <div class="form-group">
                <input type="checkbox" name="titles[]" value="Champions League"> Champions League
            </div>
            <div class="form-group">
                <input type="checkbox" name="titles[]" value="Top Score World Cup"> Top Score World Cup
            </div>
            <div class="form-group">
                <input type="checkbox" name="titles[]" value="Ballon D'or"> Ballon D'or
            </div>
            <div class="form-group">
                <input type="checkbox" name="titles[]" value="Euro"> Euro
            </div>
            <div class="form-group">
                <input type="checkbox" name="titles[]" value="Copa América"> Copa América
            </div>
        </div>

        <div class="form-group">
            <label for="team">Times</label>
            <div class="form-group">
                <input type="checkbox" name="teams[]" value="Real Madrid"> Real Madrid
            </div>
            <div class="form-group">
                <input type="checkbox" name="teams[]" value="Barcelona"> Barcelona
            </div>
            <div class="form-group">
                <input type="checkbox" name="teams[]" value="Inter de Milão"> Inter de Milão
            </div>
            <div class="form-group">
                <input type="checkbox" name="teams[]"value="Millan"> Millan
            </div>
            <div class="form-group">
                <input type="checkbox" name="teams[]" value="Juventus"> Juventus
            </div>
            <div class="form-group">
                <input type="checkbox" name="teams[]" value="PSG"> PSG
            </div>
        </div>



        

        <input type="submit" class="btn btn-primary" value="Criar Jogador">
    </form>
</div>

@endsection