<!-- resources/views/checkout/thankyou.blade.php -->
@extends('layouts.guest')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Thank You!</h1>
        <p>Your order has been placed successfully. We will process it soon.</p>
        <a href="{{ route('home') }}" class="mt-8 inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded-lg">Back to Home</a>
    </div>
@endsection
