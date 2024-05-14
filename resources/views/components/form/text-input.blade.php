@props([
    "type" => "text",
    "value" => "",
    "hasError" => false,
])

<label>
    <input
        type="{{ $type }}"
        value="{{ $value }}"
        {{ $attributes->class([
            "border-red-600" => $hasError,
            "block border-2 p-2 my-2 w-full",
        ]) }}
    >
</label>
