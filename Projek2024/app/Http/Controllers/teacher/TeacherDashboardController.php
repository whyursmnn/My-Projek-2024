<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherDashboardController extends Controller
{
    public function index()
    {
        

        // Ambil semua courses yang dimiliki oleh teacher
        $courses = Course::where('teacher_id', Auth::id())->get();

        // Kirimkan $courses ke view
        return view('Users.teacher.dashboard', compact('courses'));
    }
}
