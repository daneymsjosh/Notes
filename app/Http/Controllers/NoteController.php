<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoteRequest;
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
}
