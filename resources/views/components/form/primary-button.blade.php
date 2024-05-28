@props([
    "text" => "",
    "type" => "submit"
])

<input
    type="{{ $type }}"
    value="{{ $text }}"
    {{ $attributes->class("block cursor-pointer border-2 border-black uppercase font-medium") }}
>
