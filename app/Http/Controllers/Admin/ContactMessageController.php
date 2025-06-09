<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactMessageController extends Controller
{
    /**
     * Display a listing of the contact messages.
     */
    public function index(): View
    {
        $messages = ContactMessage::latest()->paginate(10);
        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Remove the specified contact message from storage.
     */
    public function destroy(ContactMessage $contactMessage): RedirectResponse
    {
        $contactMessage->delete();
        return redirect()->route('admin.messages.index')->with('success', 'Message deleted successfully.');
    }
}
