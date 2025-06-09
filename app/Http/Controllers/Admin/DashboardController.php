<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'totalBooks' => Book::count(),
            'totalMembers' => User::where('role', 'member')->count(),
            'activeLoans' => Loan::whereNull('return_date')->count(),
            'overdueLoans' => Loan::whereNull('return_date')->where('due_date', '<', now())->count(),
        ];

        $recentLoans = Loan::with(['book', 'user'])
            ->latest('borrow_date')
            ->limit(5)
            ->get();

        return view('admin.dashboard', [
            'stats' => $stats,
            'recentLoans' => $recentLoans,
        ]);
    }
}
