<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class IngredientsController extends Controller
{
    public function __invoke(): View
    {
        $products = Product::query()->active()->ordered()->where('category', 'psyllium')->get();
        $otherProducts = Product::query()->active()->ordered()->where('category', 'other')->get();

        return view('frontend.ingredients.index', compact('products', 'otherProducts'));
    }
}
