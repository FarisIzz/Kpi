<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson() && ! $request->user()) {
            return route('login');
        }

        if ($request->user()->role === 'admin') {
            return route('admin.dashboard');
        } elseif ($request->user()->role === 'superadmin') {
            return route('superadmin.dashboard');
        } else {
            return route('user.dashboard');
        }
    }
}

