<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TeacherCoursesController extends Controller
{
    public function index()
    {
        $teacherId = Auth::id();
        $courses = Course::with('teacher')->where('teacher_id', $teacherId)->get();
        return view('Users.teacher.courses.index', compact('courses'));
    }

    public function create()
    {

        $teachers = User::where('role', 'teacher')->get(); // Asumsi 'role' adalah kolom untuk peran pengguna
        return view('Users.teacher.courses.create', compact('teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:225',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->hasFile('image') ? $this->handleImageUpload($request) : null;

        Course::create([
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'teacher_id' => Auth::id(),
            'image' => $imagePath,
        ]);

        return redirect()->route('teacher.dashboard')->with('success', 'Course berhasil ditambahkan');
    }

    public function showProgress()
    {
        $courses = Course::where('teacher_id', Auth::id())->with('students')->get();
        return view('Users.teacher.courses.progress.index', compact('courses'));
    }

    public function edit(Course $course)
    {
        $teachers = User::where('role', 'teacher')->get();
        return view('Users.teacher.courses.edit', compact('course', 'teachers'));
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



        return redirect()->route('teacher.dashboard')->with('success', 'Courses berhasil diperbarui.');
    }



    public function destroy(Course $course)
    {
        if ($course->teacher_id !== Auth::id()) {
            return redirect()->route('teacher.dashboard')->with('error', 'Anda tidak memiliki akses.');
        }

        if ($course->image && file_exists(storage_path('app/public/' . $course->image))) {
            unlink(storage_path('app/public/' . $course->image));
        }

        $course->delete();
        return redirect()->route('teacher.dashboard')->with('success', 'Course berhasil dihapus.');
    }

    private function handleImageUpload(Request $request, $oldImage = null)
    {
        if ($oldImage && file_exists(storage_path('app/public/' . $oldImage))) {
            unlink(storage_path('app/public/' . $oldImage));
        }

        return $request->file('image')->store('courses', 'public');
    }
}
