<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class BackendGuestLayout extends Component
{
    public function render(): View
    {
        return view('backend.layouts.guest');
    }
}
