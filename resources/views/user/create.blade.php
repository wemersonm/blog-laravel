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
                        <label for="UserBio" class="form-label">Bio</label>
                        <textarea name="UserBio" class="form-control" id="UserBio" aria-describedby="UserBio" rows="3"> {{ old('UserBio') }} </textarea>
                        {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                    </div>

                    <div class="mb-3">
                        <label for="Email" class="form-label">Email</label>
                        <input type="email" name="Email" class="form-control" id="Email" aria-describedby="Email"
                            value="{{ old('UserBio') }}">
                        {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                    </div>

                    <div class="mb-3">
                        <label for="Password" class="form-label">Senha</label>
                        <input type="password" name="Password" class="form-control" id="Password"
                            aria-describedby="Password">
                        {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                    </div>

                    <div class="mb-3">
                        <label for="UserImage" class="form-label">Insira uma imagem de perfil</label>
                        <input class="form-control" type="file" id="UserImage" name="UserImage">
                    </div>

                    <div class="d-flex justify-content-center mt-1">
                        <button class="btn btn-success w-50">Criar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
