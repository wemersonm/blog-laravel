@extends('master')

@section('content') @php $title = "Posts do Blog" @endphp

<h1>TODOS OS POSTS</h1>
<ul>
    @foreach ($posts as $post)
        <li>{{ $post }}</li>
    @endforeach
</ul>
@endsection
