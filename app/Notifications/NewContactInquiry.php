<?php

namespace App\Notifications;

use App\Models\ContactInquiry;
use Illuminate\Notifications\Notification;

class NewContactInquiry extends Notification
{
    public function __construct(
        public ContactInquiry $inquiry,
    ) {}

    /**
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'inquiry_id' => $this->inquiry->id,
            'name' => $this->inquiry->name,
            'company' => $this->inquiry->company,
            'product_interest' => $this->inquiry->product_interest,
            'submitted_at' => $this->inquiry->created_at->toIso8601String(),
        ];
    }
}
