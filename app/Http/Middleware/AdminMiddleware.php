<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and is an admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            // User is an admin, allow the request to proceed
            return $next($request);
        }

        // User is not authenticated or is not an admin, redirect or return error
        return redirect()->route('home')->with('error', 'You are not authorized to access this page.');
    }
}
