<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherCoutentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = Content::with('course')->get();
        return view('Users.teacher.contents.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('Users.teacher.contents.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $course = Course::findOrFail($request->course_id);
        if ($course->teacher_id !== Auth::user()->id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menambahkan materi pada course ini.');
        }



        Content::create($request->all());
        return redirect()->route('teacher.dashboard')->with('success', 'Content created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function showProgress(Course $course)
{
    if ($course->teacher_id !== Auth::user()->id) {
        return redirect()->back()->with('error', 'Anda tidak memiliki izin.');
    }

    $students = $course->students->map(function ($student) use ($course) {
        $progress = $student->progress()
            ->whereHas('content', function ($query) use ($course) {
                $query->where('course_id', $course->id);
            })->count();

        return [
            'name' => $student->name,
            'progress' => $progress,
        ];
    });

    return view('Users.teacher.courses.progress.progress', compact('course', 'students'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Content $content)
    {
        $courses = Course::all();
        return view('Users.teacher.contents.edit', compact('content', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Content $content)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $content->update($request->all());
        return redirect()->route('teacher.dashboard')->with('success', 'Content Berhasil Diperbaruhi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Content $content)
    {
        $content->delete();
        return redirect()->route('teacher.dashboard')->with('success', 'Content Berhasil Dihapus');

    }
}
