<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryCategoryRequest;
use App\Models\GalleryCategory;
use App\Models\Setting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GalleryCategoryController extends Controller
{
    public function index(): View
    {
        $galleryCategories = GalleryCategory::query()->withCount('galleryItems')->ordered()->get();
        $defaultCategoryId = Setting::current()->default_gallery_category_id;

        return view('backend.gallery-categories.index', compact('galleryCategories', 'defaultCategoryId'));
    }

    public function create(): View
    {
        return view('backend.gallery-categories.create');
    }

    public function store(GalleryCategoryRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['sort_order'] = (int) GalleryCategory::query()->max('sort_order') + 1;

        GalleryCategory::query()->create($data);

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

    public function reorder(Request $request): JsonResponse
    {
        $ids = $request->input('order', []);

        foreach ($ids as $index => $id) {
            GalleryCategory::query()->whereKey($id)->update(['sort_order' => $index]);
        }

        return response()->json(['status' => 'ok']);
    }

    public function setDefault(GalleryCategory $gallery_category): RedirectResponse
    {
        $setting = Setting::current();
        $data = ['default_gallery_category_id' => $gallery_category->id];

        $setting->exists ? $setting->update($data) : Setting::query()->create($data);

        return redirect()->route('admin.gallery-categories.index')
            ->with('status', "\"{$gallery_category->name}\" is now the default category shown on the gallery page.");
    }

    public function clearDefault(): RedirectResponse
    {
        $setting = Setting::current();

        if ($setting->exists) {
            $setting->update(['default_gallery_category_id' => null]);
        }

        return redirect()->route('admin.gallery-categories.index')
            ->with('status', 'The gallery page will default to showing all items again.');
    }
}
