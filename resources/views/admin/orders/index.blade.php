@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Order Management</h1>

        <table class="w-full bg-gray-800 text-white">
            <thead>
            <tr>
                <th class="p-2">Order ID</th>
                <th class="p-2">Email</th>
                <th class="p-2">Address</th>
                <th class="p-2">Total Amount</th>
                <th class="p-2">Date</th>
                <th class="p-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)
                <tr class="border-t border-gray-700">
                    <td class="p-2">{{ $order->id }}</td>
                    <td class="p-2">{{ $order->email }}</td>
                    <td class="p-2">{{ $order->address }}</td>
                    <td class="p-2">${{ number_format($order->total_amount, 2) }}</td>
                    <td class="p-2">{{ $order->created_at->format('Y-m-d') }}</td>
                    <td class="p-2">
                        <a href="{{ route('admin.orders.details', $order->id) }}" class="bg-orange-500 hover:bg-orange-600 text-white py-1 px-2 rounded">View Details</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
