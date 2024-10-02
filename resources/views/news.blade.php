@extends('layouts.guest')

@section('title', 'News')

@section('content')
    <div class="container mx-auto py-12">
        <h2 class="text-center text-4xl font-bold mb-8 text-white">Latest News</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($newsItems as $news)
                <a href="{{ route('news.show', $news->id) }}" class="group block overflow-hidden bg-gray-800 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="relative w-full h-64 overflow-hidden">
                        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="w-full h-full object-cover transition-transform duration-300 transform group-hover:scale-110">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-white">{{ $news->title }}</h3>
                        <p class="text-gray-400">{{ Str::limit($news->content, 100) }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
