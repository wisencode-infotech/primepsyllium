<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Country;
use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::query()->active()->ordered()->get();
        $certifications = Certification::query()->active()->ordered()->get();
        $countries = Country::query()->active()->ordered()->get();

        return view('frontend.products.index', compact('products', 'certifications', 'countries'));
    }

    public function show(Product $product): View
    {
        abort_unless($product->is_active, 404);

        $otherProducts = Product::query()
            ->active()
            ->ordered()
            ->where('id', '!=', $product->id)
            ->get();

        return view('frontend.products.show', [
            'product' => $product,
            'otherProducts' => $otherProducts,
        ]);
    }
}
