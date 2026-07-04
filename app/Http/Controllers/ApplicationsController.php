<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ApplicationsController extends Controller
{
    public function __invoke(): View
    {
        return view('frontend.applications');
    }
}
