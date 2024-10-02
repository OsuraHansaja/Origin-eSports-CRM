@extends('layouts.guest')

@section('content')
    <div class="container mx-auto py-12">
        <h1 class="text-center text-4xl font-bold mb-12">Meet our sponsors</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Partner 1 -->
            <a href="https://partner1-link.com" target="_blank" class="relative group bg-gray-800 rounded-lg flex items-center justify-center h-48 hover:bg-gray-700 transition duration-300 ease-in-out">
                <img src="{{ asset('images/partner1.jpg') }}" alt="Partner 1" class="object-contain max-h-24 transition-transform duration-300 transform group-hover:scale-110">
            </a>

            <!-- Partner 2 -->
            <a href="https://partner2-link.com" target="_blank" class="relative group bg-gray-800 rounded-lg flex items-center justify-center h-48 hover:bg-gray-700 transition duration-300 ease-in-out">
                <img src="{{ asset('images/partner2.jpg') }}" alt="Partner 2" class="object-contain max-h-24 transition-transform duration-300 transform group-hover:scale-110">
            </a>

            <!-- Partner 3 -->
            <a href="https://partner3-link.com" target="_blank" class="relative group bg-gray-800 rounded-lg flex items-center justify-center h-48 hover:bg-gray-700 transition duration-300 ease-in-out">
                <img src="{{ asset('images/partner3.jpg') }}" alt="Partner 3" class="object-contain max-h-24 transition-transform duration-300 transform group-hover:scale-110">
            </a>

            <!-- Partner 4 -->
            <a href="https://partner4-link.com" target="_blank" class="relative group bg-gray-800 rounded-lg flex items-center justify-center h-48 hover:bg-gray-700 transition duration-300 ease-in-out">
                <img src="{{ asset('images/partner4.jpg') }}" alt="Partner 4" class="object-contain max-h-24 transition-transform duration-300 transform group-hover:scale-110">
            </a>
        </div>
    </div>
@endsection
