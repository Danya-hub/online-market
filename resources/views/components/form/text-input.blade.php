@props([
    "type" => "text",
    "value" => "",
    "hasError" => false,
])

<label class="flex items-center">
    <input
        type="{{ $type }}"
        value="{{ $value }}"
        {{ $attributes->class([
            "border-red-600" => $hasError,
            "block border-2 p-2 w-full placeholder:text-gray-700",
        ]) }}
    >
    {{ $slot }}
</label>
