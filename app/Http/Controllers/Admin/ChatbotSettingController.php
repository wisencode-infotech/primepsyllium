<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChatbotSettingRequest;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ChatbotSettingController extends Controller
{
    public function edit(): View
    {
        $setting = Setting::current();

        return view('backend.ai-chatbot-settings.edit', compact('setting'));
    }

    public function update(ChatbotSettingRequest $request): RedirectResponse
    {
        $setting = Setting::current();
        $data = $request->safe()->only(['chat_gateway_url', 'chat_gateway_timeout']);

        // Leaving the secret field blank keeps the existing one — the current
        // value is never displayed back in the form, so an empty submit
        // should never be treated as "clear the secret".
        if ($request->filled('chat_gateway_secret')) {
            $data['chat_gateway_secret'] = $request->string('chat_gateway_secret')->value();
        }

        if ($setting->exists) {
            $setting->update($data);
        } else {
            Setting::query()->create($data);
        }

        return redirect()->route('admin.ai-chatbot-settings.edit')->with('status', 'AI chatbot settings updated successfully.');
    }
}
