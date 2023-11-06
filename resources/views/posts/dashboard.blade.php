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
                        <td>{{ count($post ->users) }}</td>
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
<div class="col-md-10 offset-md-1 dashboard-tittle-container">
    <h1>Posts que curti</h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-posts-container">
    @if(count($postsAsReaction)>0)
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
                @foreach($postsAsReaction as $post)
                    <tr>
                        <td scropt="row">{{ $loop->index + 1 }}</td>
                        <td><a href="/posts/{{ $post->id }}">{{ $post->tittle }}</a></td>
                        <td>{{ count($post ->users) }}</td>
                        <td>
                            <form action="posts/unreact/{{ $post->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn">
                                    <ion-icon name="trash-outline"></ion-icon>Remover curtida</button>
                                </button>


                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @else
        <p>Você não curtiu nada ainda, <a href="/">veja o que está rolando.</a></p>
    @endif

</div>

@endsection