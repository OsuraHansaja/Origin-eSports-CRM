@extends('layouts.guest')

@section('title', 'Home')

@section('content')
    <!-- Hero Section with Swiper Carousel -->
    <div class="relative h-[600px]">
        <div class="swiper-container h-full">
            <!-- Swiper Slides Wrapper -->
            <div class="swiper-wrapper">
                <div class="swiper-slide w-full h-full bg-cover bg-center" style="background-image: url('/images/carousel/carousel1.jpg');"></div>
                <div class="swiper-slide w-full h-full bg-cover bg-center" style="background-image: url('/images/carousel/carousel2.jpg');"></div>
            </div>

            <!-- Navigation Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <!-- "Shop Now" Button -->
        <div class="absolute bottom-10 left-0 right-0 text-center z-10">
            <a href="{{ route('shop.index') }}" class="bg-orange-500 text-white px-6 py-3 rounded hover:bg-orange-600">
                Shop Now
            </a>
        </div>
    </div>

    <!-- Teams Section -->
    <div class="max-w-7xl mx-auto py-12 px-8">
        <h2 class="text-3xl font-bold mb-8 text-center">Our Teams</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Team Cards with Hover Effect -->
            <a href="{{ route('teams') }}" class="relative group overflow-hidden rounded-lg" x-data="{ hover: false }">
                <img src="/images/teams/valorant.jpg" alt="Valorant Team" class="w-full h-64 object-cover transition-transform duration-300 transform group-hover:scale-110">
                <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-50 transition-opacity duration-300"></div>
            </a>

            <a href="{{ route('teams') }}" class="relative group overflow-hidden rounded-lg" x-data="{ hover: false }">
                <img src="/images/teams/apex_legends.jpg" alt="Apex Legends Team" class="w-full h-64 object-cover transition-transform duration-300 transform group-hover:scale-110">
                <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-50 transition-opacity duration-300"></div>
            </a>

            <a href="{{ route('teams') }}" class="relative group overflow-hidden rounded-lg" x-data="{ hover: false }">
                <img src="/images/teams/counter_strike.jpg" alt="Counter-Strike Team" class="w-full h-64 object-cover transition-transform duration-300 transform group-hover:scale-110">
                <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-50 transition-opacity duration-300"></div>
            </a>
        </div>
    </div>

    <!-- Latest News Section -->
    <div class="container mx-auto py-12">
        <h2 class="text-center text-4xl font-bold mb-8 text-white">Latest News</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($latestNews as $news)
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
        <!-- Newsletter Signup Section -->
        <div class="newsletter-signup bg-gray-800 p-8 rounded-lg mt-8">
            <h2 class="text-3xl font-bold text-center text-white mb-4">Sign Up for Our Newsletter</h2>
            <form action="{{ route('newsletter.store') }}" method="POST" class="flex flex-col items-center">
                @csrf
                <input type="email" name="email" placeholder="Enter your email" required class="w-full p-4 rounded bg-gray-700 text-white focus:outline-none focus:border-orange-500">
                <button type="submit" class="mt-4 bg-orange-500 text-white px-6 py-3 rounded hover:bg-orange-600">Sign Up</button>
            </form>
            @if(session('success'))
                <p class="text-center text-green-500 mt-4">{{ session('success') }}</p>
            @endif
        </div>
    </div>

@endsection
