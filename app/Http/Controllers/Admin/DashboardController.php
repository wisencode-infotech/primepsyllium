<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use App\Models\Product;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('backend.dashboard', [
            'productsCount' => Product::query()->count(),
            'activeProductsCount' => Product::query()->active()->count(),
            'certificationsCount' => Certification::query()->count(),
            'activeCertificationsCount' => Certification::query()->active()->count(),
        ]);
    }
}
