<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of available books.
     */
    public function index()
    {
        // Fetch all books with stock greater than 0
        $books = Book::where('stock', '>', 0)->get();

        // Return a collection of books, transformed by our BookResource
        return BookResource::collection($books);
    }

    /**
     * Display a single specified book.
     */
    public function show(Book $book)
    {
        // Return a single book, transformed by our BookResource
        return new BookResource($book);
    }
}
