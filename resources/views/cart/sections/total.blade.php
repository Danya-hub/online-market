<div class="flex justify-between items-center mt-5 mb-6">
    <span class="text-2xl">
        Итого: {{ cart()->total() }}
    </span>
    <form action="{{ route('cart.truncate') }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Очистить корзину</button>
    </form>
    <div>
        <a href="{{ route('catalog') }}" class="bg-gray-400 px-4 py-3 rounded">За покупками</a>
        <a href="#" class="bg-green-400 px-4 py-3 rounded ms-3">Оформить заказ</a>
    </div>
</div>
