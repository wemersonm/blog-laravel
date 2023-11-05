@extends('master')

@php
    $title = 'Criar nova conta';
@endphp

@section('content')
    <div class="container">

        <div class="d-flex align-items-center">
            <div class="col-12 mt-5 p-2">
                <h2 class="text-center">Cadastro</h2>
                <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="Username" class="form-label">Username</label>
                        <input type="text" name="Username"
                            class="form-control @error('Username'){{ 'is-invalid' }} @enderror" id="Username"
                            value="{{ old('Username') }}">
                        @error('Username')
                            <div id="Username" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="UserFullName" class="form-label">Nome Completo</label>
                        <input type="text" name="UserFullName"
                            class="form-control @error('UserFullName'){{ 'is-invalid' }}@enderror" id="UserFullName"
                            value="{{ old('UserFullName') }}">
                        @error('UserFullName')
                            <div id="UserFullName" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="UserBio" class="form-label @error('UserBio'){{ 'is-invalid' }} @enderror">Bio</label>
                        <textarea name="UserBio" class="form-control" id="UserBio" aria-describedby="UserBio" rows="3"> {{ old('UserBio') }} </textarea>
                        @error('UserBio')
                            <div id="UserBio" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="Email" class="form-label">Email</label>
                        <input type="email" name="Email"
                            class="form-control @error('Email'){{ 'is-invalid' }} @enderror" id="Email"
                            aria-describedby="Email" value="{{ old('Email') }}">
                        @error('Email')
                            <div id="Email" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" name="password"
                            class="form-control @error('password'){{ 'is-invalid' }} @enderror" id="password"
                            aria-describedby="password">
                        @error('password')
                            <div id="password" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Occupation" class="form-label">Ocupação</label>
                        <input type="text" name="Occupation"
                            class="form-control @error('Occupation'){{ 'is-invalid' }} @enderror" id="Occupation"
                            aria-describedby="Occupation">
                        @error('Occupation')
                            <div id="Occupation" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="UserImage" class="form-label">Insira uma imagem de perfil</label>
                        <input class="form-control @error('UserImage'){{ 'is-invalid' }} @enderror" type="file"
                            id="UserImage" name="UserImage">
                        @error('UserImage')
                            <div id="UserImage" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-center mt-1">
                        <button class="btn btn-success flex-grow-1">Criar</button>
                    </div>  
                    @if (session()->has('errorCreateUser'))
                        <p class="alert alert-danger">{{ session()->get('errorCreateUser') }}</p>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
