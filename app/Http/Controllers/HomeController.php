<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Country;
use App\Models\MediaCenterItem;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $products = Product::query()->active()->ordered()->where('category', 'psyllium')->get();
        $certifications = Certification::query()->active()->onHome()->ordered()->get();
        $mediaCenterItems = MediaCenterItem::query()->active()->onHomepage()->ordered()->get();
        $countries = Country::query()->active()->ordered()->get();
        $settings = Setting::current();

        return view('frontend.home', compact('products', 'certifications', 'mediaCenterItems', 'countries', 'settings'));
    }
}
