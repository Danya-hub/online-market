@props([
    "value" => "",
    "name" => "",
])

<div {{$attributes->class('flex me-2')}}>
    <button type="button" class="bg-gray-300 px-3 py-2 rounded ">-</button>
    <input
        type="number"
        value="{{ $value }}"
        name="{{ $name }}"
        class="bg-gray-300 px-3 py-2 rounded w-16 mx-1 text-center"
    >
    <button type="button" class="bg-gray-300 px-3 py-2 rounded ">+</button>
</div>
