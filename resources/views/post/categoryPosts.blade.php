@extends('master')

@php
    $title = 'Posts from ' . $category->NameCategory;
@endphp
@section('jumbotrom')
    <div class="text-center">
        <p>Categoria</p>
        <h2>{{ $category->NameCategory }}</h2>
        <p class="fw-light lead"> ({{ $posts->total() }}) Posts</p>
    </div>
@endsection
@section('content')
    <div class="container mt-5">
        <h6>Ultimos posts</h6>

        <ul class="list-group">
            @forelse ($posts as $post)
                <li class="list-group-item mb-3 border">
                    <a href="{{route('post.show',$post->SlugPost)}}" style="text-decoration: 0; color:inherit;">
                        <div class="row">
                            <div class="col-md-2 d-flex align-items-center">
                                <img class="rounded-circle img-fluid" src="{{ $post->user->UserImage }}" alt="Imagem do Autor"
                                    width="100px" height="100px">
                            </div>
                            <div class="col-md-10">
                                <h5 class="text-primary">{{ $post->user->UserFullname }}</h5>
                                <h4>{{ $post->Title }}</h4>
                                <p class="fw-light">{{ $post->dateFormat() }}</p>
                            </div>
                        </div>
                    </a>
                </li>
            @empty
                <h3>Nenhum post </h3>
            @endforelse
        </ul>

      <div class="d-flex justify-content-center">
        {{$posts->links()}}
      </div>
    </div>
@endsection
