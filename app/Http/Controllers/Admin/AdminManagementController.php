<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminManagementController extends Controller
{
    /**
     * Display a listing of admin users.
     */
    public function index(): View
    {
        $admins = User::where('role', 'admin')->latest()->paginate(10);
        return view('admin.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new admin.
     */
    public function create(): View
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created admin in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin', // Explicitly set the role to admin
        ]);

        return redirect()->route('admin.admins.index')->with('success', 'Admin created successfully.');
    }

    /**
     * Remove the specified admin from storage.
     */
    public function destroy(User $admin): RedirectResponse
    {
        // Add a safety check: you cannot delete yourself.
        if (auth()->id() === $admin->id) {
            return back()->with('error', 'You cannot delete your own account.');
        }

        // Add a safety check: there must always be at least one admin.
        if (User::where('role', 'admin')->count() <= 1) {
            return back()->with('error', 'Cannot delete the last admin account.');
        }

        $admin->delete();

        return redirect()->route('admin.admins.index')->with('success', 'Admin deleted successfully.');
    }
}
