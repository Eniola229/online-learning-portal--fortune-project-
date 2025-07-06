<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\DashboardController as StudentDashboard;
use App\Http\Controllers\Lecturer\DashboardController as LecturerDashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Lecturer\CourseController;
use App\Http\Controllers\Lecturer\NoteController;
use App\Http\Controllers\Lecturer\QuizController;
use App\Http\Controllers\Lecturer\QuestionController;
use App\Http\Controllers\Student\CourseController as StudentCourseController;
use App\Http\Controllers\Student\QuizController as StudentQuickController;  

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/student/dashboard', [StudentDashboard::class, 'index'])->name('student.dashboard');
    Route::get('/lecturer/dashboard', [LecturerDashboard::class, 'index'])->name('lecturer.dashboard');
    Route::get('/admin/dashboard', [AdminDashboard::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [UserManagementController::class, 'index'])->name('users.index');
    Route::patch('/users/{id}/update-role', [UserManagementController::class, 'updateRole'])->name('users.updateRole');
    Route::delete('/users/{id}', [UserManagementController::class, 'destroy'])->name('users.destroy');
    Route::get('quizzes/{quiz}/take', [StudentQuickController::class, 'take'])->name('student.quizzes.take');
    Route::post('quizzes/{quiz}/submit', [StudentQuickController::class, 'submit'])->name('student.quizzes.submit');
    Route::get('quizzes/attempt/{attempt}', [StudentQuickController::class, 'result'])->name('student.quizzes.result');
     Route::post('/complete-profile', [StudentDashboard::class, 'updateProfile'])->name('profile.update');
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->prefix('lecturer')->name('lecturer.')->group(function () {
    Route::resource('courses', CourseController::class);
    Route::resource('notes', NoteController::class);
    Route::resource('quizzes', QuizController::class);
});

Route::prefix('quizzes/{quiz}')->name('lecturer.questions.')->group(function () {
    Route::get('questions/create', [QuestionController::class, 'create'])->name('create');
    Route::post('questions', [QuestionController::class, 'store'])->name('store');
});

Route::middleware(['auth'])->prefix('student')->name('student.')->group(function () {
    Route::get('courses', [StudentCourseController::class, 'index'])->name('courses.index');
    Route::get('view/courses', [StudentCourseController::class, 'view'])->name('courses.view');
    Route::post('courses/{course}/register', [StudentCourseController::class, 'register'])->name('courses.register');
    Route::get('courses/{course}', [StudentCourseController::class, 'show'])->name('courses.show');

});

require __DIR__.'/auth.php';
