<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatConversation;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ChatLogController extends Controller
{
    public function index(): View
    {
        $conversations = ChatConversation::query()
            ->withCount('messages')
            ->latest()
            ->paginate(20);

        return view('backend.chat-logs.index', compact('conversations'));
    }

    public function show(ChatConversation $chat_log): View
    {
        $chat_log->load('messages', 'contactInquiry');

        return view('backend.chat-logs.show', ['conversation' => $chat_log]);
    }

    public function destroy(ChatConversation $chat_log): RedirectResponse
    {
        $chat_log->delete();

        return redirect()->route('admin.chat-logs.index')->with('status', 'Conversation deleted successfully.');
    }

    public function clearAll(): RedirectResponse
    {
        ChatConversation::query()->delete();

        return redirect()->route('admin.chat-logs.index')->with('status', 'All chat conversations cleared.');
    }
}
