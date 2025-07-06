<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index(Request $request)
    {
        // Optional filter by role
        $role = $request->get('role');

        $users = User::when($role, function ($query, $role) {
            $query->where('role', $role);
        })->paginate(10);

        return view('admin.users.index', compact('users', 'role'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Optional: prevent deleting self or admin-only deletion
        // if (auth()->id() == $user->id) {
        //     return back()->with('error', 'You cannot delete your own account.');
        // }

        $user->delete();

        return back()->with('success', 'User deleted successfully.');
    }

    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:admin,lecturer,student',
        ]);

        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();

        return back()->with('success', 'User role updated successfully.');
    }

}
