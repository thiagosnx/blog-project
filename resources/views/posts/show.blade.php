@extends('layouts.main')

@section('tittle', $post->tittle)

@section('content')

    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/img/players/{{ $post->image }}" class="img-fluid" alt="{{ $post->tittle }}">
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{ $post->tittle }}</h1>
                <p class="post-team"><ion-icon name="location-outline"></ion-icon> {{ $post->team }}</p>
                <p class="post-participants"><ion-icon name="people-outline"></ion-icon> Likes</p>
                <p class="post-owner"><ion-icon name="star-outline"></ion-icon> Dono do Post</p>
                <a href="" class="btn btn-primary" id="post-submit"> Curti</a>
            </div>
            <div class="col-md-12" id="content-container">
                <h3>Sobre:</h3>
                <p class="post-content">{{ $post->content }}</p>
            </div>
        </div>
    </div>

@endsection