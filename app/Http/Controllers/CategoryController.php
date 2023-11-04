<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showPosts( $slugCategory)
    {
        
        $posts = Post::where('IdCategory', function ($query) use ($slugCategory) {
            $query->select('IdCategory')->from('Category')->where('SlugCategory', $slugCategory)->first();
        })->with(['user'])->latest('CreatedAt')->paginate(4);
        $posts->category = Category::where('SlugCategory',$slugCategory)->first();
            // return $posts;
        return  view('post.categoryPosts', compact('posts'));
    }
}
