@extends('layouts.guest')

@section('content')
    <div class="max-w-md mx-auto mt-8 bg-gray-800 p-6 rounded-lg shadow-md">
        <x-authentication-card-logo class="mx-auto mb-4" />

        <div class="mb-4 text-sm text-gray-300">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="bg-orange-500 hover:bg-orange-600">
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </div>
@endsection
