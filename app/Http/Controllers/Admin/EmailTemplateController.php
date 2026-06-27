<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailTemplateRequest;
use App\Models\EmailTemplate;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EmailTemplateController extends Controller
{
    public function index(): View
    {
        $emailTemplates = EmailTemplate::query()->orderBy('name')->get();

        return view('backend.email-templates.index', compact('emailTemplates'));
    }

    public function create(): View
    {
        return view('backend.email-templates.create');
    }

    public function store(EmailTemplateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['is_active'] = $request->boolean('is_active');

        EmailTemplate::query()->create($data);

        return redirect()->route('admin.email-templates.index')->with('status', 'Email template created successfully.');
    }

    public function edit(EmailTemplate $email_template): View
    {
        return view('backend.email-templates.edit', ['emailTemplate' => $email_template]);
    }

    public function update(EmailTemplateRequest $request, EmailTemplate $email_template): RedirectResponse
    {
        $data = $request->validated();
        $data['is_active'] = $request->boolean('is_active');

        $email_template->update($data);

        return redirect()->route('admin.email-templates.index')->with('status', 'Email template updated successfully.');
    }

    public function destroy(EmailTemplate $email_template): RedirectResponse
    {
        if ($email_template->slug === EmailTemplate::CONTACT_INQUIRY_SLUG) {
            return redirect()->route('admin.email-templates.index')->with('error', 'The contact inquiry template is used by the website and cannot be deleted.');
        }

        $email_template->delete();

        return redirect()->route('admin.email-templates.index')->with('status', 'Email template deleted successfully.');
    }
}
