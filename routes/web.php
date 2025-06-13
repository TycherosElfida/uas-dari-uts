<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
// --- Public Controllers ---
use App\Http\Controllers\BookController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PhotoGalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoanController;
// --- Admin Controllers (with aliases to prevent naming conflicts) ---
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\PhotoGalleryController as AdminPhotoGalleryController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\AdminManagementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- PUBLIC ROUTES ---

// Homepage
Route::get('/', [BookController::class, 'index'])->name('home');

// Public Book Routes
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{book:slug}', [BookController::class, 'show'])->name('books.show');

// Public Article Routes
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');

// Public Gallery Route
Route::get('/gallery', [PhotoGalleryController::class, 'index'])->name('gallery.index');

// Public Contact Form Routes
Route::get('/contact-us', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.store');


// --- AUTHENTICATED USER ROUTES ---

// This is the default dashboard route from Breeze
Route::get('/dashboard', function () {
    // A simple dashboard for members could show their active loans
    return redirect()->route('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile Management (from Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Loan Management for Members
    Route::post('/loans', [LoanController::class, 'store'])->name('loans.store');
    Route::get('/my-loans', [LoanController::class, 'index'])->name('loans.index');
    Route::patch('/loans/{loan}/return', [LoanController::class, 'returnBook'])->name('loans.return');
});


// --- ADMIN ROUTES ---
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('books', AdminBookController::class);
        Route::resource('members', MemberController::class);
        Route::resource('articles', AdminArticleController::class);
        Route::resource('photos', AdminPhotoGalleryController::class)->except(['show', 'edit', 'update']);
        Route::resource('admins', AdminManagementController::class)->except(['show']);
        Route::get('/messages', [ContactMessageController::class, 'index'])->name('messages.index');
        Route::delete('/messages/{message}', [ContactMessageController::class, 'destroy'])->name('messages.destroy');
    });

// --- Auth routes file from Breeze ---
require __DIR__ . '/auth.php';
