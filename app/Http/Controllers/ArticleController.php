<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of published articles.
     */
    public function index(): View
    {
        $articles = Article::where('is_published', true)
            ->latest()
            ->paginate(10);

        return view('articles.index', compact('articles'));
    }

    /**
     * Display a single specified article.
     */
    public function show(Article $article): View
    {
        /**
         * This PHPDoc block tells the code editor that the $user variable
         * will be an instance of our App\Models\User class, or it could be null.
         * @var \App\Models\User|null
         */
        $user = Auth::user();

        // This is a great check for security and user experience.
        // It prevents regular users from accessing draft articles via a direct link.
        // However, it allows a logged-in admin to preview them.
        if (!$article->is_published && !($user && $user->isAdmin())) {
            abort(404);
        }

        return view('articles.show', compact('article'));
    }
}
