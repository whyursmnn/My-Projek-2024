<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Menampilkan daftar kursus yang tersedia
    public function index()
    {
        // Mengambil semua kursus yang ada di database
        $courses = Course::all();

        // Menampilkan view dengan data kursus
        return view('student.courses.index', compact('courses'));
    }

    public function show(Course $course)
{
    return view('student.courses.show', compact('course'));
}
}
