<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
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
