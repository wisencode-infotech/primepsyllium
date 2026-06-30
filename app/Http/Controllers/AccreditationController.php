<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use Illuminate\View\View;

class AccreditationController extends Controller
{
    public function __invoke(): View
    {
        $certifications = Certification::query()->active()->ordered()->get();

        return view('frontend.accreditation', compact('certifications'));
    }
}
