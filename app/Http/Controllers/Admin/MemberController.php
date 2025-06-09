<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;

class MemberController extends Controller
{
    /**
     * Display a listing of the members.
     */
    public function index(): View
    {
        $members = User::where('role', 'member')->latest()->paginate(10);
        return view('admin.members.index', compact('members'));
    }

    /**
     * Show the form for creating a new member.
     */
    public function create(): View
    {
        return view('admin.members.create');
    }

    /**
     * Store a newly created member in storage.
     */
    public function store(StoreMemberRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // Manually add the role and hash the password
        $validated['role'] = 'member';
        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('admin.members.index')->with('success', 'Member created successfully.');
    }

    /**
     * Display the specified resource.
     * We are not using a dedicated "show" page for members in the admin panel.
     */
    public function show(User $member)
    {
        // Typically we would redirect to the edit page.
        return redirect()->route('admin.members.edit', $member);
    }

    /**
     * Show the form for editing the specified member.
     */
    public function edit(User $member): View
    {
        return view('admin.members.edit', compact('member'));
    }

    /**
     * Update the specified member in storage.
     */
    public function update(UpdateMemberRequest $request, User $member): RedirectResponse
    {
        $validated = $request->validated();

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $member->update($validated);

        return redirect()->route('admin.members.index')->with('success', 'Member updated successfully.');
    }

    /**
     * Remove the specified member from storage.
     */
    public function destroy(User $member): RedirectResponse
    {
        // A good practice check: prevent deleting a member with active loans.
        if ($member->loans()->whereNull('return_date')->exists()) {
            return back()->with('error', 'Cannot delete member with active loans.');
        }

        $member->delete();

        return redirect()->route('admin.members.index')->with('success', 'Member deleted successfully.');
    }
}
