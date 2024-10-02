@extends('layouts.guest')

@section('content')
    <div class="container mx-auto py-12">
        <!-- Heading -->
        <h1 class="text-center text-4xl font-bold mb-8">ABOUT</h1>

        <!-- About Text -->
        <div class="text-white text-lg leading-relaxed space-y-6 mb-12">
            <p>Origin Esports is a professional gaming and entertainment company headquartered in Los Angeles, CA. Known worldwide, Origin embodies competitive esports excellence and the best of gaming culture for the last decade. With its championship teams and innovative gaming lifestyle content, Origin amasses over millions of content views a year.</p>

            <p>Origin boasts a VCT partnered VALORANT squad, a franchised Apex Legends team, and a World Championship Counter-Strike roster.</p>

            <p>Origin's content channels span YouTube, TikTok, Instagram, Twitter and Facebook and multiple Snap Discover shows. Origin's social gaming brand, Full Squad Gaming, has become an instant powerhouse amassing millions of followers on TikTok and YouTube and banging out over hundreds of thousands of views a day across their content channels.</p>

            <p>Origin is headquartered at the iconic Origin Spectrum Palace in Downtown Los Angeles. This innovative studio / play space is a Fantasy Factory for gamers featuring giant creative installations, studio space, scrim / stream areas, the Kia Watch Party Theater and general craziness.</p>
        </div>

        <!-- Images Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Placeholder for Image 1 -->
            <div class="bg-gray-800 rounded-lg overflow-hidden">
                <img src="{{ asset('images/about_image1.jpg') }}" alt="About Image 1" class="w-full h-auto object-cover">
            </div>

            <!-- Placeholder for Image 2 -->
            <div class="bg-gray-800 rounded-lg overflow-hidden">
                <img src="{{ asset('images/about_image2.jpg') }}" alt="About Image 2" class="w-full h-auto object-cover">
            </div>
        </div>
    </div>
@endsection
