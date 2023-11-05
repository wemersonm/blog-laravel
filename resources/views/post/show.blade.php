@extends('master')
@section('jumbotrom')
    <div class="container">
        <div class="row">
            <h2>{{ $post->Title }}</h2>
        </div>
        <div class="row mt-5  d-flex justify-content-center">

            <div class="">
                <a href="{{ route('user.show', $post->user->Username) }}" style=" color: inherit; text-decoration:0"
                    class="d-flex position-relative text-start">
                    <img src="https://laravel.com/img/logomark.min.svg" class="flex-shrink-0 me-3" alt="..."
                        height="100px" width="100px">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <h5 class="mt-0">Por <span class="text-primary">{{ $post->user->UserFullname }}</span></h5>
                        <p class="fw-lighter">{{ 'Occupation' }}</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container p-5">
        <div class="mb-5" style="text-align: justify;">
            {{ $post->Body }}
        </div>
        <h2>Comentários <span class="fw-light lead">( {{ $post->comments->count() }} )</span></h2>
        <div class="comments">
            @forelse ($post->comments as $comment)
                <div class="media border rounded-4 Regular shadow d-flex align-itens-center mb-2">
                    <img src="{{ $comment->user->UserImage }}" class="m-3 rounded-circle" alt="userImage" width="100px"
                        height="100px">
                    <div class="media-body m-3 ">
                        <div class="d-flex gap-4">
                            <p class="fw-bold"><a class="text-primary"
                                    href="{{ route('user.show', $post->user->Username) }}">{{ $comment->user->UserFullname }}</a>
                            </p>
                            <p class="fw-medium text-sm text-secondary">{{ $comment->dateFomart() }}</p>
                        </div>
                        <p>{{ $comment->Content }}</p>
                    </div>
                </div>
            @empty
            @endforelse
        </div>

        <div class="mt-5">
            <h2>Adicionar Comentário</h2>
            @if (session()->has('errorNotLoggedForComment'))
                <p class="alert alert-warning">Faça login para comentar !</p>
            @endif
            <form action="{{ route('comment.store') }}" method="post">
                @csrf
                <div class="form-group mb-2">
                    <input type="hidden" name="IdPost" value="{{ $post->IdPost }}">
                    <textarea class="form-control" name="Content" rows="4" placeholder="Digite seu comentário aqui"></textarea>
                    @error('Content')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Enviar Comentário</button>
            </form>
            @error('IdPost')
                <p class="alert alert-warning">Erro ao fazer o comentário</p>
            @enderror
            @if (session()->has('errorInsertComment'))
                <p class="alert alert-warning">{{ session()->get('errorInsertComment') }}</p>
            @endif
        

        </div>
    </div>
@endsection
