@extends('layouts.admin')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-8">Admin Shop</h1>

        <!-- Add Product Button -->
        <a href="{{ route('admin.shop.create') }}" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded mb-8 inline-block">
            Add Product
        </a>

        <!-- Product List -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach ($products as $product)
                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                    <div class="relative w-full h-64 overflow-hidden">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <h2 class="text-lg font-semibold">{{ $product->name }}</h2>
                        <p class="text-gray-400">{{ $product->description }}</p>
                        <p class="text-xl font-bold mt-2">${{ number_format($product->price, 2) }}</p>

                        <!-- Edit Button -->
                        <a href="{{ route('admin.shop.edit', $product->id) }}" class="block mt-4 bg-orange-500 hover:bg-orange-600 text-white text-center font-semibold py-2 rounded">
                            Edit
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
