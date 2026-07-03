<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyVideoRequest;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CompanyVideoController extends Controller
{
    public function edit(): View
    {
        $setting = Setting::current();

        return view('backend.settings.company-video', compact('setting'));
    }

    public function update(CompanyVideoRequest $request): RedirectResponse
    {
        $setting = Setting::current();
        $data = $request->validated();

        if ($request->hasFile('company_video')) {
            if ($setting->company_video) {
                Storage::disk('public')->delete($setting->company_video);
            }

            $data['company_video'] = $request->file('company_video')->store('company-video', 'public');
        }

        if ($request->hasFile('company_video_thumbnail')) {
            if ($setting->company_video_thumbnail) {
                Storage::disk('public')->delete($setting->company_video_thumbnail);
            }

            $data['company_video_thumbnail'] = $request->file('company_video_thumbnail')->store('company-video', 'public');
        }

        if ($setting->exists) {
            $setting->update($data);
        } else {
            Setting::query()->create($data);
        }

        return redirect()->route('admin.company-video.edit')->with('status', 'Company video updated successfully.');
    }
}
