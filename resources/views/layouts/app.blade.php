<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title", env("APP_NAME"))</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
@include('shared.header')
@include('shared.flash')
<main>
    <div class="container max-w-5xl mx-auto px-4">
        @yield("content")
    </div>
</main>
@include('shared.footer')
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
