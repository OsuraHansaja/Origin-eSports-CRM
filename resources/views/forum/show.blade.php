<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Post') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-12">
        <h1 class="text-2xl font-bold mb-4">{{ $forumPost->title }}</h1>
        <p class="mb-4">{{ $forumPost->body }}</p>
        <a href="{{ route('forum.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Back to Posts</a>
    </div>
</x-app-layout>
