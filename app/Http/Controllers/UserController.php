<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\ValidUsername;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->only('create', 'store');
    }

    public function create()
    {
        return view('user.create');
    }
    public function store(Request $request)
    {
        $validations = $request->validate([
            'Username' => ['required', new ValidUsername],
            'UserFullName' => 'required|string|max:100',
            'UserBio' => 'max:220',
            'Email' => 'required|email|unique:User,Email',
            'password' => 'required|min:8|max:16',
            'Occupation' => 'max:120',
            'UserImage' => 'sometimes|image|mimes:jpeg,png,jpg|max:13000'
        ]);

        $image = $request->file('UserImage');
        if ($image && $image->isValid()) {
            $nameImage = md5(time() . $validations['Username']) . '.' . $image->getClientOriginalExtension();
            $path = public_path('/images/posts/');
            $image->move($path, $nameImage);

            if (file_exists($path . $nameImage)) {
                $validations['UserImage'] = '/images/posts/' . $nameImage;
            } else {
                unset($validations['UserImage']);
            }
        }
        $validations['password'] = Hash::make($validations['password']);
        $inserted = DB::table('User')->insertGetId($validations);
        if ($inserted) return redirect(route('auth.index'));
        return back()->with('errorCreateUser', 'Erro ao criar conta');
    }
    public function show(User $user)
    {




        $posts = $user->posts()->latest("CreatedAt")->paginate(2);
        $result =  [
            'user' => $user,
            'posts' => $posts
        ];
        return view('user.show', $result);
    }
}
