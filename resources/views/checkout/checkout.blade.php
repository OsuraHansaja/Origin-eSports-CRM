@extends('layouts.guest')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Checkout</h1>

        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">Email Address</label>
                <input type="email" id="email" name="email" required class="w-full bg-gray-800 text-white border border-gray-600 p-2 mt-1 rounded focus:outline-none focus:border-orange-500"
                       value="{{ auth()->check() ? auth()->user()->email : '' }}" {{ auth()->check() ? 'readonly' : '' }}>
            </div>

            <!-- Shipping Address -->
            <div class="mb-4">
                <label for="address" class="block text-sm font-medium">Shipping Address</label>
                <input type="text" id="address" name="address" required class="w-full bg-gray-800 text-white border border-gray-600 p-2 mt-1 rounded focus:outline-none focus:border-orange-500">
            </div>

            <!-- Payment Method (simulated) -->
            <div class="mb-4">
                <label for="payment" class="block text-sm font-medium">Payment Method</label>
                <select id="payment" name="payment" class="w-full bg-gray-800 text-white border border-gray-600 p-2 mt-1 rounded focus:outline-none focus:border-orange-500">
                    <option value="credit_card">Credit Card</option>
                    <option value="paypal">PayPal</option>
                </select>
            </div>

            <!-- Order Summary -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-4">Order Summary</h2>
                <ul class="mb-4">
                    @foreach ($cartItems as $item)
                        <li>{{ $item->product->name }} ({{ $item->size }}) x {{ $item->quantity }} - ${{ number_format($item->product->price * $item->quantity, 2) }}</li>
                    @endforeach
                </ul>
                <p class="text-lg font-bold">Total: ${{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->quantity), 2) }}</p>
            </div>

            <!-- Place Order Button -->
            <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 rounded-lg">Place Order</button>
        </form>
    </div>
@endsection
