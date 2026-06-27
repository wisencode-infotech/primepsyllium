<?php

namespace App\View\Components;

use App\Models\Country;
use App\Models\Setting;
use Illuminate\View\Component;
use Illuminate\View\View;

class FrontendLayout extends Component
{
    public function render(): View
    {
        $activeCountries = Country::query()->active()->ordered()->get();
        $footerCountries = $activeCountries->where('show_in_footer', true)->values();

        return view('frontend.layouts.app', [
            'settings' => Setting::current(),
            'footerCountries' => $footerCountries,
            'footerCountriesRemaining' => max($activeCountries->count() - $footerCountries->count(), 0),
        ]);
    }
}
