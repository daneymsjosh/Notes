<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteFavoriteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = Auth::user();

        $sortField = $request->get('sortField', 'updated_at');
        $sortOrder = $request->get('sortOrder', 'desc');

        $favoriteNotes = Note::where('user_id', $user->id)
            ->where('pinned', true)
            ->when($request->has('search'), function ($query) {
                $query->search(request('search', ''));
            })->orderBy($sortField, $sortOrder)->get();;

        $categories = Category::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('notes.favorites.index', [
            'notes' => $favoriteNotes,
            'categories' => $categories
        ]);
    }

    public function favorite(Note $note)
    {
        $note->update(['pinned' => true]);

        return redirect()->back();
    }

    public function unfavorite(Note $note)
    {
        $note->update(['pinned' => false]);

        return redirect()->back();
    }
}
