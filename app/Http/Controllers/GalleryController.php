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

        $datePeriods = GalleryItem::memoryPeriods();
        $activeDatePeriod = $this->resolveActiveDatePeriod($request, $datePeriods);

        $galleryItems = $this->itemsQuery($activeCategoryId, $activeDatePeriod)->paginate(self::PER_PAGE);

        return view('frontend.gallery', compact('galleryItems', 'categories', 'activeCategory', 'datePeriods', 'activeDatePeriod'));
    }

    public function items(Request $request): JsonResponse
    {
        $activeCategoryId = $this->resolveActiveCategoryId($request);
        $activeDatePeriod = $this->resolveActiveDatePeriod($request, GalleryItem::memoryPeriods());

        $galleryItems = $this->itemsQuery($activeCategoryId, $activeDatePeriod)->paginate(self::PER_PAGE);

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

    /**
     * Only accept a ?date= value that is one of the currently available
     * periods, so stale links (e.g. a month whose items were removed)
     * gracefully fall back to "all dates".
     *
     * @param  array<int, array{key: string, label: string}>  $datePeriods
     */
    private function resolveActiveDatePeriod(Request $request, array $datePeriods): ?string
    {
        $date = $request->query('date');

        if (! $date || $date === 'all') {
            return null;
        }

        return collect($datePeriods)->firstWhere('key', $date)['key'] ?? null;
    }

    private function categoriesWithItems()
    {
        return GalleryCategory::query()
            ->whereHas('galleryItems', fn ($q) => $q->active())
            ->ordered()
            ->get();
    }

    private function itemsQuery(?int $categoryId, ?string $datePeriod = null)
    {
        return GalleryItem::query()
            ->active()
            ->category($categoryId)
            ->memoryPeriod($datePeriod)
            ->ordered();
    }
}
