@extends('layouts.guest')

@section('content')
    <div class="container mx-auto py-12">
        <h1 class="text-center text-4xl font-bold mb-16">Meet Our Teams</h1>

        <!-- Valorant Team Section -->
        <div class="mb-16">
            <h2 class="text-center text-3xl font-bold mb-8">Valorant Team</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach(range(1, 5) as $num)
                    <div class="relative group" x-data="{ hover: false }">
                        <a href="https://social-media-link.com" target="_blank" class="block overflow-hidden bg-gray-800 rounded-lg">
                            <img src="{{ asset('images/valorant_player' . $num . '.jpg') }}" alt="Valorant Player {{ $num }}" class="object-cover h-80 w-full transition-transform duration-300 transform group-hover:scale-110">
                            <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                                <span class="text-white text-lg">val_player{{ $num }}</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Apex Team Section -->
        <div class="mb-16">
            <h2 class="text-center text-3xl font-bold mb-8">Apex Legends Team</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach(range(1, 3) as $num)
                    <div class="relative group" x-data="{ hover: false }">
                        <a href="https://social-media-link.com" target="_blank" class="block overflow-hidden bg-gray-800 rounded-lg">
                            <img src="{{ asset('images/apex_player' . $num . '.jpg') }}" alt="Apex Player {{ $num }}" class="object-cover h-80 w-full transition-transform duration-300 transform group-hover:scale-110">
                            <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                                <span class="text-white text-lg">apex_player{{ $num }}</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- CS Team Section -->
        <div class="mb-16">
            <h2 class="text-center text-3xl font-bold mb-8">CS:GO Team</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach(range(1, 5) as $num)
                    <div class="relative group" x-data="{ hover: false }">
                        <a href="https://social-media-link.com" target="_blank" class="block overflow-hidden bg-gray-800 rounded-lg">
                            <img src="{{ asset('images/cs_player' . $num . '.jpg') }}" alt="CS Player {{ $num }}" class="object-cover h-80 w-full transition-transform duration-300 transform group-hover:scale-110">
                            <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                                <span class="text-white text-lg">cs_player{{ $num }}</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
