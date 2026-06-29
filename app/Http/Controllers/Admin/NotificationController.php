<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function markAsRead(DatabaseNotification $notification): RedirectResponse
    {
        $this->authorizeNotification($notification);

        $notification->markAsRead();

        $inquiryId = $notification->data['inquiry_id'] ?? null;

        if ($inquiryId) {
            return redirect()->route('admin.inquiries.show', $inquiryId);
        }

        return redirect()->back();
    }

    public function markAllAsRead(): RedirectResponse
    {
        auth()->user()->unreadNotifications->markAsRead();

        return redirect()->back();
    }

    private function authorizeNotification(DatabaseNotification $notification): void
    {
        if ($notification->notifiable_id !== auth()->id() || $notification->notifiable_type !== auth()->user()::class) {
            throw new AuthorizationException;
        }
    }
}
