<li>
    <a
        class="block bg-gray-300 px-3 py-2 me-2 mb-2 rounded-2xl font-medium"
        href="{{ route("catalog.page", [
            "category" => $item,
            'locale' => session()->get('locale'),
        ]) }}"
    >{{ $item->title }}</a>
</li>
