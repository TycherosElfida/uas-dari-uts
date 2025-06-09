<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    /**
     * Display a listing of the available books.
     * This replaces the logic in your old public/index.php
     */
    public function index(Request $request): View
    {
        // Start with a query for books with stock > 0
        $query = Book::where('stock', '>', 0);

        // Check if a search keyword was provided, similar to your old code
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%");
            });
        }

        // Get the results, order by title, and paginate them
        $books = $query->orderBy('title')->paginate(9); // Show 9 books per page

        // Return the view and pass the books data to it
        return view('books.index', [
            'books' => $books
        ]);
    }

    /**
     * Display the specified book.
     * This replaces the logic in your old public/book.php
     */
    public function show(Book $book): View
    {
        // The 'Book $book' parameter is using Laravel's Route-Model Binding.
        // Laravel automatically finds the book with the given ID from the URL.
        // If the book isn't found, it will automatically show a 404 page.

        // Return the view and pass the specific book data to it
        return view('books.show', [
            'book' => $book
        ]);
    }
}
