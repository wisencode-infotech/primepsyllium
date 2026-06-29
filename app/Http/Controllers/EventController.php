<?php

namespace App\Http\Controllers;

use App\Models\MediaCenterItem;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(): View
    {
        $events = MediaCenterItem::query()->active()->ordered()->get();

        return view('frontend.events.index', compact('events'));
    }

    public function show(MediaCenterItem $event): View
    {
        abort_unless($event->is_active, 404);

        $items = MediaCenterItem::query()->active()->ordered()->get();
        $position = $items->search(fn ($item) => $item->id === $event->id);

        $previous = $position !== false && $position > 0 ? $items->get($position - 1) : null;
        $next = $position !== false ? $items->get($position + 1) : null;
        $otherItems = $items->reject(fn ($item) => $item->id === $event->id)->take(3);

        return view('frontend.events.show', [
            'event' => $event,
            'previous' => $previous,
            'next' => $next,
            'otherItems' => $otherItems,
        ]);
    }
}
