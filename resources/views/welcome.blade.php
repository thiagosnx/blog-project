@extends('layouts.main')

@section('tittle', 'Blog do Real Madrid')

@section('content')

<div id="search-container" class="col-md-12">
    <h1></h1>
    <form action="">
        <input type="text" name="search" id="search" class="form-control" placeholder="Busque um Jogador">
    </form>
</div>

<div id="posts-container" class="col-md-12">
    <h2>Publicações</h2>
    <p class="subtittle">Veja o que está rolando</p>
    <div id="cards-container" class="row">
        @foreach($posts as $post)
            <div class="card col-md-3">
                <img src="/img/players/{{ $post->image }}" alt="{{ $post->tittle }}">
                <div class="card-body">
                    <p class="card-date">02/11/2023</p>
                    <h5 class="card-tittle">{{ $post->tittle }}</h5>
                    <p class="card-participants">x participantes</p>
                    <a href="/posts/{{ $post->id }}" class="btn btn-primary">saber mais</a>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection