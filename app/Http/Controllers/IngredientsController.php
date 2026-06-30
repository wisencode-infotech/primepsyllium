<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class IngredientsController extends Controller
{
    public function __invoke(): View
    {
        $products = Product::query()->active()->ordered()->get();

        return view('frontend.ingredients.index', compact('products'));
    }
}
