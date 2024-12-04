<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentProgressController extends Controller
{
    public function index()
    {
        $progress = Auth::user()->courses->map(function ($course) {
            // Ambil progress untuk setiap kursus
            return [
                'course' => $course,
                'progress' => $course->students()->wherePivot('user_id', auth::id())->first()->pivot->progress,
            ];
        });

        return view('Users.student.progress.index', compact('progress'));
    }

    public function show(Course $course)
{
    // Pastikan student hanya bisa melihat progress untuk kursus yang mereka ikuti
    if (!Auth::user()->courses->contains($course)) {
        return redirect()->route('student.progress.index')->with('error', 'Anda belum mengikuti kursus ini.');
    }

    $progress = $course->students()->wherePivot('user_id', Auth::id())->first()->pivot->progress;

    return view('Users.student.progress.show', compact('course', 'progress'));
}


public function update(Request $request, $courseId)
{
    $request->validate([
        'completion_percentage' => 'required|integer|min:0|max:100',
    ]);

    $course = Course::findOrFail($courseId);

    // Pastikan student hanya bisa mengupdate progress untuk kursus yang mereka ikuti
    if (!Auth::user()->courses->contains($course)) {
        return redirect()->route('student.progress.index')->with('error', 'Anda belum mengikuti kursus ini.');
    }

    // Update progres
    $course->students()->updateExistingPivot(Auth::id(), [
        'progress' => $request->completion_percentage,
    ]);

    return redirect()->route('student.progress.show', $courseId)->with('success', 'Progres berhasil diperbarui.');
}




}
