<nav x-data="{ open: false }" class="border-b border-border bg-surface-elevated">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between">
            <div class="flex">
                <div class="flex shrink-0 items-center">
                    <a href="{{ route('admin.dashboard') }}">
                        <img src="{{ asset('assets/backend/images/logo.svg') }}" alt="{{ config('app.name') }}" class="block h-9 w-auto">
                    </a>
                </div>
            </div>

            <div class="flex items-center">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="text-sm font-medium text-text-muted hover:text-text">
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
