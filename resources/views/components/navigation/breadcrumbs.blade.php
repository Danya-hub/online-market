@props([
    'routes' => [],
])

<ul {{ $attributes->class('flex') }}>
    @foreach($routes as $route)
        <li>
            <a class="text-gray-600 me-2 block" href="{{ $route[0] }}" id="{{ $route[0] }}">{{ $route[1] }}</a>
        </li>
        @if(!$loop->last)
            <span class="me-2">-</span>
        @endif
    @endforeach
</ul>
