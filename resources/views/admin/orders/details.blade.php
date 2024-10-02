@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Order Details</h1>

        <div class="mb-4">
            <strong>Email:</strong> {{ $order->email }}
        </div>
        <div class="mb-4">
            <strong>Country:</strong> {{ $order->country }}
        </div>
        <div class="mb-4">
            <strong>Address:</strong> {{ $order->address }}
        </div>
        <div class="mb-4">
            <strong>Payment Method:</strong> {{ $order->payment_method }}
        </div>
        <div class="mb-4">
            <strong>Total Amount:</strong> ${{ number_format($order->total_amount, 2) }}
        </div>

        <h2 class="text-2xl font-semibold mb-4">Items:</h2>
        <ul>
            @foreach ($orderItems as $item)
                <li>{{ $item['product']['name'] }} ({{ $item['size'] }}) x {{ $item['quantity'] }} - ${{ number_format($item['product']['price'] * $item['quantity'], 2) }}</li>
            @endforeach
        </ul>
    </div>
@endsection
