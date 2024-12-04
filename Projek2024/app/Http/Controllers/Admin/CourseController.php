<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('teacher')->get();
        return view('Users.admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = User::where('role', 'teacher')->get();
        return view('Users.admin.courses.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:225',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'teacher_id' => 'required|exists:users,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',


        ]);



        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('courses', 'public'); // Simpan file di storage/app/public/courses
        }

        Course::create([
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'teacher_id' => $request->teacher_id,
            'image' => $imagePath, // Simpan path gambar
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Course berhasil ditambahkan');
    }



    /**
     * Display the specified resource.
     */
    public function show(Course $course)
{

}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $teachers = User::where('role', 'teacher')->get();
        return view('Users.admin.courses.edit', compact('course', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {


        $request->validate([
            'name' => 'required|string|max:225',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'teacher_id' => 'required|exists:users,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle gambar baru
    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($course->image && file_exists(storage_path('app/public/' . $course->image))) {
            unlink(storage_path('app/public/' . $course->image));
        }

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('images/courses', 'public');
            $course->image = $imagePath;
        }


        if ($request->hasFile('image')) {
            $course->image = $imagePath;
        }

        $course->name = $request->name;
        $course->description = $request->description;
        $course->start_date = $request->start_date;
        $course->end_date = $request->end_date;
        $course->teacher_id = $request->teacher_id;
        $course->save();



        return redirect()->route('admin.dashboard')->with('success', 'Courses berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        if ($course->image && file_exists(storage_path('app/public/' . $course->image))) {
            unlink(storage_path('app/public/' . $course->image));
        }
        $course->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Course berhasil dihapus.');
    }
}
