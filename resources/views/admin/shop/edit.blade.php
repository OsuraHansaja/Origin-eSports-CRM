@extends('layouts.admin')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-8">Edit Product</h1>

        <!-- Update Product Form -->
        <form action="{{ route('admin.shop.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Product Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">Product Name</label>
                <input type="text" id="name" name="name" value="{{ $product->name }}" required class="w-full bg-gray-800 text-white border border-gray-600 p-2 mt-1 rounded focus:outline-none focus:border-orange-500">
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium">Description</label>
                <textarea id="description" name="description" required class="w-full bg-gray-800 text-white border border-gray-600 p-2 mt-1 rounded focus:outline-none focus:border-orange-500">{{ $product->description }}</textarea>
            </div>

            <!-- Price -->
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium">Price</label>
                <input type="number" id="price" name="price" step="0.01" value="{{ $product->price }}" required class="w-full bg-gray-800 text-white border border-gray-600 p-2 mt-1 rounded focus:outline-none focus:border-orange-500">
            </div>

            <!-- Image Upload -->
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium">Product Image</label>
                <input type="file" id="image" name="image" accept="image/*" class="w-full bg-gray-800 text-white border border-gray-600 p-2 mt-1 rounded focus:outline-none focus:border-orange-500">
                <p class="text-sm text-gray-400 mt-2">Current Image: <img src="{{ $product->image }}" alt="Product Image" class="w-32 h-32 object-cover mt-2"></p>
            </div>

            <!-- Update Product Button -->
            <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 rounded-lg">
                Update Product
            </button>
        </form>

        <!-- Delete Form -->
        <form action="{{ route('admin.shop.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');" class="mt-4">
            @csrf
            @method('DELETE')
            <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-3 rounded-lg">
                Delete Product
            </button>
        </form>
    </div>
@endsection
