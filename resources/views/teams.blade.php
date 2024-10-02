@extends('layouts.guest')

@section('content')
    <div class="container mx-auto py-12">
        <h1 class="text-center text-4xl font-bold mb-16">Meet Our Teams</h1>

        <!-- Valorant Team Section -->
        <div class="mb-16">
            <h2 class="text-center text-3xl font-bold mb-8">Valorant Team</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @php
                    $valorantPlayers = ['Tenz', 'Zelsis', 'JohnQT', 'Sacy', 'Zekken'];
                @endphp
                @foreach($valorantPlayers as $index => $playerName)
                    <div class="relative group" x-data="{ hover: false }">
                        <a href="https://social-media-link.com" target="_blank" class="block overflow-hidden bg-gray-800 rounded-lg">
                            <img src="{{ asset('images/valorant_player' . ($index + 1) . '.jpg') }}" alt="Valorant Player {{ $playerName }}" class="object-cover h-80 w-full transition-transform duration-300 transform group-hover:scale-110">
                            <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                                <span class="text-white text-lg">{{ $playerName }}</span>
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
                @php
                    $apexPlayers = ['Marved', 'Oxy', 'Tarik'];
                @endphp
                @foreach($apexPlayers as $index => $playerName)
                    <div class="relative group" x-data="{ hover: false }">
                        <a href="https://social-media-link.com" target="_blank" class="block overflow-hidden bg-gray-800 rounded-lg">
                            <img src="{{ asset('images/apex_player' . ($index + 1) . '.jpg') }}" alt="Apex Player {{ $playerName }}" class="object-cover h-80 w-full transition-transform duration-300 transform group-hover:scale-110">
                            <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                                <span class="text-white text-lg">{{ $playerName }}</span>
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
                @php
                    $csPlayers = ['s0m', 'demon1', 'ethen', 'crashies', 'fns'];
                @endphp
                @foreach($csPlayers as $index => $playerName)
                    <div class="relative group" x-data="{ hover: false }">
                        <a href="https://social-media-link.com" target="_blank" class="block overflow-hidden bg-gray-800 rounded-lg">
                            <img src="{{ asset('images/cs_player' . ($index + 1) . '.jpg') }}" alt="CS Player {{ $playerName }}" class="object-cover h-80 w-full transition-transform duration-300 transform group-hover:scale-110">
                            <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                                <span class="text-white text-lg">{{ $playerName }}</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
