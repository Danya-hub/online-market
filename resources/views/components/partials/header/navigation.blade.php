<nav class="mx-3">
    <ul class="flex items-center h-full">
        @foreach($menu as $item)
            <li>
                <a href="{{ $item->link() }}" class="p-2 @if($item->isActive()) font-bold @endif">
                    {{ $item->label() }}
                </a>
            </li>
        @endforeach
    </ul>
</nav>
