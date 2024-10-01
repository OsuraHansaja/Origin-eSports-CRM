<!-- resources/views/layouts/guest.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Origin Esports')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-900 text-white font-sans">
<!-- Navbar -->
<nav class="bg-gray-800 p-4">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-2xl font-bold text-white">Origin Esports</a>
        <ul class="flex space-x-6">
            <li><a href="{{ route('home') }}" class="hover:text-orange-500">Home</a></li>
            <li><a href="{{ route('about') }}" class="hover:text-orange-500">About</a></li>
            <li><a href="{{ route('teams') }}" class="hover:text-orange-500">Teams</a></li>
            <li><a href="{{ route('news') }}" class="hover:text-orange-500">News</a></li>
            <li><a href="{{ route('shop') }}" class="hover:text-orange-500">Shop</a></li>
            <li><a href="{{ route('partners') }}" class="hover:text-orange-500">Partners</a></li>
        </ul>
        <div>
            @auth
                <a href="{{ route('dashboard') }}" class="bg-orange-500 px-4 py-2 rounded text-white">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="bg-orange-500 px-4 py-2 rounded text-white">Login</a>
                <a href="{{ route('register') }}" class="bg-orange-500 px-4 py-2 rounded text-white ml-2">Register</a>
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
