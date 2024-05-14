@props([
    "title" => "",
    "method" => "POST",
    "action" => "",
])

<h1 class="text-center text-4xl font-medium">{{ $title }}</h1>

<form action="{{ $action }}" method="{{ $method }}" class="mt-6">
    @csrf

    {{ $slot }}
</form>
