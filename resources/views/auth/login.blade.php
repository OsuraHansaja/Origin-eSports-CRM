@extends('layouts.guest')

@section('content')
    <div class="max-w-md mx-auto mt-8 bg-gray-800 p-8 rounded-lg shadow-lg">
        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-2 w-full px-4 py-2 bg-gray-900 text-white border border-gray-600 rounded-md focus:border-orange-500 focus:ring-orange-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-2 w-full px-4 py-2 bg-gray-900 text-white border border-gray-600 rounded-md focus:border-orange-500 focus:ring-orange-500" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-300">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="mt-4">
                <a href="{{ route('register') }}" class="text-sm text-orange-500 hover:underline">Don't have an account? Register here</a>
            </div>

            <div class="flex items-center justify-between mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-orange-500 hover:text-orange-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-4 bg-orange-500 hover:bg-orange-600 px-4 py-2 rounded-md">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </div>
@endsection
