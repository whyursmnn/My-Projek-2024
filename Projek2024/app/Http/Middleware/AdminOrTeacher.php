<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminOrTeacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth::check() || !in_array(auth::user()->role, ['admin', 'teacher'])) {
            return redirect('/'); // Redirect ke halaman lain jika bukan admin atau teacher
        }

        return $next($request);
    }
}
