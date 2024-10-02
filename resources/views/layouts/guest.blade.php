<!-- resources/views/layouts/guest.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Origin Esports')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white">
<!-- Navbar -->
<nav class="bg-gray-800 p-4">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-2xl font-bold text-white">Origin Esports</a>
        <ul class="flex space-x-6">
            <li><a href="{{ route('home') }}" class="hover:text-orange-500">Home</a></li>
            <li><a href="{{ route('about') }}" class="hover:text-orange-500">About</a></li>
            <li><a href="{{ route('teams') }}" class="hover:text-orange-500">Teams</a></li>
            <li><a href="{{ route('news') }}" class="hover:text-orange-500">News</a></li>
            <li><a href="{{ route('shop.index') }}" class="hover:text-orange-500">Shop</a></li>
            <li><a href="{{ route('partners') }}" class="hover:text-orange-500">Partners</a></li>
        </ul>
        <div class="flex items-center space-x-4">
            <!-- Cart Button -->
            <a href="{{ route('cart.index') }}" class="text-white hover:text-orange-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2m0 0L7.84 15h8.32l2.44-10H5.4zM7.84 15l-.4 2m.4-2h8.32m0 0l.4 2m-9.12-2l1.28-6m1.28 6h4.08m-5.36 0l-.4 2m0-2l1.28-6m1.28 6h4.08m0 0l1.28-6M5.4 5h13.2m0 0l.4 2M5.4 5l-.4-2" />
                </svg>
            </a>

            <!-- User Dropdown Menu -->
            @auth
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="bg-orange-500 px-4 py-2 rounded text-white ml-2">
                        {{ Auth::user()->name }}
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open" @click.away="open = false" x-cloak class="absolute right-0 mt-2 w-48 bg-gray-800 rounded-lg shadow-lg z-50">
                        <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-white hover:bg-gray-700">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-white hover:bg-gray-700">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>

            @else
                <a href="{{ route('login') }}" class="bg-orange-500 px-4 py-2 rounded text-white ml-2">Login</a>
            @endauth
        </div>
    </div>
</nav>

<!-- Content -->
<main class="py-8">
    @yield('content')
</main>

<!-- Footer -->
<footer class="bg-gray-800 text-white p-4 mt-8">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <p>&copy; 2024 Origin Esports</p>
        <div class="space-x-4">
            <a href="#" class="hover:text-orange-500">Facebook</a>
            <a href="#" class="hover:text-orange-500">Twitter</a>
            <a href="#" class="hover:text-orange-500">Instagram</a>
        </div>
    </div>
</footer>
</body>
</html>
