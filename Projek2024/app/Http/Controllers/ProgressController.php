<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    public function update(Request $request, Course $course)
    {
        // Validasi input
        $request->validate([
            'completion_percentage' => 'required|integer|min:0|max:100',
        ]);

        // Update progres siswa
        $progress = Progress::updateOrCreate(
            [
                'user_id' => Auth::user()->id,
                'course_id' => $course->id,
            ],
            [
                'completion_percentage' => $request->completion_percentage,
            ]
        );

        return redirect()->route('student.progress.index')->with('success', 'Progres berhasil diperbarui!');
    }
}
