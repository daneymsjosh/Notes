<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function show(Category $category, Request $request)
    {
        $user = Auth::user();

        $sortField = $request->get('sortField', 'updated_at');
        $sortOrder = $request->get('sortOrder', 'desc');

        $notes = Note::where('user_id', $user->id)->where('category_id', $category->id)
            ->when($request->has('search'), function ($query) {
                $query->search(request('search', ''));
            })->orderBy($sortField, $sortOrder)->get();

        $categories = Category::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('categories.show', [
            'notes' => $notes,
            'categories' => $categories,
            'currentCategory' => $category
        ]);
    }

    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();

        $validated['user_id'] = auth()->id();

        Category::create($validated);

        return redirect()->route('dashboard');
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        // Validate content
        $validated = $request->validated();

        // Update Note
        $category->update($validated);

        return redirect()->route('dashboard');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('dashboard');
    }
}
