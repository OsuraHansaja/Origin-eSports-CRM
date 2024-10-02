@extends('layouts.admin')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-8">Edit News</h1>

        <!-- Form for Editing News -->
        <form action="{{ route('admin.news.update', $newsItem->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-white">Title</label>
                <input type="text" name="title" id="title" value="{{ $newsItem->title }}" class="w-full p-2 rounded bg-gray-800 text-white" required>
            </div>
            <div class="mb-4">
                <label for="content" class="block text-white">Content</label>
                <textarea name="content" id="content" rows="5" class="w-full p-2 rounded bg-gray-800 text-white" required>{{ $newsItem->content }}</textarea>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-white">Upload Image</label>
                <input type="file" name="image" id="image" class="w-full p-2 rounded bg-gray-800 text-white">
                @if ($newsItem->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $newsItem->image) }}" alt="Current Image" class="w-48 h-auto">
                    </div>
                @endif
            </div>
            <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white py-2 px-4 rounded">Update</button>
        </form>
    </div>
@endsection
