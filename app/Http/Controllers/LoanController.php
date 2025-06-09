<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LoanController extends Controller
{
    /**
     * Store a newly created loan in storage.
     */
    public function store(Request $request)
    {
        // 1. Validate the incoming request
        $request->validate([
            'book_id' => 'required|integer|exists:books,book_id',
        ]);

        $book = Book::findOrFail($request->input('book_id'));
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // 2. Check business rules (from your old borrow.php)
        // Check if the user has reached the maximum active loan limit (3)
        if ($user->loans()->whereNull('return_date')->count() >= 3) {
            return back()->with('error', 'You have reached the maximum limit of 3 active loans.');
        }

        // Check if the book is in stock
        if ($book->stock < 1) {
            return back()->with('error', 'Sorry, this book is currently out of stock.');
        }

        // 3. Use a database transaction to ensure data integrity
        try {
            DB::transaction(function () use ($user, $book) {
                // Create the loan record
                Loan::create([
                    'user_id' => $user->id,
                    'book_id' => $book->book_id,
                    'borrow_date' => Carbon::today(),
                    'due_date' => Carbon::today()->addDays(7), // Loan duration is 7 days
                ]);

                // Decrement the book's stock
                $book->decrement('stock');
            });
        } catch (\Exception $e) {
            // If anything goes wrong, redirect back with an error
            return back()->with('error', 'An error occurred while processing your request. Please try again.');
        }

        // 4. Redirect to the transaction history page with a success message
        return redirect()->route('loans.index')->with('success', 'Book borrowed successfully!');
    }

    /**
     * Display the loan history for the authenticated user.
     */
    public function index()
    {
        // Get loans for the currently logged-in user.
        // Eager load the 'book' relationship to prevent N+1 query issues.
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $loans = $user->loans()->with('book')->latest('borrow_date')->get();

        return view('loans.index', ['loans' => $loans]);
    }

    public function returnBook(Loan $loan)
    {
        // 1. Authorize that the logged-in user owns this loan
        if (Auth::id() !== $loan->user_id) {
            abort(403, 'Unauthorized Action');
        }

        // 2. Check if the book is already returned
        if ($loan->return_date) {
            return back()->with('error', 'This book has already been returned.');
        }

        // 3. Use a database transaction for safety
        try {
            DB::transaction(function () use ($loan) {
                $penalty = 0;
                $today = Carbon::today();

                // Calculate penalty if overdue (from your old return.php)
                if ($today->isAfter($loan->due_date)) {
                    $daysOverdue = $today->diffInDays($loan->due_date);
                    $penalty = $daysOverdue * 1000; // Rp 1.000 per day
                }

                // Update the loan record
                $loan->update([
                    'return_date' => $today,
                    'total_penalty' => $penalty,
                ]);

                // Increment the book's stock
                $loan->book->increment('stock');
            });
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while returning the book.');
        }

        // 4. Redirect back with a success message
        return redirect()->route('loans.index')->with('success', 'Book returned successfully!');
    }
}
