<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('level', Auth::user()->level)->get();
        $registered = Auth::user()->registeredCourses->pluck('id')->toArray();
        return view('student.courses.index', compact('courses', 'registered'));
    }

    public function view()
    {
        $student = Auth::user();
        $courses = $student->registeredCourses; // Only the registered ones

        return view('student.courses.view', compact('courses'));
    }


    public function register(Request $request, Course $course)
    {
        Auth::user()->registeredCourses()->attach($course->id);
        return back()->with('success', 'Course registered!');
    }

        public function show(Course $course)
    {
        $user = Auth::user();

        // Check if the student is registered
        if (!$user->registeredCourses->contains($course->id)) {
            abort(403, 'You are not registered for this course.');
        }

        $notes = $course->notes;
        $quizzes = $course->quizzes;

        return view('student.courses.show', compact('course', 'notes', 'quizzes'));
    }

}
