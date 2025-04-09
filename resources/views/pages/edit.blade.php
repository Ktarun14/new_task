@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Page</h2>
@endsection

@section('content')
    <div class="bg-white p-6 shadow rounded">
        <form method="POST" action="{{ route('pages.update', $page) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700">Title</label>
                <input type="text" name="title" value="{{ old('title', $page->title) }}"
                       class="w-full p-2 border rounded mt-1">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700">Content</label>
                <textarea name="content" rows="6"
                          class="w-full p-2 border rounded mt-1">{{ old('content', $page->content) }}</textarea>
                @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                Update
            </button>
        </form>
    </div>
@endsection
