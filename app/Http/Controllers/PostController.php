<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostComment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
        return view("post.create");
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function show(Post $post)
    {
         $post->load(['user','comments.user']);
        // return $post;
        return view('post.show')->with('post', $post);
    }
}
