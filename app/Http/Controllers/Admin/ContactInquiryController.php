<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactInquiryController extends Controller
{
    public function index(): View
    {
        $inquiries = ContactInquiry::query()->latestFirst()->paginate(20);

        return view('backend.inquiries.index', compact('inquiries'));
    }

    public function show(ContactInquiry $inquiry): View
    {
        return view('backend.inquiries.show', compact('inquiry'));
    }

    public function destroy(ContactInquiry $inquiry): RedirectResponse
    {
        $inquiry->delete();

        return redirect()->route('admin.inquiries.index')->with('status', 'Inquiry deleted successfully.');
    }
}
