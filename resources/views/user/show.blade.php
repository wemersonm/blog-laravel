@extends('master')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow">
                    <img src="{{ $user->UserImage }}" class="card-img-top" alt="Imagem de Perfil">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->UserFullname }}</h5>
                        <p class="text-secondary">{{ '@' . $user->Username }}</p>
                        @if (!empty($user->Occupation))
                            <p>{{ $user->Occupation }}</p>
                        @endif
                        <p class="card-text  fst-italic">{{ $user->UserBio }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 d-flex flex-column container-post-user">
                <h4 class="bg-light p-2 rounded">Ultimos Posts</h4>
                <div class="container-card flex-grow-1">
                    @forelse ($posts as $post)
                        <div class="card shadow mb-3 card-post-user-max-height">
                            <a href="{{ route('category.posts', ['category' => $post->category->slugCategory]) }}"
                                class="badge text-bg-primary mb-2"
                                style="text-decoration: 0;">{{ $post->category->NameCategory }}</a>

                            <div class="card-body">
                                <a href="{{ route('post.show', $post->SlugPost) }}"
                                    style="text-decoration: 0;color:inherit">
                                    <h5 class="card-title">{{ $post->Title }}</h5>
                                    <p class="card-text">{{ Str::limit($post->Body, 40, ' ...') }}</p>
                                    <span class="fst-italic text-secondary">{{ $post->dateFormat() }}</span>
                                </a>
                            </div>
                        </div>
                    @empty
                        <h5 class="text-primary p-2">Não tem posts</h5>
                    @endforelse
                </div>
                @if ($posts)
                    <div class="post-user-pagination">
                        {{ $posts->links() }}
                    </div>
                @endif
            </div>

        </div>
       
    </div>
@endsection
