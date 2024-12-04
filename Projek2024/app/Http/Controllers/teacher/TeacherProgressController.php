<?php

// app/Http/Controllers/teacher/TeacherProgressController.php
namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\StudentProgress;

class TeacherProgressController extends Controller
{
    // Menampilkan progres dari suatu kursus
    public function showCourseProgress(Course $course)
    {
        // Logika untuk menampilkan progres kursus
        $progress = $course->progress(); // Misal ada relasi untuk progres
        return view('teacher.courses.progress', compact('progress', 'course'));
    }

    // Menampilkan progres siswa dalam suatu kursus
    public function showStudentProgress(Course $course, $studentId)
    {
        // Menampilkan progres spesifik siswa
        $studentProgress = StudentProgress::where('course_id', $course->id)->where('student_id', $studentId)->first();
        return view('teacher.courses.student.progress', compact('studentProgress', 'course'));
    }

    // Menampilkan keseluruhan progres
    public function indexProgress()
    {
        // Menampilkan daftar progres keseluruhan
        $courses = Course::all();
        return view('teacher.courses.indexProgress', compact('courses'));
    }
}
