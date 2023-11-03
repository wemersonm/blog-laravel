<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */

    public function handle(Request $request, Closure $next)
    {
        // dd($param);
        if (!session()->has('user')) {
            return redirect("/auth");
        }
        return $next($request);
    }
}
