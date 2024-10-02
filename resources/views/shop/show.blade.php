@extends('layouts.guest')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row items-center">
            <!-- Product Image -->
            <div class="w-full lg:w-1/2 mb-8 lg:mb-0 flex justify-center">
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="max-w-lg object-contain rounded-lg shadow-lg">
            </div>

            <!-- Product Details -->
            <div class="w-full lg:w-1/2 lg:pl-12">
                <!-- Product Name and Description -->
                <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
                <p class="text-gray-400 mb-6">{{ $product->description }}</p>
                <p class="text-2xl font-bold mb-6">${{ number_format($product->price, 2) }}</p>

                <!-- Add to Cart Form -->
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <!-- Size Selection -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-2">Size</h3>
                        <div class="flex space-x-4">
                            @foreach (['S', 'M', 'L', 'XL', 'XXL'] as $size)
                                <button type="button" class="size-option px-4 py-2 border border-gray-500 text-gray-300 rounded-md focus:outline-none hover:bg-orange-500 hover:text-white" data-size="{{ $size }}">
                                    {{ $size }}
                                </button>
                            @endforeach
                        </div>
                        <input type="hidden" name="size" id="selectedSize" value="M">
                    </div>

                    <!-- Quantity Selection -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-2">Quantity</h3>
                        <div class="flex items-center space-x-2">
                            <button id="decrement" type="button" class="w-10 h-10 leading-10 text-gray-300 bg-gray-700 transition hover:opacity-75 rounded-l-md">
                                &minus;
                            </button>

                            <input
                                type="number"
                                name="quantity"
                                id="quantity"
                                value="1"
                                class="h-10 w-16 bg-gray-800 text-center text-gray-300 border-0 focus:outline-none"
                                min="1"
                            />

                            <button id="increment" type="button" class="w-10 h-10 leading-10 text-gray-300 bg-gray-700 transition hover:opacity-75 rounded-r-md">
                                &plus;
                            </button>
                        </div>
                    </div>

                    <!-- Add to Cart Button -->
                    <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 rounded-lg">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Additional Styles for Size Selection -->
    <style>
        .size-option.active {
            background-color: #FF8C00;
            color: white;
            border-color: #FF8C00;
        }

        /* Fixing the image size */
        img.object-contain {
            max-height: 600px;
        }
    </style>

    <!-- Script to handle size and quantity selection -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle size selection
            const sizeOptions = document.querySelectorAll('.size-option');
            const selectedSizeInput = document.getElementById('selectedSize');

            // Select the "M" size by default
            const defaultSize = 'M';
            sizeOptions.forEach(option => {
                if (option.getAttribute('data-size') === defaultSize) {
                    option.classList.add('active');
                    selectedSizeInput.value = defaultSize;
                }

                option.addEventListener('click', function() {
                    sizeOptions.forEach(opt => opt.classList.remove('active'));
                    this.classList.add('active');
                    selectedSizeInput.value = this.getAttribute('data-size');
                });
            });

            // Handle quantity selection
            const quantityInput = document.getElementById('quantity');
            document.getElementById('decrement').addEventListener('click', function() {
                if (quantityInput.value > 1) quantityInput.value--;
            });
            document.getElementById('increment').addEventListener('click', function() {
                quantityInput.value++;
            });
        });
    </script>
@endsection
