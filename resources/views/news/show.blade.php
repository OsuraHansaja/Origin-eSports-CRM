@extends('layouts.guest')

@section('title', $newsItem->title)

@section('content')
    <div class="container mx-auto py-12">
        <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            <div class="relative w-full h-64 overflow-hidden">
                <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" class="w-full h-full object-cover">
            </div>
            <div class="p-8">
                <h1 class="text-4xl font-bold text-white mb-4">{{ $newsItem->title }}</h1>
                <p class="text-gray-400 mb-8">{{ $newsItem->content }}</p>
                <a href="{{ route('news') }}" class="text-orange-500 hover:underline">Back to News</a>
            </div>
        </div>
    </div>
@endsection
