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

        $posts = Post::latest('CreatedAt')->limit(10)->with('user')->get();
        return view('home',['posts' => $posts]);
    }



    private function requests(Request $request)
    {
        /* 
    dd( DB::table('User')->get());
      dd(
            $request->query(),
            $request->is('/'),
            $request->routeIs('home.*'),
            $request->url(),
            $request->fullUrl(),
            $request->fullUrlWithQuery(["index" => 1533]),
            $request->fullUrlWithQuery(["index"]),
            $request->host(),
            $request->httpHost(),
            $request->schemeAndHttpHost(),
            $request->method(),
            $request->isMethod('get'),
            $request->bearerToken(),
            // $request->prefers(['application/json']),
            $request->getAcceptableContentTypes(),
            $request->expectsJson(),
            "RECUPERANDO ENTRADAS :" ,
            $request->all(),
            $request->collect(),
            $request->collect('email'),
            $request->input('email1','emaildefault'),
            $request->string('password'),
            $request->email,
            $request->only('email','password'),
            $request->has('email'),
            $request->filled('email'),
            $request->missing('email'),
            $request->mergeIfMissing(["votes"=> 0])->all(),

            $request->file(),

        );  */
    }

}
