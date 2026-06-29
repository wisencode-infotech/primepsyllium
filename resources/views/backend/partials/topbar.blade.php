@php
    $initials = collect(explode(' ', auth()->user()->name))
        ->filter()
        ->map(fn ($part) => mb_substr($part, 0, 1))
        ->take(2)
        ->implode('');
@endphp

<header class="flex h-16 shrink-0 items-center gap-3 border-b border-border bg-surface-elevated px-4 sm:px-6">
    <button @click="mobileOpen = true" class="rounded-md p-2 text-text-muted hover:bg-surface-muted hover:text-text lg:hidden">
        <x-icon name="menu" class="h-5 w-5" />
    </button>

    <div class="min-w-0 flex-1">
        @isset($header)
            {{ $header }}
        @endisset
    </div>

    <div class="hidden items-center gap-2 rounded-lg border border-border bg-surface px-3 py-2 text-text-muted md:flex">
        <x-icon name="search" class="h-4 w-4 shrink-0" />
        <input type="text" placeholder="Search anything..." class="w-56 border-0 bg-transparent p-0 text-sm text-text placeholder:text-text-muted focus:outline-none focus:ring-0">
    </div>

    <div class="flex items-center gap-2">
        <button
            x-data="{ dark: document.documentElement.dataset.theme === 'dark' }"
            @click="dark = !dark; window.theme.set(dark ? 'dark' : 'light')"
            class="inline-flex h-9 w-9 items-center justify-center rounded-full text-text-muted hover:bg-surface-muted hover:text-text"
            title="Toggle theme"
        >
            <x-icon name="sun" x-show="!dark" class="h-5 w-5" />
            <x-icon name="moon" x-show="dark" class="h-5 w-5" style="display: none;" />
        </button>

        <x-dropdown align="right" width="w-96" content-classes="bg-surface-elevated">
            <x-slot name="trigger">
                <button class="relative inline-flex h-9 w-9 items-center justify-center rounded-full text-text-muted hover:bg-surface-muted hover:text-text" title="Notifications">
                    <x-icon name="bell" class="h-5 w-5" />
                    @if ($unreadNotificationsCount > 0)
                        <span class="absolute -top-1 -right-1 inline-flex h-[1.125rem] min-w-[1.125rem] items-center justify-center rounded-full bg-red-600 px-1 text-[10px] font-semibold leading-none text-white ring-2 ring-surface-elevated">
                            {{ $unreadNotificationsCount > 9 ? '9+' : $unreadNotificationsCount }}
                        </span>
                    @endif
                </button>
            </x-slot>

            <x-slot name="content">
                <div class="flex items-center justify-between gap-3 px-4 py-3 border-b border-border">
                    <div>
                        <p class="text-sm font-semibold text-text">Notifications</p>
                        <p class="text-xs text-text-muted">
                            {{ $unreadNotificationsCount > 0 ? $unreadNotificationsCount.' unread' : 'You\'re all caught up' }}
                        </p>
                    </div>
                    @if ($unreadNotificationsCount > 0)
                        <form method="POST" action="{{ route('admin.notifications.mark-all-read') }}">
                            @csrf
                            <button type="submit" class="inline-flex items-center gap-1 text-xs font-medium text-primary hover:text-primary-hover hover:underline">
                                Mark all as read
                            </button>
                        </form>
                    @endif
                </div>

                <div class="max-h-96 overflow-y-auto divide-y divide-border">
                    @forelse ($recentNotifications as $notification)
                        <form method="POST" action="{{ route('admin.notifications.read', $notification->id) }}">
                            @csrf
                            <button type="submit" class="group flex w-full items-start gap-3 border-l-2 px-4 py-3 text-left transition hover:bg-surface-muted {{ $notification->read_at ? 'border-transparent' : 'border-primary bg-primary-soft' }}">
                                <span class="relative mt-0.5 inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-primary-soft text-primary">
                                    <x-icon name="mail" class="h-4 w-4" />
                                    @if (! $notification->read_at)
                                        <span class="absolute -top-1 -right-1 h-2.5 w-2.5 rounded-full bg-red-600 ring-2 ring-surface-elevated"></span>
                                    @endif
                                </span>
                                <div class="min-w-0 flex-1">
                                    <p class="text-sm text-text">
                                        New inquiry from <span class="font-semibold">{{ $notification->data['name'] ?? 'Unknown' }}</span>
                                    </p>
                                    <p class="text-xs text-text-muted truncate">{{ $notification->data['company'] ?? '' }} &middot; {{ $notification->data['product_interest'] ?? '' }}</p>
                                    <p class="mt-1 text-xs text-text-muted">{{ $notification->created_at->diffForHumans() }}</p>
                                </div>
                            </button>
                        </form>
                    @empty
                        <div class="flex flex-col items-center gap-2 px-4 py-10 text-center">
                            <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-surface-muted text-text-muted">
                                <x-icon name="bell" class="h-5 w-5" />
                            </span>
                            <p class="text-sm text-text-muted">No notifications yet.</p>
                        </div>
                    @endforelse
                </div>

                <a href="{{ route('admin.inquiries.index') }}" class="block px-4 py-3 text-center text-xs font-medium text-primary border-t border-border hover:bg-surface-muted hover:text-primary-hover">
                    View all inquiries
                </a>
            </x-slot>
        </x-dropdown>

        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-primary text-sm font-semibold text-white">
                    {{ $initials !== '' ? $initials : 'U' }}
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-dropdown-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>
</header>
