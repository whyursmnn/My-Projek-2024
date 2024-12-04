<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalStudents = User::where('role', 'student')->count();
        $totalTeachers = User::where('role', 'teacher')->count();
        $totalCourses = Course::count();

        $studentsPerMonth = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->where('role', 'student')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month');

        $months = [
            1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
            5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
            9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
        ];

        $chartData = [
            'labels' => array_values($studentsPerMonth->mapWithKeys(function ($value, $key) use ($months) {
                return [$months[$key] => $value];
            })->keys()->toArray()),
            'data' => $studentsPerMonth->values()->toArray(),
        ];

        return view('Users.admin.dashboard', compact(
            'totalStudents',
            'totalTeachers',
            'totalCourses',
            'chartData'
        ));
    }

    


}
