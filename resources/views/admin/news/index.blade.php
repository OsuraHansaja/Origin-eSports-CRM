@extends('layouts.admin')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-4xl font-bold mb-8 text-center">News Management</h1>

        <!-- Add News Button -->
        <div class="flex justify-center mb-6">
            <a href="{{ route('admin.news.create') }}" class="bg-orange-500 hover:bg-orange-600 text-white py-2 px-6 rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105">Add News</a>
        </div>

        <!-- News Table -->
        <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-700">
                <thead>
                <tr class="bg-gray-900">
                    <th class="p-4 text-left text-sm font-semibold text-gray-300">Title</th>
                    <th class="p-4 text-left text-sm font-semibold text-gray-300">Date</th>
                    <th class="p-4 text-center text-sm font-semibold text-gray-300">Actions</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                @foreach ($newsItems as $news)
                    <tr class="hover:bg-gray-700 transition duration-200 ease-in-out">
                        <td class="p-4 text-white">{{ $news->title }}</td>
                        <td class="p-4 text-white">{{ $news->created_at->format('Y-m-d') }}</td>
                        <td class="p-4 flex justify-center space-x-4">
                            <a href="{{ route('admin.news.edit', $news->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg shadow transition duration-300 ease-in-out transform hover:scale-105">Edit</a>
                            <form action="{{ route('admin.news.destroy', $news->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg shadow transition duration-300 ease-in-out transform hover:scale-105" onclick="return confirm('Are you sure you want to delete this news?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
