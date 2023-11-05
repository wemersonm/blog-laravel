<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $posts = Post::where('Title', 'like', '%' . $search . '%')
                ->orWhere('Body', 'like', '%' . $search . '%')
                ->latest('CreatedAt')
                ->with(['user', 'category'])
                ->paginate(6);
        } else {
            $posts = Post::latest('CreatedAt')
                ->limit(10)
                ->with(['user', 'category'])
                ->get();
        }
        $categories = Category::all();


        return view('home.home', compact('posts', 'categories'));
    }
}
