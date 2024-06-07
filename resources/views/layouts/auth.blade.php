<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title", $seo_title ?? env("APP_NAME"))</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
<main>
    @include('shared.flash')
    <div class="max-w-96 mx-auto p-4">
        <x-shared.logo
            class="mx-auto mb-8 mt-4"
        ></x-shared.logo>
        @yield("content")
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</main>
</body>
</html>
