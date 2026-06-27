<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailRecipientRequest;
use App\Models\EmailRecipient;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EmailRecipientController extends Controller
{
    public function index(): View
    {
        $emailRecipients = EmailRecipient::query()->orderByDesc('created_at')->get();

        return view('backend.email-recipients.index', compact('emailRecipients'));
    }

    public function create(): View
    {
        return view('backend.email-recipients.create');
    }

    public function store(EmailRecipientRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['is_active'] = $request->boolean('is_active');

        EmailRecipient::query()->create($data);

        return redirect()->route('admin.email-recipients.index')->with('status', 'Recipient added successfully.');
    }

    public function edit(EmailRecipient $email_recipient): View
    {
        return view('backend.email-recipients.edit', ['emailRecipient' => $email_recipient]);
    }

    public function update(EmailRecipientRequest $request, EmailRecipient $email_recipient): RedirectResponse
    {
        $data = $request->validated();
        $data['is_active'] = $request->boolean('is_active');

        $email_recipient->update($data);

        return redirect()->route('admin.email-recipients.index')->with('status', 'Recipient updated successfully.');
    }

    public function destroy(EmailRecipient $email_recipient): RedirectResponse
    {
        $email_recipient->delete();

        return redirect()->route('admin.email-recipients.index')->with('status', 'Recipient removed successfully.');
    }
}
