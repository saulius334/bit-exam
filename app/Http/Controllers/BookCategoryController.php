<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use Illuminate\Http\Request;

class BookCategoryController extends Controller
{
    public function index()
    {
        return view('category.index', [
            'categories' => BookCategory::orderBy('updated_at', 'desc')->paginate(15)
        ]);
    }

    public function create()
    {
            return view('category.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required|min:3|max:30',
            ],
            [
                'name.required' => 'Please add a category name.',
            ]
        );

        BookCategory::create([
            'name' => $request->name,
        ]);
        return redirect()->route('c_index')->with('message', 'Successfully created!');
    }

    public function show(BookCategory $category)
    {
        return view('category.show', [
            'category' => $category
        ]);
    }

    public function edit(BookCategory $category)
    {
        return view('category.edit', [
            'category' => $category,
        ]);
    }

    public function update(Request $request, BookCategory $category)
    {
        $validated = $request->validate(
            [
                'name' => 'required|min:3|max:30',
            ],
            [
                'name.required' => 'Please add a category name.',
            ]
        );
        $category->update([
            'name' => $request->name,
        ]);
        return redirect()->route('c_index')->with('message', 'Successfully updated!');
    }

    public function destroy(BookCategory $category)
    {
        $category->delete();
        return redirect()->route('c_index')->with('message', 'Successfully deleted!');
    }
}
