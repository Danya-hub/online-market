@props([
    "name" => "",
    "value" => "",
    "checked" => null,
])

<label {{ $attributes }}>
    <input type="radio" name="{{ $name }}" value="{{ $value }}" @checked($checked)>
    <span>{{ $slot }}</span>
</label>
