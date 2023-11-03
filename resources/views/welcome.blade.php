@extends('layouts.main')

@section('tittle', 'Blog do Real Madrid')

@section('content')

<div id="search-container" class="col-md-12">
    <h1></h1>
    <form action="/" method="GET">
        <input type="text" name="search" id="search" class="form-control" placeholder="Busque um Jogador">
    </form>
</div>

<div id="posts-container" class="col-md-12">
    @if($search)
    <h2>Buscando por: {{ $search }}</h2>
    @else
    <h2>Jogadores</h2>
    <p class="subtittle">Veja o que está rolando</p>
    @endif
    <div id="cards-container" class="row">
        @foreach($posts as $post)
            <div class="card col-md-3">
                <img src="/img/players/{{ $post->image }}" alt="{{ $post->tittle }}">
                <div class="card-body">
                    <p class="card-date">{{ date('d/m/Y', strtotime($post->date)) }}</p>
                    <h5 class="card-tittle">{{ $post->tittle }}</h5>
                    <p class="card-participants">x curtidas</p>
                    <a href="/posts/{{ $post->id }}" class="btn btn-primary">saber mais</a>
                </div>
            </div>
        @endforeach
        @if(count($posts)==0 && $search)
            <p>Não foi encontrado nenhum <strong>{{ $search }}</strong>. <a href="/">Ver todos!</a></p>
        @elseif(count($posts)==0)
            <p>Não há jogadores disponíveis</p>
        @endif    
    </div>
</div>

@endsection