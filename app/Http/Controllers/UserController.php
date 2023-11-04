<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function store()
    {
        
    }
    public function show(User $user)
    {
        return $user;
    }

  
}
