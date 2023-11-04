<?php

namespace App\Http\Controllers;

use App\Exceptions\MyException;
use App\Exceptions\ProductInvalidException;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $posts = Post::latest('CreatedAt')->limit(10)->with(['user', 'category'])->get();
        // return $posts;
        return view('home.home', ['posts' => $posts]);
    }

   
}
