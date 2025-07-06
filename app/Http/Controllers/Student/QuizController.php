<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option;
use App\Models\QuizAttempt;
use App\Models\QuizAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class QuizController extends Controller
{
    use AuthorizesRequests;
    
    public function take(Quiz $quiz)
    {
        $this->authorizeAccess($quiz);
        $quiz->load('questions.options');
        return view('student.quizzes.take', compact('quiz'));
    }

    public function submit(Request $request, Quiz $quiz)
    {
        $this->authorizeAccess($quiz);

        $request->validate([
            'answers' => 'required|array',
            'answers.*' => 'exists:options,id'
        ]);

        $attempt = QuizAttempt::create([
            'user_id' => Auth::id(),
            'quiz_id' => $quiz->id,
        ]);

        $correct = 0;
        foreach ($quiz->questions as $question) {
            $selectedOptionId = $request->answers[$question->id] ?? null;
            $option = Option::find($selectedOptionId);
            $isCorrect = $option && $option->is_correct;

            QuizAnswer::create([
                'quiz_attempt_id' => $attempt->id,
                'question_id' => $question->id,
                'option_id' => $selectedOptionId,
                'is_correct' => $isCorrect,
            ]);

            if ($isCorrect) $correct++;
        }

        $score = round(($correct / $quiz->questions->count()) * 100);
        $attempt->update(['score' => $score]);

        return redirect()->route('student.quizzes.result', $attempt->id)->with('success', 'Quiz submitted!');
    }

    public function result(QuizAttempt $attempt)
    {
        $this->authorize('view', $attempt);
        $attempt->load('quiz', 'answers.question', 'answers.option');
        return view('student.quizzes.result', compact('attempt'));
    }

    private function authorizeAccess(Quiz $quiz)
    {
        $user = Auth::user();
        if (!$user->registeredCourses->pluck('id')->contains($quiz->course_id)) {
            abort(403, 'You are not registered for this course.');
        }
    }
}
