<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $notes = Note::where('user_id', $user->id)->orderBy('updated_at', 'desc')->get();

        return view('dashboard', [
            'notes' => $notes
        ]);
    }
}
