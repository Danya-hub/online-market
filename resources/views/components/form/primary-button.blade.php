@props([
    "text" => "",
    "type" => "submit"
])

<input
    type="{{ $type }}"
    value="{{ $text }}"
    {{ $attributes->class("block cursor-pointer uppercase font-medium") }}
>
