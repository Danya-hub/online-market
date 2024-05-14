<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title", env("APP_NAME"))</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
@if(session()->has("message"))
    {{ session("message") }}
@endif
<div class="max-w-96 mx-auto p-4">
    <a href="{{ route("home") }}" class="block w-16 m-4 mx-auto">
        <img src="{{ Vite::image('logo.png') }}" alt="logo">
    </a>
    @yield("content")
</div>
</body>
</html>
