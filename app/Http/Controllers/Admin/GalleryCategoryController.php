<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryCategoryRequest;
use App\Models\GalleryCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GalleryCategoryController extends Controller
{
    public function index(): View
    {
        $galleryCategories = GalleryCategory::query()->withCount('galleryItems')->orderBy('name')->get();

        return view('backend.gallery-categories.index', compact('galleryCategories'));
    }

    public function create(): View
    {
        return view('backend.gallery-categories.create');
    }

    public function store(GalleryCategoryRequest $request): RedirectResponse
    {
        GalleryCategory::query()->create($request->validated());

        return redirect()->route('admin.gallery-categories.index')->with('status', 'Category added successfully.');
    }

    public function edit(GalleryCategory $gallery_category): View
    {
        return view('backend.gallery-categories.edit', ['galleryCategory' => $gallery_category]);
    }

    public function update(GalleryCategoryRequest $request, GalleryCategory $gallery_category): RedirectResponse
    {
        $gallery_category->update($request->validated());

        return redirect()->route('admin.gallery-categories.index')->with('status', 'Category updated successfully.');
    }

    public function destroy(GalleryCategory $gallery_category): RedirectResponse
    {
        if ($gallery_category->galleryItems()->exists()) {
            return redirect()->route('admin.gallery-categories.index')
                ->with('error', 'This category still has gallery items assigned. Move or delete those items first.');
        }

        $gallery_category->delete();

        return redirect()->route('admin.gallery-categories.index')->with('status', 'Category deleted successfully.');
    }
}
