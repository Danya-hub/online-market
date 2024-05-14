@props([
    "text" => "",
    "type" => "submit"
])

<input
    type="{{ $type }}"
    value="{{ $text }}"
    {{ $attributes->class("block cursor-pointer border-2 border-black py-2 px-3 uppercase mt-3 font-medium") }}
>
