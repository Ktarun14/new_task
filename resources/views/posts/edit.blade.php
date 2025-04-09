@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Blog Post</h2>
@endsection

@section('content')
    <div class="bg-white p-6 shadow rounded">
        <h1 class="text-2xl font-bold mb-4">Edit Blog Post</h1>

        <form method="POST" action="{{ route('posts.update', $post) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700">Title</label>
                <input type="text" name="title" value="{{ old('title', $post->title) }}"
                    class="w-full p-2 mt-1 border rounded">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700">Content</label>
                <textarea name="content" rows="6" class="w-full p-2 mt-1 border rounded">{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Update
            </button>
        </form>
    </div>
@endsection
