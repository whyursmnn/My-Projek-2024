<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        switch (Auth::user()->role) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'teacher':
                return redirect()->route('teacher.dashboard');
            default:
            return redirect()->route('student.dashboard');
        }
    }
}
