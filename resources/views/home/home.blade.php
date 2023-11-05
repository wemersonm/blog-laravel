@extends('master')

@section('jumbotrom')
    <!-- Jumbotron -->
    <div class="container text-center">
        <h2 class="mb-3 ">Buscar Post</h2>
        <div class="d-flex justify-content-center align-items-center">

            <form action="{{ route('home.index') }}" method="get" class="w-100">
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" placeholder="O que deseja buscar?" value="{{request()->input('search') ?? ""}}">
                    <button class="btn btn-warning">Buscar</button>
                </div>
            </form>
        </div>
        <div class="mt-2">
            <h4>Categorias do Blog</h4>
            <div class="d-inline" id="list-categories">
                @forelse ($categories as $category)
                    <a href="{{ route('category.posts', $category->slugCategory) }}"
                        class="badge bg-primary">{{ $category->NameCategory }}</a>
                @empty
                @endforelse
            </div>
        </div>
    </div>
    <!-- Jumbotron -->
@endsection

@section('content')
    <div class="container mb-5">
        <!--Section: Content-->
        <section class="text-center">
            <h4 class="mb-5"><strong>Ultimos Posts</strong></h4>
            <div class="container-posts">
                @forelse ($posts as $post)
                    <div class="card card-post">
                        <a href="{{ route('post.show', $post->SlugPost) }}">
                            <div class="bg-image hover-overlay ripple">
                                <img src="{{ $post->ThumbPost }}" class="img-fluid" />
                            </div>
                            <div class="card-body">
                                <a href="{{ route('category.posts', $post->category->slugCategory) }}"
                                    class="badge text-bg-primary mb-2"
                                    style="text-decoration: 0">{{ $post->category->NameCategory }}</a>
                                <h5 class="card-title">{{ $post->Title }}</h5>
                                <p class="card-text">
                                    {{ Str::limit($post->Body, 100, '...') }}
                                </p>
                                <p>
                                    Por <a class="link-underline link-underline-opacity-0"
                                        href="{{ route('user.show', $post->user->Username) }}"
                                        class="fw-lighter">{{ $post->user->UserFullname }}</a>
                                </p>
                                <a href="{{ route('post.show', $post->SlugPost) }}" class="btn btn-primary">Leia mais</a>
                            </div>
                        </a>
                    </div>
                @empty
                    <h2 class="text-center text-dark">Nenhum post</h2>
                @endforelse

            </div>
        </section>
        @if (request()->input('search'))
            <div class="my-4 d-flex justify-content-center">
                {{ $posts->appends(['search' => request()->input('search')])->links() }}
            </div>
        @endif
    </div>
@endsection
