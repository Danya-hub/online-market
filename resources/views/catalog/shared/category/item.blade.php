<li class="bg-gray-200 rounded-2xl me-3">
    <a href="{{ localized_route('catalog.page', [
        'category' => $item,
    ]) }}" class="block px-3 py-2">
        {{ $item->title }}
    </a>
</li>
