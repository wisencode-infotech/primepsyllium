<?php

namespace App\Http\Controllers;

use App\Models\GalleryItem;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function __invoke(): View
    {
        $galleryItems = GalleryItem::query()->active()->ordered()->get();

        return view('frontend.gallery', compact('galleryItems'));
    }
}
