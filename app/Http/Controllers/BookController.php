<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class BookController extends Controller
{

    public function index()
    {
        return view('book.index', [
            'books' => Book::orderBy('updated_at', 'desc')->paginate(15)
        ]);
    }


    public function create()
    {
        if (BookCategory::all()->count() === 0) {
            return redirect()->back()->with('message', 'Create a category first before adding books!');
        } else {
            return view('book.create', [
                'categories' => BookCategory::all(),
            ]);
        }
    }


    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required|min:3|max:30',
                'description' => 'required',
                'isbn' => 'required|numeric|unique:books,isbn',
                'pages' => 'required|numeric',
                'category_id' => 'required',
                'photo' => 'required|mimes:jpg|max:3000'
            ],
            [
                'name.required' => 'Please add book name.',
                'description.required' => 'Please add book description.',
                'isbn.required' => 'Please enter valid ISBN number',
                'isbn.unique' => 'This ISBN number is already register.',
                'category.required' => 'Please select a category',
                'pages.required' => 'Please specify how many pages the book has.',
                'photo.max' => 'file exceeds 3MB',
                'photo.mimes' => 'file must be .JPG type',
            ]
        );
        if ($request->photo) {
            $imagePath = request('photo')->store('uploads', 'public');
            dd($imagePath);
            $image = Image::make("storage/{$imagePath}")->fit(600, 600);
            $image->save();
        } else {
            $imagePath = '';
        }
        Book::create([
            'name' => $request->name,
            'description' => $request->description,
            'isbn' => $request->isbn,
            'category_id' => $request->category_id,
            'photo' => $imagePath,
            'pages' => $request->pages,
            'reserved' => false
        ]);
        return redirect()->route('b_index')->with('message', 'Successfully created!');
    }


    public function show(Book $book)
    {
        return view('book.show', [
            'book' => $book
        ]);
    }


    public function edit(Book $book)
    {
        return view('book.edit', [
            'book' => $book,
        ]);
    }


    public function update(Request $request, Book $book)
    {
        $validated = $request->validate(
            [
                'name' => 'required|min:3|max:30',
                'description' => 'required',
                'isbn' => 'required|numeric',
                Rule::unique('book', 'isbn')->ignore($book->isbn),
                'pages' => 'required|numeric',
                'category_id' => 'required',
                'photo' => 'required|mimes:jpg|max:3000'
            ],
            [
                'name.required' => 'Please add book name.',
                'description.required' => 'Please add book description.',
                'isbn.required' => 'Please enter valid ISBN number',
                'isbn.unique' => 'This ISBN number is already register.',
                'category.required' => 'Please select a category',
                'pages.required' => 'Please specify how many pages the book has.',
                'photo.max' => 'file exceeds 3MB',
                'photo.mimes' => 'file must be .JPG type',
            ]
        );
        if($request->hasFile('photo')) {
            $imagePath = request('photo')->store('uploads', 'public');
            $image = Image::make("storage/{$imagePath}")->fit(600,600);
            $image->save();
        } else {
            $imagePath = $book->photo;
        }
        $book->update([
            'name' => $request->name,
            'description' => $request->description,
            'isbn' => $request->isbn,
            'category_id' => $request->category_id,
            'photo' => $imagePath,
            'pages' => $request->pages,
        ]);
        return redirect()->route('b_index')->with('message', 'Successfulle updated!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('b_index')->with('message', 'Successfully deleted!');
    }
    public function reserve(Book $book)
    {
        if ($book->reserved == true) {
            return redirect()->back()->with('message', 'Book is already reserved!');
        } else {
            $book->update([
                'reserved' => true
            ]);
            return redirect()->route('b_index')->with('message', 'Successfully reserved!');
        }
    }
    public function favorite(Book $book)
    {
        $favoritedByList = json_decode($book->favorited_by ?? json_encode([]));
        if (in_array(Auth::user()->id, $favoritedByList)) {
            return redirect()->back()->with('message', 'You already added this book to your favorites');
        }
        $favoritedByList[] = Auth::user()->id;
        $book->favorited_by = json_encode($favoritedByList);
        $book->save();
        return redirect()->route('b_index')->with('message', 'Successfully added to favorites!');
    }
}
