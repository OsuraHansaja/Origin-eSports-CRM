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
    <body>
    <header class="py-6">
        <div class="container mx-auto flex justify-between bg-slate-800 text-white rounded-full p-2">
            <div class="logo p-4">
                <a href="/">{{ config('app.name', 'Laravel') }}</a>

            </div>
            <div class="nav flex">
                <a href="{{ route('contact') }}" class="p-4 block">Contact</a>
                <a href="/login" class="p-4 block">Login</a>
                <a href="/register" class="p-4 block bg-blue-600 rounded-full hover:bg-blue-800">Register</a>
            </div>
        </div>
    </header>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    <footer>
        <div class="container text-center">
            &copy copyright
        </div>
    </footer>

        @livewireScripts
    </body>
</html>
