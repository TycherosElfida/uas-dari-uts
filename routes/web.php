<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;

// We'll set the homepage to show the list of all books
Route::get('/', [BookController::class, 'index'])->name('home');

// A dedicated route for the book list
Route::get('/books', [BookController::class, 'index'])->name('books.index');

// A "pretty URL" route for a single book's details page.
// The {book} part will automatically pass the book's ID to the controller.
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

// Loan management
Route::middleware('auth')->group(function () {
    Route::post('/loans', [LoanController::class, 'store'])->name('loans.store');
    // We will add more loan routes here later
});


// This is the dashboard route Breeze created. It requires a user to be logged in.
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/loans', [LoanController::class, 'store'])->name('loans.store');
    Route::get('/my-loans', [LoanController::class, 'index'])->name('loans.index');
    Route::patch('/loans/{loan}/return', [LoanController::class, 'returnBook'])->name('loans.return');
});

// --- ADMIN ROUTES ---
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // All admin routes will go here.
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('books', AdminBookController::class);

        Route::resource('members', MemberController::class);

        Route::resource('articles', AdminArticleController::class);
    });

require __DIR__ . '/auth.php';
