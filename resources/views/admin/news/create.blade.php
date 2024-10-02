@extends('layouts.admin')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-8">Add News</h1>

        <!-- Form for Adding News -->
        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-white">Title</label>
                <input type="text" name="title" id="title" class="w-full p-2 rounded bg-gray-800 text-white" required>
            </div>
            <div class="mb-4">
                <label for="content" class="block text-white">Content</label>
                <textarea name="content" id="content" rows="5" class="w-full p-2 rounded bg-gray-800 text-white" required></textarea>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-white">Upload Image</label>
                <input type="file" name="image" id="image" class="w-full p-2 rounded bg-gray-800 text-white">
            </div>
            <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white py-2 px-4 rounded">Save</button>
        </form>
    </div>
@endsection
