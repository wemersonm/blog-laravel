<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use stdClass;

class CategoryController extends Controller
{
    public function showPosts(Category $category)
    {
        $posts = Post::where('IdCategory',$category->IdCategory)->with(['user'])->latest('CreatedAt')->paginate(4);
        $posts->category = $category;

         $result = [
            'posts' => $posts,
            'category' => $category
        ];
        return  view('post.categoryPosts', $result);
    }
}
