<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseMaterial;
use Illuminate\Http\Request;

class CourseMaterialController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin_or_teacher'); // Pastikan hanya admin atau teacher yang dapat mengakses
    }

    public function create(Course $course)
    {
        return view('admin.courses.materials.create', compact('course'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'file' => 'required|file|mimes:pdf,doc,docx|max:10240', // batas file 10MB
        ]);

        $material = new CourseMaterial();
        $material->title = $request->input('title');
        $material->description = $request->input('description');
        $material->file_path = $request->file('file')->store('materials');

        $material->save();

        return redirect()->route('admin.courses.index')->with('success', 'Materi berhasil ditambahkan!');
    }

}
