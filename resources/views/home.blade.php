<!-- resources/views/home.blade.php -->
@extends('layouts.guest')

@section('title', 'Home')

@section('content')
    <!-- Hero Section with Swiper Carousel -->
    <div class="relative h-[600px]"> <!-- Increased height to 600px -->
        <div class="swiper-container h-full">
            <!-- Swiper Slides Wrapper -->
            <div class="swiper-wrapper">
                <!-- Each Slide -->
                <div class="swiper-slide w-full h-full bg-cover bg-center" style="background-image: url('/images/carousel/carousel1.jpg');"></div>
                <div class="swiper-slide w-full h-full bg-cover bg-center" style="background-image: url('/images/carousel/carousel2.jpg');"></div>
            </div>

            <!-- Navigation Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <!-- "Shop Now" Button -->
        <div class="absolute bottom-10 left-0 right-0 text-center z-10"> <!-- Adjusted button position -->
            <a href="" class="bg-orange-500 text-white px-6 py-3 rounded hover:bg-orange-600">
                Shop Now
            </a>
        </div>
    </div>

    <!-- Teams Section -->
    <div class="max-w-7xl mx-auto py-12 px-8">
        <h2 class="text-3xl font-bold mb-8 text-center">Our Teams</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Team Cards -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img src="/images/teams/valorant.jpg" alt="Valorant Team" class="w-full h-48 object-cover">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-bold mb-2">Valorant Team</h3>
                    <a href="" class="text-orange-500 hover:underline">View Team</a>
                </div>
            </div>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img src="/images/teams/apex_legends.jpg" alt="Apex Legends Team" class="w-full h-48 object-cover">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-bold mb-2">Apex Legends Team</h3>
                    <a href="" class="text-orange-500 hover:underline">View Team</a>
                </div>
            </div>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img src="/images/teams/counter_strike.jpg" alt="Counter-Strike Team" class="w-full h-48 object-cover">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-bold mb-2">Counter-Strike Team</h3>
                    <a href="" class="text-orange-500 hover:underline">View Team</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest News Section -->
    <div class="bg-gray-200 py-12 px-8">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold mb-8 text-center">Latest News</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- News Cards -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="/images/news/news1.jpg" alt="News 1" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">News Title 1</h3>
                        <p class="text-gray-600 mb-4">A brief description of the news article...</p>
                        <a href="" class="text-orange-500 hover:underline">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
