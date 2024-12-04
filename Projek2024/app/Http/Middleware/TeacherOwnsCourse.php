<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TeacherOwnsCourse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $course = $request->route('course'); // Mengambil course dari route

        // Verifikasi apakah course yang diakses dimiliki oleh guru yang login
        if ($course && $course->teacher_id !== Auth::id()) {
            return redirect()->route('teacher.courses.index')->with('error', 'Anda tidak memiliki akses ke kursus ini.');
        }

        return $next($request);
    }
}
