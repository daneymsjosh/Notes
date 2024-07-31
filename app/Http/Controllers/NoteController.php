<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function store(Request $request)
    {
        // Validate content
        $validated = $request->validate([
            'title' => 'required|min:3|max:124',
            'content' => 'required|min:5|max:512',
        ]);

        $validated['user_id'] = auth()->id();

        // Create Note
        Note::create($validated);

        return redirect()->route('dashboard');
    }
}
