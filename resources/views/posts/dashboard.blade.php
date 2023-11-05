@extends('layouts.main')

@section('tittle', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-tittle-container">
    <h1>Minhas Publicações</h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-posts-container">
    @if(count($posts)>0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Curtidas</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td scropt="row">{{ $loop->index + 1 }}</td>
                        <td><a href="/posts/{{ $post->id }}">{{ $post->tittle }}</a></td>
                        <td>0</td>
                        <td>
                            <a href="/posts/edit/{{ $post->id }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Editar</a> 
                            <form action="/posts/{{ $post->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
                            </form>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    @else
        <p>Você não tem publicações, <a href="/posts/create">comece agora.</a></p>
    @endif
</div>

@endsection