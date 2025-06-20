<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('book_id')->paginate(10);
        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('book-covers', 'public');
            $validated['cover_image'] = $path;
        }

        Book::create($request->validated());

        return redirect()->route('admin.books.index')->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {

        return view('admin.books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBookRequest $request, Book $book): RedirectResponse
    {
        // Step 1: Get all the validated data into an array FIRST.
        $validated = $request->validated();

        // Step 2: Check if a new cover image was uploaded in the request.
        if ($request->hasFile('cover_image')) {
            // Delete the old cover image if it exists to save space.
            if ($book->cover_image) {
                Storage::disk('public')->delete($book->cover_image);
            }

            // Store the new image and get its correct path.
            $path = $request->file('cover_image')->store('book-covers', 'public');

            // Step 3 (The Fix): OVERWRITE the 'cover_image' key in our $validated
            // data array with the correct path we just received from storage.
            $validated['cover_image'] = $path;
        }

        // Step 4: Now, pass our final, correct $validated array to the update method.
        $book->update($validated);

        return redirect()->route('admin.books.index')->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if ($book->cover_image) {
            Storage::disk('public')->delete($book->cover_image);
        }

        $book->delete();

        return redirect()->route('admin.books.index')->with('success', 'Book deleted successfully.');
    }
}
