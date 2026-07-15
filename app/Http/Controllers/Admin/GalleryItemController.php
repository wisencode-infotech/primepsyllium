<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryItemRequest;
use App\Models\GalleryCategory;
use App\Models\GalleryItem;
use App\Services\GalleryThumbnailer;
use App\Services\GalleryWatermarker;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class GalleryItemController extends Controller
{
    public function index(Request $request): View
    {
        $categoryId = $request->integer('category') ?: null;

        $galleryItems = GalleryItem::query()
            ->with('category')
            ->category($categoryId)
            ->ordered()
            ->paginate(20)
            ->withQueryString();

        $galleryCategories = GalleryCategory::query()->orderBy('name')->get();

        return view('backend.gallery.index', compact('galleryItems', 'galleryCategories', 'categoryId'));
    }

    public function create(): View
    {
        $galleryCategories = GalleryCategory::query()->orderBy('name')->get();

        return view('backend.gallery.create', compact('galleryCategories'));
    }

    public function store(GalleryItemRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = (int) GalleryItem::query()->max('sort_order') + 1;

        if ($data['type'] === 'video') {
            $data['image'] = null;

            if ($request->hasFile('video')) {
                $data['video'] = $request->file('video')->store('gallery', 'public');
            }

            if ($request->hasFile('video_thumbnail')) {
                $data['video_thumbnail'] = $request->file('video_thumbnail')->store('gallery', 'public');
                GalleryWatermarker::apply($data['video_thumbnail']);
                GalleryThumbnailer::generate($data['video_thumbnail']);
            }
        } else {
            $data['video'] = null;
            $data['video_thumbnail'] = null;

            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('gallery', 'public');
                GalleryWatermarker::apply($data['image']);
                GalleryThumbnailer::generate($data['image']);
            }
        }

        GalleryItem::query()->create($data);

        return redirect()->route('admin.gallery.index')->with('status', 'Gallery item created successfully.');
    }

    public function edit(GalleryItem $gallery): View
    {
        $galleryCategories = GalleryCategory::query()->orderBy('name')->get();

        return view('backend.gallery.edit', ['galleryItem' => $gallery, 'galleryCategories' => $galleryCategories]);
    }

    public function update(GalleryItemRequest $request, GalleryItem $gallery): RedirectResponse
    {
        $data = $request->validated();
        $data['is_active'] = $request->boolean('is_active');

        if ($data['type'] === 'video') {
            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
                GalleryThumbnailer::delete($gallery->image);
            }
            $data['image'] = null;

            if ($request->hasFile('video')) {
                if ($gallery->video) {
                    Storage::disk('public')->delete($gallery->video);
                }
                $data['video'] = $request->file('video')->store('gallery', 'public');
            } else {
                $data['video'] = $gallery->video;
            }

            if ($request->hasFile('video_thumbnail')) {
                if ($gallery->video_thumbnail) {
                    Storage::disk('public')->delete($gallery->video_thumbnail);
                    GalleryThumbnailer::delete($gallery->video_thumbnail);
                }
                $data['video_thumbnail'] = $request->file('video_thumbnail')->store('gallery', 'public');
                GalleryWatermarker::apply($data['video_thumbnail']);
                GalleryThumbnailer::generate($data['video_thumbnail']);
            } else {
                $data['video_thumbnail'] = $gallery->video_thumbnail;
            }
        } else {
            if ($gallery->video) {
                Storage::disk('public')->delete($gallery->video);
            }
            if ($gallery->video_thumbnail) {
                Storage::disk('public')->delete($gallery->video_thumbnail);
                GalleryThumbnailer::delete($gallery->video_thumbnail);
            }
            $data['video'] = null;
            $data['video_thumbnail'] = null;

            if ($request->hasFile('image')) {
                if ($gallery->image) {
                    Storage::disk('public')->delete($gallery->image);
                    GalleryThumbnailer::delete($gallery->image);
                }
                $data['image'] = $request->file('image')->store('gallery', 'public');
                GalleryWatermarker::apply($data['image']);
                GalleryThumbnailer::generate($data['image']);
            } else {
                $data['image'] = $gallery->image;
            }
        }

        $gallery->update($data);

        return redirect()->route('admin.gallery.index')->with('status', 'Gallery item updated successfully.');
    }

    public function destroy(GalleryItem $gallery): RedirectResponse
    {
        foreach ([$gallery->image, $gallery->video_thumbnail] as $file) {
            if ($file) {
                GalleryThumbnailer::delete($file);
            }
        }

        foreach ([$gallery->image, $gallery->video, $gallery->video_thumbnail] as $file) {
            if ($file) {
                Storage::disk('public')->delete($file);
            }
        }

        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('status', 'Gallery item deleted successfully.');
    }

    public function reorder(Request $request): JsonResponse
    {
        $ids = $request->input('order', []);

        // Reassign only the sort_order slots already held by these rows, so
        // reordering within one page of a paginated list can't collide with
        // sort_order values belonging to items on other pages.
        $slots = GalleryItem::query()->whereIn('id', $ids)->pluck('sort_order')->sort()->values();

        foreach ($ids as $index => $id) {
            if (isset($slots[$index])) {
                GalleryItem::query()->whereKey($id)->update(['sort_order' => $slots[$index]]);
            }
        }

        return response()->json(['status' => 'ok']);
    }
}
