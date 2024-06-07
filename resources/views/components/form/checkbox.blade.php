@props([
    "name" => "",
    "value" => "",
])

<label {{ $attributes }}>
    <input type="checkbox" name="{{ $name }}" value="{{ $value }}">
    <span>{{ $slot }}</span>
</label>
