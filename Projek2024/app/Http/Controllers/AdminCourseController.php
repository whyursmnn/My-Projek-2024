<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseMaterial;
use Illuminate\Http\Request;

class AdminCourseController extends Controller
{
    public function createMaterial(Course $course)
    {
        return view('admin.courses.materials.create', compact('course'));
    }

    public function storeMaterial(Request $request, Course $course)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,mp4,jpeg,png|max:10240', // File size max 10MB
        ]);

        // Simpan file jika ada
        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('course_materials');
        }

        // Simpan materi ke database
        CourseMaterial::create([
            'course_id' => $course->id,
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filePath,
        ]);

        return redirect()->route('admin.courses.index')->with('message', 'Materi berhasil ditambahkan.');
    }
}
