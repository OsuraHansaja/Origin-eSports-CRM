<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-900 text-white">
<nav class="bg-gray-800 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ route('admin.dashboard') }}" class="text-orange-500 font-bold">Admin Dashboard</a>

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
