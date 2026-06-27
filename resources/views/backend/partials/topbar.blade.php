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

        <button class="inline-flex h-9 w-9 items-center justify-center rounded-full text-text-muted hover:bg-surface-muted hover:text-text" title="Notifications">
            <x-icon name="bell" class="h-5 w-5" />
        </button>

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
