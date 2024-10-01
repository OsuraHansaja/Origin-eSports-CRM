@extends('layouts.guest')

@section('content')
    <div class="container mx-auto py-12">
        <h1 class="text-center text-4xl font-bold mb-8 text-white">Shop</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach ($products as $product)
                <a href="{{ route('shop.show', $product->id) }}" class="group block overflow-hidden bg-gray-800 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="relative w-full h-64 overflow-hidden">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-300 transform group-hover:scale-110">
                    </div>
                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-white">{{ $product->name }}</h2>
                        <p class="text-gray-400">{{ $product->description }}</p>
                        <p class="text-xl font-bold mt-2 text-white">${{ number_format($product->price, 2) }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
