<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReplyInquiryRequest;
use App\Mail\ContactInquiryReply;
use App\Models\ContactInquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
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
        auth()->user()->unreadNotifications()
            ->where('data->inquiry_id', $inquiry->id)
            ->get()
            ->markAsRead();

        $inquiry->load('replies.user', 'replies.attachments');

        return view('backend.inquiries.show', compact('inquiry'));
    }

    public function reply(ReplyInquiryRequest $request, ContactInquiry $inquiry): RedirectResponse
    {
        $message = $request->validated('message');
        $files = $request->file('attachments', []);

        $mailable = new ContactInquiryReply($inquiry, $message);

        foreach ($files as $file) {
            $mailable->attach($file->getRealPath(), [
                'as' => $file->getClientOriginalName(),
                'mime' => $file->getMimeType(),
            ]);
        }

        try {
            Mail::to($inquiry->email)->send($mailable);
        } catch (\Throwable $e) {
            Log::error('Failed to send inquiry reply: '.$e->getMessage());

            return redirect()->route('admin.inquiries.show', $inquiry)
                ->with('error', 'The reply could not be sent. Please try again.');
        }

        $reply = $inquiry->replies()->create([
            'user_id' => auth()->id(),
            'message' => $message,
        ]);

        foreach ($files as $file) {
            $reply->attachments()->create([
                'original_name' => $file->getClientOriginalName(),
                'path' => $file->store('inquiry-attachments', 'public'),
                'mime_type' => $file->getMimeType(),
                'size' => $file->getSize(),
            ]);
        }

        return redirect()->route('admin.inquiries.show', $inquiry)->with('status', 'Reply sent successfully.');
    }

    public function destroy(ContactInquiry $inquiry): RedirectResponse
    {
        $inquiry->delete();

        return redirect()->route('admin.inquiries.index')->with('status', 'Inquiry deleted successfully.');
    }
}
