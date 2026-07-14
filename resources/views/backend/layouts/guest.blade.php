<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" type="image/png" href="{{ asset('assets/backend/icons/favicon.png') }}">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&display=swap" rel="stylesheet">

        @vite(['resources/backend/css/app.css', 'resources/backend/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="theme-bg min-h-screen flex flex-col items-center justify-center pt-6 sm:pt-0">
            <div>
                <a href="{{ route('home') }}">
                    <img src="{{ asset('assets/frontend/images/brand-logo.png') }}" alt="{{ config('app.name') }}" class="logo-on-dark h-20 w-auto">
                </a>
            </div>

            <div class="mt-6 w-full overflow-hidden bg-surface-elevated px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
