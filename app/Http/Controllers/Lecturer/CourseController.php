<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Auth::user()->courses()->latest()->paginate(10);
        return view('lecturer.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('lecturer.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'code' => 'required|string|max:20|unique:courses',
            'level' => 'required|string|max:10',
        ]);

        Auth::user()->courses()->create($request->only('title', 'code', 'level'));

        return redirect()->route('lecturer.courses.index')->with('success', 'Course created successfully!');
    }


}