<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactInquiryRequest;
use App\Mail\ContactInquiryNotification;
use App\Models\ContactInquiry;
use App\Models\EmailRecipient;
use App\Models\EmailTemplate;
use App\Models\Setting;
use App\Models\User;
use App\Notifications\NewContactInquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(ContactInquiryRequest $request): RedirectResponse
    {
        $inquiry = ContactInquiry::query()->create($request->validated());

        $sent = $this->notifyRecipients($inquiry);

        if ($sent) {
            $inquiry->update(['email_sent' => true]);
        }

        User::role('super-admin')->get()->each->notify(new NewContactInquiry($inquiry));

        return redirect()->to(url('/').'#get-in-touch')
            ->with('contact_status', 'Thank you for reaching out. Our team will get back to you shortly.');
    }

    private function notifyRecipients(ContactInquiry $inquiry): bool
    {
        $recipients = EmailRecipient::query()->active()->pluck('email')->all();

        if (empty($recipients)) {
            $fallbackEmail = Setting::current()->email;

            if ($fallbackEmail) {
                $recipients = [$fallbackEmail];
            }
        }

        if (empty($recipients)) {
            return false;
        }

        $template = EmailTemplate::query()
            ->where('slug', EmailTemplate::CONTACT_INQUIRY_SLUG)
            ->active()
            ->first();

        $rendered = $this->renderTemplate($template, $inquiry);

        try {
            Mail::to(array_shift($recipients))
                ->bcc($recipients)
                ->send(new ContactInquiryNotification($inquiry, $rendered['subject'], $rendered['body']));

            return true;
        } catch (\Throwable $e) {
            Log::error('Failed to send contact inquiry notification: '.$e->getMessage());

            return false;
        }
    }

    /**
     * @return array{subject: string, body: string}
     */
    private function renderTemplate(?EmailTemplate $template, ContactInquiry $inquiry): array
    {
        $data = [
            '{{name}}' => $inquiry->name,
            '{{company}}' => $inquiry->company,
            '{{email}}' => $inquiry->email,
            '{{product_interest}}' => $inquiry->product_interest,
            '{{message}}' => nl2br(e($inquiry->message)),
            '{{submitted_at}}' => $inquiry->created_at->format('d M Y, h:i A'),
        ];

        if ($template) {
            return $template->render($data);
        }

        return [
            'subject' => 'New Contact Inquiry from '.$inquiry->name,
            'body' => sprintf(
                '<p><strong>Name:</strong> %s</p><p><strong>Company:</strong> %s</p><p><strong>Email:</strong> %s</p><p><strong>Product Interest:</strong> %s</p><p><strong>Message:</strong><br>%s</p>',
                e($inquiry->name),
                e($inquiry->company),
                e($inquiry->email),
                e($inquiry->product_interest),
                nl2br(e($inquiry->message))
            ),
        ];
    }
}
