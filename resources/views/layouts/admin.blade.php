<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Wiggle animation */
        @keyframes wiggle {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(-5deg); }
            50% { transform: rotate(5deg); }
            75% { transform: rotate(-5deg); }
        }
        .wiggle {
            display: inline-block;
            transition: transform 0.3s;
        }
        .wiggle:hover {
            animation: wiggle 0.5s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-900 text-white">
<nav class="bg-gray-800 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div class="flex items-center">
            <a href="{{ route('admin.dashboard') }}"
               class="text-orange-500 font-bold text-2xl wiggle"
               x-data="{ hover: false }"
               @mouseover="hover = true"
               @mouseleave="hover = false">
                Admin Dashboard
            </a>
            <a href="{{ route('admin.shop') }}" class="text-white font-bold ml-4 text-lg hover:text-orange-500">Shop</a>
            <a href="{{ route('admin.orders') }}" class="text-white font-bold ml-4 text-lg hover:text-orange-500">Orders</a>
            <a href="{{ route('admin.news.index') }}" class="text-white font-bold ml-4 text-lg hover:text-orange-500">News</a>
            <a href="{{ route('admin.newsletters.index') }}" class="text-white font-bold ml-4 text-lg hover:text-orange-500">Newsletter</a>
        </div>

        <!-- Logout Button -->
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded">
                Logout
            </button>
        </form>
    </div>
</nav>

<main class="container mx-auto py-8">
    @yield('content')
</main>
</body>
</html>
