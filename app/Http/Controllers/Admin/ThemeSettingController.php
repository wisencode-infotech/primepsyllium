<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ThemeSettingRequest;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ThemeSettingController extends Controller
{
    public function edit(): View
    {
        $setting = Setting::current();

        return view('backend.settings.theme', compact('setting'));
    }

    public function update(ThemeSettingRequest $request): RedirectResponse
    {
        $setting = Setting::current();
        $data = $request->validated();

        if ($setting->exists) {
            $setting->update($data);
        } else {
            Setting::query()->create($data);
        }

        return redirect()->route('admin.theme.edit')->with('status', 'Brand theme colors updated successfully.');
    }

    public function restore(): RedirectResponse
    {
        $setting = Setting::current();

        $defaults = [
            'primary_color' => null,
            'secondary_color' => null,
            'primary_light_color' => null,
        ];

        if ($setting->exists) {
            $setting->update($defaults);
        } else {
            Setting::query()->create($defaults);
        }

        return redirect()->route('admin.theme.edit')->with('status', 'Brand theme colors restored to defaults.');
    }
}
