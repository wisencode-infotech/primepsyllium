<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Product;
use Illuminate\View\View;

class CountryController extends Controller
{
    public function show(Country $country): View
    {
        abort_unless($country->is_active && $country->has_page, 404);

        $products = Product::query()->active()->ordered()->where('category', 'psyllium')->get();

        return view('frontend.countries.show', [
            'country' => $country,
            'products' => $products,
        ]);
    }
}
