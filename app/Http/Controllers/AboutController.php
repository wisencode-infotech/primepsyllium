<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Country;
use App\Models\Setting;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function __invoke(): View
    {
        $certifications = Certification::query()->active()->ordered()->get();
        $countries = Country::query()->active()->ordered()->get();
        $settings = Setting::current();

        return view('frontend.about-us', compact('certifications', 'countries', 'settings'));
    }
}
