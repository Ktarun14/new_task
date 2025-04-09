@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Blog Posts</h2>
@endsection

@section('content')
    <div class="bg-white p-6 shadow rounded">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">All Blog Posts</h1>
            <a href="{{ route('posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Create Post
            </a>
        </div>

        @if ($posts->isEmpty())
            <p class="text-gray-500">No blog posts available.</p>
        @else
            <ul class="space-y-4">
                @foreach ($posts as $post)
                    <li class="p-4 border rounded shadow-sm">
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="text-lg font-semibold">{{ $post->title }}</h3>
                                <p class="text-md">{{ $post->content }}</p>
                                <small class="text-gray-500">{{ $post->created_at->format('d M Y') }}</small>
                            </div>
                            <div class="flex items-center space-x-4">
                                <a href="{{ route('posts.edit', $post) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
