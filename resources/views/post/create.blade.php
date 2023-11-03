@extends('master')

@php
    $title = 'Criar Post';
@endphp
@section('content')
    <div class="d-flex justify-content-center align-items-center mt-5">
        <div class="col-12 border border-2 rounded p-3">
            <form action="/post" method="post">
                <div class="mb-3">
                    <label class="form-label">Titulo do post</label>
                    <input class="form-control" type="text" name="Title" placeholder="Titulo" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Conteúdo do post</label>
                    <textarea class="form-control" name="Body" id="body"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Categoria</label>
                    <select name="IdCategory" class="form-control">
                        <option value="">Selecione categoria</option>
                        <option value="1">Desenvolvimento Web</option>
                        <option value="2">Linguagens de Programação</option>
                        <option value="3">Inteligência Artificial</option>
                        <option value="4">Segurança da Informação</option>
                    </select>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="IdTag[]" value="1" id = "PHP" />
                        <label class="form-check-label" for="PHP">PHP</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="IdTag[]" value="2" id = "C#" />
                        <label class="form-check-label" for="C#">C#</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="IdTag[]" value="3" id = "JavaScript" />
                        <label class="form-check-label" for="JavaScript">JavaScript</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="IdTag[]" value="4" id= "C++" />
                        <label class="form-check-label" for="C++">C++</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="IdTag[]" value="4" id = "VueJS" />
                        <label class="form-check-label" for="VueJS">VueJS</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="UserImage" class="form-label">Insira uma imagem de perfil</label>
                    <input class="form-control" type="file" id="UserImage" name="UserImage">
                </div>

                <div class="d-flex justify-content-center mt-1">
                    <button class="btn btn-success w-50">Criar</button>
                </div>

            </form>
            <a href="{{ url()->previous()}}" class="btn btn-warning">Voltar</a>
        </div>

    </div>
@endsection
