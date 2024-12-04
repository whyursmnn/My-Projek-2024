<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // Ambil data kursus untuk ditampilkan
        $popularCourses = Course::orderBy('created_at', 'desc')->limit(5)->get();
        $allCourses = Course::paginate(8);

        return view('welcome', compact('popularCourses', 'allCourses'));
    }


    public function searchCourses(Request $request)
    {
        $query = $request->get('query');

        // Cari courses berdasarkan nama
        $courses = Course::where('name', 'LIKE', "%$query%")
                         ->get(['id', 'name']); // Hanya mengambil id dan name untuk efisiensi

        return response()->json($courses); // Mengembalikan hasil pencarian dalam format JSON
    }
}
