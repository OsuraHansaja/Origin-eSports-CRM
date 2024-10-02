@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Admin Dashboard</h1>
        <a href="{{ route('admin.orders') }}" class="bg-orange-500 hover:bg-orange-600 text-white py-2 px-4 rounded">View Orders</a>
    </div>
@endsection
