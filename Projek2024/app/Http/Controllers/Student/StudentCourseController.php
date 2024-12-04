<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentCourseController extends Controller
{

    public function dashboard()
    {
        $user = Auth::user();
        $courses = $user->enrolledCourses;  // Ambil kursus yang diikuti student
        $progress = [];  // Placeholder untuk progress, misalnya persentase atau status kursus

        // Logika untuk menghitung progress bisa ditambahkan di sini (misalnya, berdasarkan jumlah materi yang diselesaikan)

        return view('Users.student.dashboard', compact('user', 'courses', 'progress'));
    }
    public function index()
    {
        $courses = Course::all(); // Menampilkan semua kursus yang tersedia
        return view('Users.student.courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        // Cek jika student sudah mengikuti kursus ini
        if (!Auth::user()->courses->contains($course)) {
            return redirect()->route('student.courses.index')->with('error', 'Anda belum mengikuti kursus ini.');
        }

        return view('Users.student.courses.show', compact('course'));
    }



    // Fungsi untuk mendaftar ke kursus
    public function enroll($courseId)
{
    $course = Course::find($courseId);

    // Jika kursus tidak ditemukan
    if (!$course) {
        return redirect()->route('student.courses.index')->with('error', 'Kursus tidak ditemukan');
    }

    // Ambil user yang sedang login
    $user = auth::user();

    // Daftarkan student ke kursus jika belum terdaftar
    if (!$user->enrolledCourses->contains($course)) {
        $user->enrolledCourses()->attach($course);  // Perbaikan di sini!
        return redirect()->route('student.courses.index')->with('message', 'Kursus berhasil ditambahkan ke daftar Anda.');
    }

    // Jika sudah terdaftar
    return redirect()->route('student.courses.index')->with('message', 'Anda sudah terdaftar di kursus ini.');
}


}
