<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PhotoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $photos = PhotoGallery::latest()->paginate(12);
        return view('admin.photos.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.photos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:16384',
        ]);

        // Store the image in the 'gallery' directory inside 'storage/app/public'
        $path = $request->file('image')->store('gallery', 'public');
        $validated['image_path'] = $path;

        PhotoGallery::create($validated);

        return redirect()->route('admin.photos.index')->with('success', 'Photo uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhotoGallery $photo): RedirectResponse
    {
        // Delete the image file from storage
        Storage::disk('public')->delete($photo->image_path);

        // Delete the database record
        $photo->delete();

        return redirect()->route('admin.photos.index')->with('success', 'Photo deleted successfully.');
    }
}
