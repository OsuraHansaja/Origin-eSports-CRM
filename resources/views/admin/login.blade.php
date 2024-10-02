@extends('layouts.guest')

@section('content')
    <div class="max-w-md mx-auto mt-8 bg-gray-800 p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Admin Login</h2>
        @if (session('error'))
            <div class="text-red-500">{{ session('error') }}</div>
        @endif
        <form action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">Email</label>
                <input type="email" id="email" name="email" class="w-full p-2 rounded bg-gray-700 text-white" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium">Password</label>
                <input type="password" id="password" name="password" class="w-full p-2 rounded bg-gray-700 text-white" required>
            </div>
            <button type="submit" class="bg-orange-500 text-white w-full p-2 rounded">Login</button>
        </form>
    </div>
@endsection
