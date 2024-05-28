<li class="bg-gray-300 p-4 rounded">
    <a href="#">
        <img class="mx-auto" src="{{ $item->makeThumbnail("70x70") }}" alt="{{ $item->title }}">
        <span class="text-center mt-3 block font-medium">{{ $item->title }}</span>
    </a>
</li>
