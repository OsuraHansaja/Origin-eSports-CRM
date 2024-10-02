@extends('layouts.admin')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-8">Add Product</h1>

        <form action="{{ route('admin.shop.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Product Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">Product Name</label>
                <input type="text" id="name" name="name" required class="w-full bg-gray-800 text-white border border-gray-600 p-2 mt-1 rounded focus:outline-none focus:border-orange-500">
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium">Description</label>
                <textarea id="description" name="description" required class="w-full bg-gray-800 text-white border border-gray-600 p-2 mt-1 rounded focus:outline-none focus:border-orange-500"></textarea>
            </div>

            <!-- Price -->
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium">Price</label>
                <input type="number" id="price" name="price" step="0.01" required class="w-full bg-gray-800 text-white border border-gray-600 p-2 mt-1 rounded focus:outline-none focus:border-orange-500">
            </div>

            <!-- Image Upload -->
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium">Product Image</label>
                <input type="file" id="image" name="image" accept="image/*" required class="w-full bg-gray-800 text-white border border-gray-600 p-2 mt-1 rounded focus:outline-none focus:border-orange-500">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 rounded-lg">Add Product</button>
        </form>
    </div>
@endsection
