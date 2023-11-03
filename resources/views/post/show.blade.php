@extends('master')
@section('jumbotrom')
    <div class="row border">
        <h2>{{ $post->Title }}</h2>
    </div>
    <div class="row mt-5 w-50 border d-flex justify-content-center">
        <a href="#" style=" color: inherit;">
            <div class="d-flex position-relative text-start">
                <img src="https://laravel.com/img/logomark.min.svg" class="flex-shrink-0 me-3" alt="..." height="100px"
                    width="100px">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <h5 class="mt-0">Por <span class="text-primary">{{ $post->user->UserFullname }}</span></h5>
                    <p class="fw-lighter">{{ 'Occupation' }}</p>
                </div>
            </div>
        </a>
    </div>
@endsection
@section('content')
    <div class="container p-5">
        <div class="mb-5" style="text-align: justify;">
            {{ $post->Body }}
        </div>
        <h2>Comentários</h2>
        <div class="comments">
            <div class="media border rounded-4 Regular shadow d-flex align-itens-center mb-1">
                <img src="https://laravel.com/img/logomark.min.svg" class="m-3 rounded-circle" alt="Usuário 1" width="100px" height="100px">
                <div class="media-body m-3 ">
                    <p class="fw-bold">Messi</p>
                   <p>Ankara messi</p>
                </div>
            </div>
        </div>

       <div class="mt-5">
        <h2>Adicionar Comentário</h2>
           <form action="" method="post">
               <div class="form-group mb-2">
                   <label for="comment">Comentário</label>
                   <textarea class="form-control" id="comment" rows="4" placeholder="Digite seu comentário aqui"></textarea>
               </div>
               <button type="submit" class="btn btn-primary">Enviar Comentário</button>
           </form>
       </div>
    </div>
@endsection
