<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest2')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function create()
    {
        return view('auth.create');
    }
    public function store(LoginRequest $loginRequest)
    {
    
      $validations = $loginRequest->validated();
    
       session()->put('user', ["username" => $validations["Username"], "password" => $validations["Password"]]);
        return redirect()->route('home.index');
    }
    public function logout()
    {
        session()->pull('user');
        return redirect()->route("home.index");
    }
}
