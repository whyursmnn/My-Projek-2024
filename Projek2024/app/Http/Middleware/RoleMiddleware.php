<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            abort(403, 'User not authenticated.');
        }

        if (Auth::user()->role !== $role) {
            abort(403, 'Unauthorized action. Required role: ' . $role . ', User role: ' . Auth::user()->role);
        }

        return $next($request);
    }
}
