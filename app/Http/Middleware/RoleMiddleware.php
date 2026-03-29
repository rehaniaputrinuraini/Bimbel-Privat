<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $peran)
    {
        if (!auth()->check() || auth()->user()->peran !== $peran) {
            abort(403, 'Unauthorized');
        }
        return $next($request);
    }
}