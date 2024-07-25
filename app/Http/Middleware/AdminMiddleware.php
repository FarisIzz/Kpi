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
        // if (Auth::check() && Auth::user()->role === 'admin') {
        //     return $next($request);
        // }

        // return redirect()->route('admin')->with('error', 'You are not authorized to access this page.');
        
        if (Auth::check()){
            /** @var App\Models\User */

            $user = Auth::user();
            if($user->hasRole('Admin') ){
                return $next($request);
            }
            abort(403, "User does not have correct ROLE");
        }

        abort(401);
    }

    
}
