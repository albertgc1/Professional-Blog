<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Laravel | blog')</title>

        <meta name="description" content="@yield('description', 'Blog')">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>

    </head>
    <body class="min-h-screen bg-gray-200 antialiased">

        <nav class="w-full h-16 flex flex-column justify-center bg-white shadow mb-8">
            <div class="container m-auto flex justify-between">
                <span class="tracking-widest font-semibold">BLOG</span>
                <div class="flex">
                    <a href="/" class="ml-6 text-green-400">Home</a>
                    <a href="#" class="ml-6 text-green-600">About</a>
                    <a href="#" class="ml-6 text-green-600">Services</a>
                    <a href="#" class="ml-6 text-green-600">Contact</a>
                </div>
            </div>
        </nav>

        @yield('content')
    </body>
</html>
