<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Course;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = Content::with('course')->get();
        return view('Users.admin.contents.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('Users.admin.contents.create', compact('courses'));
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

        Content::create($request->all());
        return redirect()->route('admin.dashboard')->with('success', 'Content created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Content $content)
    {
        $courses = Course::all();
        return view('Users.admin.contents.edit', compact('content', 'courses'));
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
        return redirect()->route('admin.dashboard')->with('success', 'Content Berhasil Diperbaruhi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Content $content)
    {
        $content->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Content Berhasil Dihapus');

    }
}
