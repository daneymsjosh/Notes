<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function store(StoreNoteRequest $request)
    {
        // Validate content
        $validated = $request->validated();

        $validated['user_id'] = auth()->id();

        // Create Note
        Note::create($validated);

        return redirect()->route('dashboard');
    }

    public function update(UpdateNoteRequest $request, Note $note)
    {
        // Validate content
        $validated = $request->validated();

        // Update Note
        $note->update($validated);

        return redirect()->route('dashboard');
    }

    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->route('dashboard');
    }
}
