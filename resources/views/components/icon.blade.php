@props(['name'])

<svg {{ $attributes->merge(['class' => 'w-5 h-5']) }} viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
    @switch($name)
        @case('dashboard')
            <rect x="3" y="3" width="7" height="7" rx="1.5" />
            <rect x="14" y="3" width="7" height="7" rx="1.5" />
            <rect x="3" y="14" width="7" height="7" rx="1.5" />
            <rect x="14" y="14" width="7" height="7" rx="1.5" />
            @break

        @case('box')
            <path d="M3.27 6.96 12 12.01l8.73-5.05" />
            <path d="M12 22.08V12" />
            <path d="M20.27 7.42 12 2.5 3.73 7.42a1.5 1.5 0 0 0-.73 1.29v6.58a1.5 1.5 0 0 0 .73 1.29L12 21.5l8.27-4.92a1.5 1.5 0 0 0 .73-1.29V8.71a1.5 1.5 0 0 0-.73-1.29Z" />
            @break

        @case('badge')
            <circle cx="12" cy="8" r="5.5" />
            <path d="M8.5 13 7 21l5-3 5 3-1.5-8" />
            @break

        @case('user')
            <circle cx="12" cy="8" r="4" />
            <path d="M4 20c1.5-4 5-6 8-6s6.5 2 8 6" />
            @break

        @case('logout')
            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
            <path d="M16 17l5-5-5-5" />
            <path d="M21 12H9" />
            @break

        @case('search')
            <circle cx="11" cy="11" r="7" />
            <path d="m21 21-4.3-4.3" />
            @break

        @case('bell')
            <path d="M6 8a6 6 0 1 1 12 0c0 4 1.5 5.5 1.5 5.5H4.5S6 12 6 8Z" />
            <path d="M9.5 18a2.5 2.5 0 0 0 5 0" />
            @break

        @case('sun')
            <circle cx="12" cy="12" r="4" />
            <path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41" />
            @break

        @case('moon')
            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79Z" />
            @break

        @case('chevron-left')
            <path d="m15 18-6-6 6-6" />
            @break

        @case('chevron-right')
            <path d="m9 18 6-6-6-6" />
            @break

        @case('menu')
            <path d="M4 6h16M4 12h16M4 18h16" />
            @break

        @case('settings')
            <circle cx="12" cy="12" r="3" />
            <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 1 1-4 0v-.09a1.65 1.65 0 0 0-1-1.51 1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 1 1 0-4h.09a1.65 1.65 0 0 0 1.51-1 1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 1 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 1 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1Z" />
            @break

        @case('upload')
            <path d="M7 18a4.6 4.4 0 0 1-1-9 5 5 0 0 1 9.6-1.6A4 4 0 0 1 18 15.5" />
            <path d="M12 11v9" />
            <path d="m9 14 3-3 3 3" />
            @break

        @case('x')
            <path d="M18 6 6 18M6 6l12 12" />
            @break

        @case('newspaper')
            <path d="M4 4h13a3 3 0 0 1 3 3v12a1 1 0 0 1-1.45.9L17 19" />
            <path d="M4 4v15a1 1 0 0 0 1.45.9L7 19h10V7a3 3 0 0 0-3-3" />
            <path d="M8 8h6M8 12h6M8 16h3" />
            @break

        @case('globe')
            <circle cx="12" cy="12" r="9" />
            <path d="M3 12h18" />
            <path d="M12 3a13 13 0 0 1 0 18a13 13 0 0 1 0-18Z" />
            @break

        @case('palette')
            <path d="M12 2a10 10 0 1 0 0 20c1.1 0 2-.83 2-1.85 0-.48-.2-.92-.51-1.26-.31-.34-.5-.78-.5-1.26 0-1.02.9-1.85 2-1.85h2.36A4.65 4.65 0 0 0 22 11.15C22 6.1 17.5 2 12 2Z" />
            <circle cx="7.5" cy="11.5" r="1.3" />
            <circle cx="9.5" cy="7.5" r="1.3" />
            <circle cx="14.5" cy="7.5" r="1.3" />
            <circle cx="16.5" cy="11.5" r="1.3" />
            @break

        @case('mail')
            <rect x="3" y="5" width="18" height="14" rx="2" />
            <path d="m3 7 9 6 9-6" />
            @break

        @case('users')
            <circle cx="9" cy="8" r="3.2" />
            <path d="M2.5 19c0-3.3 2.9-5.5 6.5-5.5s6.5 2.2 6.5 5.5" />
            <circle cx="17" cy="9" r="2.4" />
            <path d="M15.8 13.7c2.5.4 4.7 2.2 4.7 5.3" />
            @break

        @case('document')
            <path d="M14 2.5H7a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8.5L14 2.5Z" />
            <path d="M14 2.5V8.5h6" />
            <path d="M9 12.5h6M9 16h6" />
            @break
    @endswitch
</svg>
