<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::where('user_id', Auth::id())->with('course')->latest()->paginate(10);
        return view('lecturer.quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        $courses = Auth::user()->courses;
        return view('lecturer.quizzes.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'course_id' => 'required|exists:courses,id',
        ]);

        Quiz::create([
            'title' => $request->title,
            'description' => $request->description,
            'course_id' => $request->course_id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('lecturer.quizzes.index')->with('success', 'Quiz created!');
    }

    public function edit(Quiz $quiz)
    {
        // Ensure the quiz belongs to the authenticated lecturer
        abort_if($quiz->user_id !== Auth::id(), 403);

        $courses = Auth::user()->courses;
        return view('lecturer.quizzes.edit', compact('quiz', 'courses'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        abort_if($quiz->user_id !== Auth::id(), 403);

        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'course_id' => 'required|exists:courses,id',
        ]);

        $quiz->update([
            'title' => $request->title,
            'description' => $request->description,
            'course_id' => $request->course_id,
        ]);

        return redirect()->route('lecturer.quizzes.index')->with('success', 'Quiz updated successfully!');
    }

    public function destroy(Quiz $quiz)
    {
        abort_if($quiz->user_id !== Auth::id(), 403);

        $quiz->delete();

        return redirect()->route('lecturer.quizzes.index')->with('success', 'Quiz deleted!');
    }

}