<?php

namespace App\Http\Controllers;

use App\Models\GalleryCategory;
use App\Models\GalleryItem;
use App\Models\Setting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GalleryController extends Controller
{
    private const PER_PAGE = 12;

    public function __invoke(Request $request): View
    {
        $categories = $this->categoriesWithItems();
        $activeCategoryId = $this->resolveActiveCategoryId($request);
        $activeCategory = $activeCategoryId ? GalleryCategory::query()->find($activeCategoryId) : null;

        $galleryItems = $this->itemsQuery($activeCategoryId)->paginate(self::PER_PAGE);

        return view('frontend.gallery', compact('galleryItems', 'categories', 'activeCategory'));
    }

    public function items(Request $request): JsonResponse
    {
        $activeCategoryId = $this->resolveActiveCategoryId($request);

        $galleryItems = $this->itemsQuery($activeCategoryId)->paginate(self::PER_PAGE);

        return response()->json([
            'html' => view('frontend.gallery._items', compact('galleryItems'))->render(),
            'has_more' => $galleryItems->hasMorePages(),
            'next_page' => $galleryItems->currentPage() + 1,
            'total' => $galleryItems->total(),
        ]);
    }

    /**
     * Resolve which category should be active: an explicit ?category=<id>,
     * an explicit ?category=all, or (when the param is absent entirely) the
     * admin-configured default category.
     */
    private function resolveActiveCategoryId(Request $request): ?int
    {
        if (! $request->has('category')) {
            return Setting::current()->default_gallery_category_id;
        }

        $category = $request->query('category');

        return $category === 'all' ? null : ((int) $category ?: null);
    }

    private function categoriesWithItems()
    {
        return GalleryCategory::query()
            ->whereHas('galleryItems', fn ($q) => $q->active())
            ->ordered()
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
