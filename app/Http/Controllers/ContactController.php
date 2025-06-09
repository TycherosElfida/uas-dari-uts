<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Show the contact form.
     */
    public function create(): View
    {
        return view('contact.create');
    }

    /**
     * Store a new contact message.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        ContactMessage::create($validated);

        return redirect()->route('contact.create')->with('success', 'Thank you for your message! We will get back to you shortly.');
    }
}
