<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->only(['create', 'store']);
        $this->middleware('auth')->only(['logout']);
    }

    public function index()
    {
        return view('auth.create');
    }
    public function store(Request $r)
    {
        $validations = $r->validate([
            'Username' => 'required|regex:/^[a-zA-z\.\_]+$/',
            'password' => 'required'
        ]);
        if (Auth::attempt($validations)) {
            return Redirect::route('home.index');
        }
        return Redirect::back()->with([
            'credentialsFail' => "Username ou senha incorretos",

        ])->withInput();
    }
    public function destroy()
    {
        Auth::logout();
        return redirect()->route("home.index");
    }
}
