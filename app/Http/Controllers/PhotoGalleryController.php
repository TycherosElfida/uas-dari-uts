<?php

namespace App\Http\Controllers;

use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PhotoGalleryController extends Controller
{
    public function index(): View
    {
        $photos = PhotoGallery::latest()->get();
        return view('gallery.index', compact('photos'));
    }
}
