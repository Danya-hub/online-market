<li class="bg-gray-200 rounded-2xl shadow">
    <a href="{{ localized_route('product.page', [
        'product' => $item,
    ]) }}" class="block rounded-2xl bg-white overflow-hidden h-48">
        <img class="w-full object-contain" src="{{ $item->makeThumbnail("345x320") }}" alt="{{ $item->title }}">
    </a>
    <div class="p-2">
        <h3>{{ $item->title }}</h3>
        <div class="mt-2">
            <b>{{ $item->price }}</b>
            <div class="mt-2 flex p-3">
                <a href="#" class="bg-green-400 block rounded me-2 shadow-sm shadow-green-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 p-2" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                    </svg>
                </a>
                <a href="#" class="bg-red-400 block rounded shadow-sm shadow-red-700" title="Удалить из избранных">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 p-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                              clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</li>
