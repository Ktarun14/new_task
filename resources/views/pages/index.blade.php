@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Pages
    </h2>
@endsection

@section('content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 text-green-600">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('pages.create') }}"
               class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
                + Create Page
            </a>

            <div class="bg-white shadow rounded p-4">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="text-left">Title</th>
                             <th class="text-left">Content</th>
                            <th class="text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pages as $page)
                            <tr class="border-t">
                                <td class="py-2">{{ $page->title }}</td>
                                 <td class="py-2">{{ $page->content }}</td>
                                <td>
                                    <a href="{{ route('pages.edit', $page->id) }}"
                                       class="text-blue-500">Edit</a> |
                                    <form action="{{ route('pages.destroy', $page->id) }}" method="POST"
                                          class="inline-block"
                                          onsubmit="return confirm('Delete this page?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-500" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $pages->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
