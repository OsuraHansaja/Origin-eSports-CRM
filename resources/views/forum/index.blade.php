@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-12">
        <h1 class="text-2xl font-bold mb-4">My Forum Posts</h1>
        <a href="{{ route('forum.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Create New Post</a>
        <div class="space-y-4">
            @foreach ($posts as $post)
                <div class="p-4 border rounded-md">
                    <h2 class="text-xl font-bold">{{ $post->title }}</h2>
                    <p>{{ $post->body }}</p>
                    <a href="{{ route('forum.edit', $post->id) }}" class="text-blue-500">Edit</a>
                    <form action="{{ route('forum.destroy', $post->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
