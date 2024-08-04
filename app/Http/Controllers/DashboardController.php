<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $sortField = $request->get('sortField', 'updated_at');
        $sortOrder = $request->get('sortOrder', 'desc');

        $notes = Note::where('user_id', $user->id)
            ->when($request->has('search'), function ($query) {
                $query->search(request('search', ''));
            })->orderBy($sortField, $sortOrder)->get();

        $categories = Category::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('dashboard', [
            'notes' => $notes,
            'categories' => $categories
        ]);
    }
}
