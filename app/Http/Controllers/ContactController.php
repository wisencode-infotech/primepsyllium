<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactInquiryRequest;
use App\Models\ChatConversation;
use App\Models\ContactInquiry;
use App\Models\Product;
use App\Models\Setting;
use App\Services\ContactInquiryNotifier;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('frontend.contact', [
            'products' => Product::query()->active()->ordered()->get(),
            'settings' => Setting::current(),
        ]);
    }

    public function store(ContactInquiryRequest $request, ContactInquiryNotifier $notifier): RedirectResponse
    {
        $inquiry = ContactInquiry::query()->create($request->validated());

        $notifier->handle($inquiry);

        if ($inquiry->source === 'chatbot' && $request->filled('session_id')) {
            ChatConversation::where('session_id', $request->string('session_id'))
                ->update([
                    'escalated' => true,
                    'escalated_contact_inquiry_id' => $inquiry->id,
                ]);
        }

        return redirect()->to(url()->previous(url('/')).'#get-in-touch')
            ->with('contact_status', 'Thank you for reaching out. Our team will get back to you shortly.');
    }
}
