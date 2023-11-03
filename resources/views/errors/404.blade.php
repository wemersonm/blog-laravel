@extends('master')
@php
    $title = "Página não encontrada"
@endphp
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <h1 class="mt-5">404 - Página não encontrada</h1>
                <p class="lead">Desculpe, a página que você está procurando não foi encontrada.</p>
                <a href="{{ route('home.index')}}" class="btn btn-primary ">Voltar para a página inicial</a>
                {{ $exception->getMessage() }}
            </div>
        </div>
    </div>
@endsection
