<?php

namespace App\View\Components;

use App\Models\Country;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\View\Component;
use Illuminate\View\View;

class FrontendLayout extends Component
{
    public function render(): View
    {
        $activeCountries = Country::query()->active()->ordered()->get();
        $footerCountries = $activeCountries->where('show_in_footer', true)->values();

        $activeProducts = Product::query()->active()->ordered()->where('category', 'psyllium')->get();
        $footerProducts = $activeProducts->take(5);

        return view('frontend.layouts.app', [
            'settings' => Setting::current(),
            'footerCountries' => $footerCountries,
            'footerCountriesRemaining' => max($activeCountries->count() - $footerCountries->count(), 0),
            'footerProducts' => $footerProducts,
            'footerProductsRemaining' => max($activeProducts->count() - $footerProducts->count(), 0),
        ]);
    }
}
