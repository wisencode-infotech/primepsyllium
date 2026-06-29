<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailBrandSettingRequest;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class EmailBrandSettingController extends Controller
{
    public function edit(): View
    {
        $setting = Setting::current();

        return view('backend.settings.email-branding', compact('setting'));
    }

    public function update(EmailBrandSettingRequest $request): RedirectResponse
    {
        $setting = Setting::current();
        $data = $request->validated();

        if ($request->hasFile('email_logo')) {
            if ($setting->email_logo) {
                Storage::disk('public')->delete($setting->email_logo);
            }

            $data['email_logo'] = $request->file('email_logo')->store('branding', 'public');
        }

        if ($setting->exists) {
            $setting->update($data);
        } else {
            Setting::query()->create($data);
        }

        return redirect()->route('admin.email-branding.edit')->with('status', 'Email brand identity updated successfully.');
    }

    public function restore(): RedirectResponse
    {
        $setting = Setting::current();

        $defaults = [
            'email_primary_color' => null,
            'email_secondary_color' => null,
            'email_accent_color' => null,
            'email_text_color' => null,
            'email_background_color' => null,
            'email_button_color' => null,
            'email_button_text_color' => null,
        ];

        if ($setting->exists) {
            $setting->update($defaults);
        } else {
            Setting::query()->create($defaults);
        }

        return redirect()->route('admin.email-branding.edit')->with('status', 'Email brand colors restored to defaults.');
    }
}
