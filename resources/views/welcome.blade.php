@extends('layouts.main')

@section('tittle', 'Blog do Tenaci')

@section('content')

@foreach($posts as $post) <!-- aqui eu mapeio o 'post' passado no array no controller, se trocar o nome dele, nao funcionar -->
    <p>
        {{ $post->tittle }} -- {{ $post->content }} <!-- resgatando valores do meu banco de dados-->
    </p>
@endforeach


@endsection