<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <footer class="bg-gray-100 py-6 text-center text-gray-500 text-sm border-t border-gray-200">
            &copy; {{ date('Y') }} Crafted with 😍 by Malbuoro. All rights reserved.
            <div class="mt-2 space-x-4">
            </div>
        </footer>
        <!-- Toast notifications container -->
        <div id="toast-container" class="fixed top-6 left-1/2 -translate-x-1/2 z-[1000]
            flex flex-col gap-3 max-w-md pointer-events-auto">
        </div>


        @stack('modals')

        @livewireScripts
        <!-- Custom Toast Notifications -->
        <script src="{{ asset('assets/js/notifications.js') }}"></script>
    </body>
</html>
