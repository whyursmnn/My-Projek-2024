<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    public function index()
    {
        // Ambil kursus yang diikuti oleh student
        $user = Auth::user();
        $courses = $user->enrolledCourses;  // Ambil kursus yang diikuti student
        $progress = [];  // Placeholder untuk progress, misalnya persentase atau status kursus

        // Logika untuk menghitung progress bisa ditambahkan di sini (misalnya, berdasarkan jumlah materi yang diselesaikan)

        return view('Users.student.dashboard', compact('user', 'courses', 'progress'));
    }

}
