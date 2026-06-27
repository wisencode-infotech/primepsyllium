<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function edit(): View
    {
        $setting = Setting::current();

        return view('backend.settings.edit', compact('setting'));
    }

    public function update(SettingRequest $request): RedirectResponse
    {
        $setting = Setting::current();
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            if ($setting->logo) {
                Storage::disk('public')->delete($setting->logo);
            }

            $data['logo'] = $request->file('logo')->store('branding', 'public');
        }

        if ($request->hasFile('global_presence_image')) {
            if ($setting->global_presence_image) {
                Storage::disk('public')->delete($setting->global_presence_image);
            }

            $data['global_presence_image'] = $request->file('global_presence_image')->store('branding', 'public');
        }

        if ($request->hasFile('favicon')) {
            if ($setting->favicon) {
                Storage::disk('public')->delete($setting->favicon);
            }

            $data['favicon'] = $request->file('favicon')->store('branding', 'public');
        }

        if ($setting->exists) {
            $setting->update($data);
        } else {
            Setting::query()->create($data);
        }

        return redirect()->route('admin.settings.edit')->with('status', 'Settings updated successfully.');
    }
}
