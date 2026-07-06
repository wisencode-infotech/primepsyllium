<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryItemRequest;
use App\Models\GalleryCategory;
use App\Models\GalleryItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class GalleryItemController extends Controller
{
    public function index(): View
    {
        $galleryItems = GalleryItem::query()->with('category')->ordered()->get();

        return view('backend.gallery.index', compact('galleryItems'));
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
            }
        } else {
            $data['video'] = null;
            $data['video_thumbnail'] = null;

            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('gallery', 'public');
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
                }
                $data['video_thumbnail'] = $request->file('video_thumbnail')->store('gallery', 'public');
            } else {
                $data['video_thumbnail'] = $gallery->video_thumbnail;
            }
        } else {
            if ($gallery->video) {
                Storage::disk('public')->delete($gallery->video);
            }
            if ($gallery->video_thumbnail) {
                Storage::disk('public')->delete($gallery->video_thumbnail);
            }
            $data['video'] = null;
            $data['video_thumbnail'] = null;

            if ($request->hasFile('image')) {
                if ($gallery->image) {
                    Storage::disk('public')->delete($gallery->image);
                }
                $data['image'] = $request->file('image')->store('gallery', 'public');
            } else {
                $data['image'] = $gallery->image;
            }
        }

        $gallery->update($data);

        return redirect()->route('admin.gallery.index')->with('status', 'Gallery item updated successfully.');
    }

    public function destroy(GalleryItem $gallery): RedirectResponse
    {
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

        foreach ($ids as $index => $id) {
            GalleryItem::query()->whereKey($id)->update(['sort_order' => $index]);
        }

        return response()->json(['status' => 'ok']);
    }
}
