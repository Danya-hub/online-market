<table class="w-full spacing-table">
    <thead>
    <tr class="text-left">
        <th>Товар</th>
        <th>Цена</th>
        <th>Количество</th>
        <th>Сумма</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
        <tr>
            <td class="flex rounded-l-2xl">
                <img
                    src="{{ $item->product->makeThumbnail("70x70") }}"
                    class="rounded"
                >
                <div class="ms-4">
                    <b>{{ $item->product->title }}</b>
                    <ul class="mt-1">
                        @foreach($item->optionValues as $value)
                            <li>
                                <span>{{ $value->option->title }}: {{ $value->title }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </td>
            <td>
                <b>{{ $item->price }}</b>
            </td>
            <td>
                <form action="{{ route('cart.quantity', $item) }}" method="POST">
                    @csrf

                    <x-form.counter
                        value="{{ $item->quantity }}"
                        name="quantity"
                    ></x-form.counter>
                </form>
            </td>
            <td>
                <b>{{ $item->total }}</b>
            </td>
            <td class="rounded-r-2xl">
                <form action="{{ route('cart.delete', $item) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                        </svg>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
