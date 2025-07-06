<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('student.dashboard');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'level' => 'required|string',
            'department' => 'required|string',
        ]);

        $user = auth()->user();
        $user->update([
            'level' => $request->level,
            'department' => $request->department,
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
