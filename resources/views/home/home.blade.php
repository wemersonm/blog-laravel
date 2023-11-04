@extends('master')

@section('jumbotrom')
    <!-- Jumbotron -->
    <div class="container text-center">
        <h2 class="mb-3 ">Buscar Post</h2>
        <div class="d-flex justify-content-center align-items-center">
            <form action="" method="get" class="w-100">
                <div class="input-group mb-3 ">
                    <input type="text" class="form-control" placeholder="O que deseja buscar?">
                    <button class="btn btn-warning">Buscar</button>
                </div>
            </form>
        </div>
        <div class="mt-2">
            <h4>Categorias do Blog</h4>

            <div class="d-inline" id="list-categories">
                <a href="#" class="badge bg-primary">Moda</a>

            </div>
        </div>
    </div>
    <!-- Jumbotron -->
@endsection

@section('content')
    <div class="container">
        <!--Section: Content-->
        <section class="text-center">
            <h4 class="mb-5"><strong>Ultimos Posts</strong></h4>
            <div class="container-posts">
                @forelse ($posts as $post)
                    <div class="card card-post">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img src="{{ $post->ThumbPost }}" class="img-fluid" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </a>
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
                                Por <a href="{{ route('user.show', $post->user->Username) }}"
                                    class="fw-lighter">{{ $post->user->UserFullname }}</a>
                            </p>
                            <a href="{{ route('post.show', $post->SlugPost) }}" class="btn btn-primary">Leia mais</a>
                        </div>
                    </div>
                @empty
                    <h2 class="text-center text-dark">Nenhum post</h2>
                @endforelse

            </div>
        </section>
        <!--Section: Content-->

        <!-- Pagination -->
        {{-- <nav class="my-4" aria-label="...">
            <ul class="pagination pagination-circle justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav> --}}
    </div>
@endsection
