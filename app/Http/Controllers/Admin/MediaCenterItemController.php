<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MediaCenterItemRequest;
use App\Models\MediaCenterItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class MediaCenterItemController extends Controller
{
    public function index(): View
    {
        $mediaCenterItems = MediaCenterItem::query()->ordered()->get();

        return view('backend.media-center.index', compact('mediaCenterItems'));
    }

    public function create(): View
    {
        return view('backend.media-center.create');
    }

    public function store(MediaCenterItemRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['slug'] = $this->uniqueSlug($data['title']);
        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = (int) MediaCenterItem::query()->max('sort_order') + 1;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('media-center', 'public');
        }

        MediaCenterItem::query()->create($data);

        return redirect()->route('admin.media-center-items.index')->with('status', 'Media center item created successfully.');
    }

    public function edit(MediaCenterItem $media_center_item): View
    {
        return view('backend.media-center.edit', ['mediaCenterItem' => $media_center_item]);
    }

    public function update(MediaCenterItemRequest $request, MediaCenterItem $media_center_item): RedirectResponse
    {
        $data = $request->validated();
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            if ($media_center_item->image) {
                Storage::disk('public')->delete($media_center_item->image);
            }

            $data['image'] = $request->file('image')->store('media-center', 'public');
        }

        $media_center_item->update($data);

        return redirect()->route('admin.media-center-items.index')->with('status', 'Media center item updated successfully.');
    }

    public function destroy(MediaCenterItem $media_center_item): RedirectResponse
    {
        if ($media_center_item->image) {
            Storage::disk('public')->delete($media_center_item->image);
        }

        $media_center_item->delete();

        return redirect()->route('admin.media-center-items.index')->with('status', 'Media center item deleted successfully.');
    }

    public function reorder(Request $request): JsonResponse
    {
        $ids = $request->input('order', []);

        foreach ($ids as $index => $id) {
            MediaCenterItem::query()->whereKey($id)->update(['sort_order' => $index]);
        }

        return response()->json(['status' => 'ok']);
    }

    private function uniqueSlug(string $title): string
    {
        $slug = Str::slug($title);
        $original = $slug;
        $suffix = 2;

        while (MediaCenterItem::query()->where('slug', $slug)->exists()) {
            $slug = $original.'-'.$suffix;
            $suffix++;
        }

        return $slug;
    }
}
