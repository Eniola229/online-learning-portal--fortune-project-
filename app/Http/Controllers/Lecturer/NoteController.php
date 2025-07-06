<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::where('user_id', Auth::id())->with('course')->latest()->paginate(10);
        return view('lecturer.notes.index', compact('notes'));
    }

    public function create()
    {
        $courses = Auth::user()->courses;
        return view('lecturer.notes.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'course_id' => 'required|exists:courses,id',
            'note_file' => 'required|file|mimes:pdf,doc,docx,txt',
        ]);

        $path = $request->file('note_file')->store('notes', 'public');

        Note::create([
            'title' => $request->title,
            'file_path' => $path,
            'course_id' => $request->course_id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('lecturer.notes.index')->with('success', 'Note uploaded successfully!');
    }

    public function edit(Note $note)
    {
        // Ensure lecturer owns this note
        abort_if($note->user_id !== Auth::id(), 403);

        $courses = Auth::user()->courses;
        return view('lecturer.notes.edit', compact('note', 'courses'));
    }

    public function update(Request $request, Note $note)
    {
        abort_if($note->user_id !== Auth::id(), 403);

        $request->validate([
            'title' => 'required|string',
            'course_id' => 'required|exists:courses,id',
            'note_file' => 'nullable|file|mimes:pdf,doc,docx,txt|max:2048',
        ]);

        if ($request->hasFile('note_file')) {
            // Delete old file
            Storage::disk('public')->delete($note->file_path);
            // Store new file
            $note->file_path = $request->file('note_file')->store('notes', 'public');
        }

        $note->update([
            'title' => $request->title,
            'course_id' => $request->course_id,
            'file_path' => $note->file_path,
        ]);

        return redirect()->route('lecturer.notes.index')->with('success', 'Note updated successfully!');
    }

    public function destroy(Note $note)
    {
        abort_if($note->user_id !== Auth::id(), 403);

        Storage::disk('public')->delete($note->file_path);
        $note->delete();

        return redirect()->route('lecturer.notes.index')->with('success', 'Note deleted successfully!');
    }
}