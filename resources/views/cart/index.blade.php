@extends('layouts.guest')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Your Cart</h1>

        @if ($cartItems->isEmpty())
            <p>Your cart is empty.</p>
        @else
            <ul class="space-y-4">
                @foreach ($cartItems as $item)
                    <li class="flex items-center gap-4">
                        <!-- Product Image -->
                        <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}" class="w-16 h-16 rounded object-cover">

                        <!-- Product Details -->
                        <div>
                            <h3 class="text-sm text-gray-300">{{ $item->product->name }}</h3>
                            <dl class="mt-0.5 space-y-px text-[10px] text-gray-400">
                                <div>
                                    <dt class="inline">Size:</dt>
                                    <dd class="inline">{{ $item->size }}</dd>
                                </div>
                                <div>
                                    <dt class="inline">Price:</dt>
                                    <dd class="inline">${{ number_format($item->product->price, 2) }}</dd>
                                </div>
                            </dl>
                        </div>

                        <!-- Quantity Input and Remove Button -->
                        <div class="flex flex-1 items-center justify-end gap-2">
                            <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                @csrf
                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1"
                                       class="h-8 w-12 rounded border-gray-300 bg-gray-800 text-center text-xs text-white [-moz-appearance:_textfield] focus:outline-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none">
                                <button type="submit" class="text-blue-500 ml-2">Update</button>
                            </form>

                            <!-- Remove Button with Trash Icon -->
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-gray-400 transition hover:text-red-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>

            <!-- Total Price -->
            <div class="mt-8 flex justify-end border-t border-gray-700 pt-8">
                <div class="w-full max-w-lg text-right">
                    <h2 class="text-2xl font-bold">
                        Total: ${{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->quantity), 2) }}
                    </h2>

                    <!-- Checkout Button -->
                    <button class="mt-4 w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 rounded-lg">
                        Proceed to Checkout
                    </button>
                </div>
            </div>
        @endif
    </div>
@endsection
