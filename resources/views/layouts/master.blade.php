<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My App')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">

    <nav class="bg-white shadow p-4">
        <a href="{{ route('dashboard') }}" class="mr-4">Dashboard</a>
        <a href="{{ route('pages.index') }}" class="mr-4">Pages</a>
        <a href="{{ route('posts.index') }}" class="mr-4">Blog Posts</a>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="text-red-500">Logout</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </nav>

    <div class="max-w-6xl mx-auto mt-6 px-4">
        @yield('content')
    </div>
</body>
</html>
