<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function show(Note $note)
    {
        $user = Auth()->user();

        $categories = Category::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('notes.show', [
            'note' => $note,
            'categories' => $categories
        ]);
    }

    public function store(StoreNoteRequest $request)
    {
        // Validate content
        $validated = $request->validated();

        $validated['user_id'] = auth()->id();

        $validated['category_id'] = $request->input('category_id') ?: null;

        // Create Note
        Note::create($validated);

        return redirect()->route('dashboard');
    }

    public function update(UpdateNoteRequest $request, Note $note)
    {
        // Validate content
        $validated = $request->validated();

        $validated['category_id'] = $request->input('category_id') ?: null;

        // Update Note
        $note->update($validated);

        return redirect()->back();
    }

    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->back();
    }
}
