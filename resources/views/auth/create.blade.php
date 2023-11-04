@extends('master')

@php
    $title = 'Criar usuario';
@endphp
@section('content')
    <div class="d-flex justify-content-center align-items-center mt-5">
        <div class="col-10 col-md-6 col-lg-4 border border-2 rounded p-3">
            <h2 class="text-center">Login</h2>
            <form action="{{ route('auth.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="username">Username</label>
                    <input
                        class="form-control @error('Username')
                        {{ 'is-invalid' }}
                    @enderror"
                        type="text" id="username" name="Username" value={{ old('Username') }}>
                    @error('Username')
                        <div class="form-text text-danger"> {{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password">Senha</label>
                    <input
                        class="form-control @error('password')
                        {{ 'is-invalid' }}
                    @enderror"
                        type="password" id="password" name="password">
                    @error('Password')
                        <div class="form-text text-danger"> {{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="submit" value="Entrar" class="btn btn-primary">
                </div>
                @if (session()->has('credentialsFail'))
                    <div class="alert alert-danger">
                        {{ session('credentialsFail') }}
                    </div>
                @endif
            </form>
        </div>
    </div>
@endsection
