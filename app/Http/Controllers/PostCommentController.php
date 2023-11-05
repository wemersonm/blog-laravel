<?php

namespace App\Http\Controllers;

use App\Models\PostComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PostCommentController extends Controller
{
    public function store(Request $r)
    {
        $validations = $r->validate([
            'Content' => 'required|max:230',
            'IdPost' => 'required|numeric|exists:Post,IdPost'
        ]);
        $idUser = Auth::user()->IdUser ?? false;
        if(!$idUser) return Redirect::back()->with('errorNotLoggedForComment','Deve está logado no sistema para comentar !');
        $inserted = PostComment::create([
            'IdPost' => $validations['IdPost'],
            'IdUser' => Auth::user()->IdUser,
            'Content' => $validations['Content']
        ]);
        if ($inserted) return back();
        return Redirect::back()->with('errorInsertcomment','Erro ao salvar comentário');
    }
}
