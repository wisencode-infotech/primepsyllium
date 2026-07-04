{{-- Mobile backdrop --}}
<div x-show="mobileOpen" x-transition.opacity @click="mobileOpen = false" class="fixed inset-0 z-40 bg-black/30 lg:hidden" style="display: none;"></div>

<aside
    class="fixed inset-y-0 left-0 z-50 flex w-64 flex-col border-r border-border bg-surface-elevated transition-transform duration-200 lg:relative"
    :class="[mobileOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0', collapsed ? 'lg:w-20' : 'lg:w-64']"
>
    @php
        $sidebarLogoUrl = \App\Models\Setting::current()->logo_url ?? asset('assets/frontend/images/brand-logo.png');
    @endphp

    <button
        @click="collapsed = !collapsed"
        class="absolute -right-3 top-6 z-10 hidden h-6 w-6 items-center justify-center rounded-full border border-border bg-surface-elevated text-text-muted shadow-sm hover:text-text lg:flex"
    >
        <x-icon x-show="!collapsed" name="chevron-left" class="h-3.5 w-3.5" />
        <x-icon x-show="collapsed" name="chevron-right" class="h-3.5 w-3.5" style="display: none;" />
    </button>

    <div class="flex h-16 shrink-0 items-center justify-between border-b border-border px-4">
        <a href="{{ route('admin.dashboard') }}" class="flex min-w-0 flex-1 items-center gap-2 overflow-hidden" :class="collapsed ? 'lg:justify-center' : ''">
            <span x-show="collapsed" style="display: none;" class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-primary text-sm font-bold text-white">
                {{ mb_substr(config('app.name'), 0, 1) }}
            </span>
            <img x-show="!collapsed" x-transition.opacity src="{{ $sidebarLogoUrl }}" alt="{{ config('app.name') }}" class="h-10 w-auto max-w-[160px] shrink-0 object-contain">
        </a>

        <button @click="mobileOpen = false" class="rounded-md p-1.5 text-text-muted hover:bg-surface-muted hover:text-text lg:hidden">
            <x-icon name="chevron-left" class="h-4 w-4" />
        </button>
    </div>

    <nav class="flex flex-1 flex-col gap-1 overflow-y-auto p-3">
        @php
            $navItems = [
                ['route' => 'admin.dashboard', 'pattern' => 'admin.dashboard', 'icon' => 'dashboard', 'label' => 'Dashboard'],
                ['route' => 'admin.products.index', 'pattern' => 'admin.products.*', 'icon' => 'box', 'label' => 'Products'],
                ['route' => 'admin.certifications.index', 'pattern' => 'admin.certifications.*', 'icon' => 'badge', 'label' => 'Certifications'],
                ['route' => 'admin.media-center-items.index', 'pattern' => 'admin.media-center-items.*', 'icon' => 'newspaper', 'label' => 'Media Center'],
                ['route' => 'admin.gallery.index', 'pattern' => 'admin.gallery.*', 'icon' => 'image', 'label' => 'Gallery'],
                ['route' => 'admin.blog.index', 'pattern' => 'admin.blog.*', 'icon' => 'document', 'label' => 'Blog'],
                ['route' => 'admin.countries.index', 'pattern' => 'admin.countries.*', 'icon' => 'globe', 'label' => 'Countries'],
                ['route' => 'admin.inquiries.index', 'pattern' => 'admin.inquiries.*', 'icon' => 'mail', 'label' => 'Inquiries'],
                [
                    'label' => 'AI Chatbot',
                    'icon' => 'chat',
                    'patterns' => ['admin.knowledge-documents.*', 'admin.chat-logs.*', 'admin.ai-chatbot-settings.*'],
                    'children' => [
                        ['route' => 'admin.knowledge-documents.index', 'pattern' => 'admin.knowledge-documents.*', 'icon' => 'document', 'label' => 'Knowledge Base'],
                        ['route' => 'admin.chat-logs.index', 'pattern' => 'admin.chat-logs.*', 'icon' => 'chat', 'label' => 'Chat Logs'],
                        ['route' => 'admin.ai-chatbot-settings.edit', 'pattern' => 'admin.ai-chatbot-settings.*', 'icon' => 'settings', 'label' => 'Settings'],
                    ],
                ],
                [
                    'label' => 'Emails',
                    'icon' => 'mail',
                    'patterns' => ['admin.email-branding.*', 'admin.email-templates.*', 'admin.email-recipients.*'],
                    'children' => [
                        ['route' => 'admin.email-branding.edit', 'pattern' => 'admin.email-branding.*', 'icon' => 'image', 'label' => 'Email Branding'],
                        ['route' => 'admin.email-templates.index', 'pattern' => 'admin.email-templates.*', 'icon' => 'document', 'label' => 'Email Templates'],
                        ['route' => 'admin.email-recipients.index', 'pattern' => 'admin.email-recipients.*', 'icon' => 'users', 'label' => 'Email Recipients'],
                    ],
                ],
                ['route' => 'admin.company-video.edit', 'pattern' => 'admin.company-video.*', 'icon' => 'video', 'label' => 'Company Video'],
                ['route' => 'admin.theme.edit', 'pattern' => 'admin.theme.*', 'icon' => 'palette', 'label' => 'Brand Theme'],
                ['route' => 'admin.settings.edit', 'pattern' => 'admin.settings.*', 'icon' => 'settings', 'label' => 'Settings'],
            ];
        @endphp

        @foreach ($navItems as $item)
            @if (isset($item['children']))
                @php $groupActive = request()->routeIs(...$item['patterns']); @endphp
                <div x-data="{ open: @js($groupActive) }">
                    <button
                        type="button"
                        @click="open = !open"
                        title="{{ $item['label'] }}"
                        class="flex w-full items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition {{ $groupActive ? 'text-primary' : 'text-text-muted hover:bg-surface-muted hover:text-text' }}"
                    >
                        <x-icon :name="$item['icon']" class="h-5 w-5 shrink-0" />
                        <span x-show="!collapsed" x-transition.opacity class="flex-1 truncate text-left">{{ $item['label'] }}</span>
                        <x-icon
                            x-show="!collapsed"
                            name="chevron-right"
                            class="h-4 w-4 shrink-0 transition-transform duration-150"
                            ::class="open ? 'rotate-90' : ''"
                            style="display: none;"
                        />
                    </button>

                    <div x-show="!collapsed && open" x-transition style="display: none;" class="ml-5 mt-1 flex flex-col gap-1 border-l-2 border-border pl-4">
                        @foreach ($item['children'] as $child)
                            <a
                                href="{{ route($child['route']) }}"
                                title="{{ $child['label'] }}"
                                class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium transition {{ request()->routeIs($child['pattern']) ? 'bg-primary-soft text-primary' : 'text-text-muted hover:bg-surface-muted hover:text-text' }}"
                            >
                                <x-icon :name="$child['icon']" class="h-4 w-4 shrink-0" />
                                <span class="truncate">{{ $child['label'] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            @else
                <a
                    href="{{ route($item['route']) }}"
                    title="{{ $item['label'] }}"
                    class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition {{ request()->routeIs($item['pattern']) ? 'bg-primary-soft text-primary' : 'text-text-muted hover:bg-surface-muted hover:text-text' }}"
                >
                    <x-icon :name="$item['icon']" class="h-5 w-5 shrink-0" />
                    <span x-show="!collapsed" x-transition.opacity class="truncate">{{ $item['label'] }}</span>
                </a>
            @endif
        @endforeach

        <div class="mt-auto flex flex-col gap-1 border-t border-border pt-3">
            <a
                href="{{ route('profile.edit') }}"
                title="Profile"
                class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition {{ request()->routeIs('profile.edit') ? 'bg-primary-soft text-primary' : 'text-text-muted hover:bg-surface-muted hover:text-text' }}"
            >
                <x-icon name="user" class="h-5 w-5 shrink-0" />
                <span x-show="!collapsed" x-transition.opacity class="truncate">Profile</span>
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" title="Log Out" class="flex w-full items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-text-muted transition hover:bg-surface-muted hover:text-text">
                    <x-icon name="logout" class="h-5 w-5 shrink-0" />
                    <span x-show="!collapsed" x-transition.opacity class="truncate">Log Out</span>
                </button>
            </form>
        </div>
    </nav>
</aside>
