@extends('layouts.guest')

@section('content')
    <div class="max-w-md mx-auto mt-8 bg-gray-800 p-6 rounded-lg shadow-md">
        <x-authentication-card-logo class="mx-auto mb-4" />

        <div class="mb-4 text-sm text-gray-300">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div>
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" autofocus />
            </div>

            <div class="flex justify-end mt-4">
                <x-button class="bg-orange-500 hover:bg-orange-600">
                    {{ __('Confirm') }}
                </x-button>
            </div>
        </form>
    </div>
@endsection
