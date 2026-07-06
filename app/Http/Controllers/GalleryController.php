<?php

namespace App\Http\Controllers;

use App\Models\GalleryCategory;
use App\Models\GalleryItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GalleryController extends Controller
{
    private const PER_PAGE = 12;

    public function __invoke(Request $request): View
    {
        $categories = $this->categoriesWithItems();
        $activeCategoryId = $request->integer('category') ?: null;
        $activeCategory = $activeCategoryId ? GalleryCategory::query()->find($activeCategoryId) : null;

        $galleryItems = $this->itemsQuery($activeCategoryId)->paginate(self::PER_PAGE);

        return view('frontend.gallery', compact('galleryItems', 'categories', 'activeCategory'));
    }

    public function items(Request $request): JsonResponse
    {
        $activeCategoryId = $request->integer('category') ?: null;

        $galleryItems = $this->itemsQuery($activeCategoryId)->paginate(self::PER_PAGE);

        return response()->json([
            'html' => view('frontend.gallery._items', compact('galleryItems'))->render(),
            'has_more' => $galleryItems->hasMorePages(),
            'next_page' => $galleryItems->currentPage() + 1,
            'total' => $galleryItems->total(),
        ]);
    }

    private function categoriesWithItems()
    {
        return GalleryCategory::query()
            ->whereHas('galleryItems', fn ($q) => $q->active())
            ->orderBy('name')
            ->get();
    }

    private function itemsQuery(?int $categoryId)
    {
        return GalleryItem::query()
            ->active()
            ->category($categoryId)
            ->ordered();
    }
}
