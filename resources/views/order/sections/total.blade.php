<div class="order-card">
    <h3 class="order-title">Заказ</h3>
    <div>
        <table class="w-full">
            <thead>
            <tr class="text-left border-b border-gray-700">
                <th class="py-2">Товар</th>
                <th class="py-2">Кол.</th>
                <th class="py-2">Сумма</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr class="border-b border-gray-700">
                    <td class="py-2">
                        <b>{{ $item->product->title }}</b>
                        <ul class="mt-1">
                            @foreach($item->optionValues as $value)
                                <li>
                                    <span>{{ $value->option->title }}: {{ $value->title }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="py-2">
                        <span>{{ $item->quantity }} шт.</span>
                    </td>
                    <td class="py-2">
                        <span>{{ $item->total }}</span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <span class="block text-right mt-1">Всего: {{ cart()->total() }}</span>
    </div>
    <div class="mt-4 mb-2 flex">
        <b>Итого:</b>
        <span class="ms-4">{{ cart()->total() }}</span>
    </div>
    <x-form.primary-button
        text="Оформить заказ"
        class="w-full py-4 rounded bg-green-400 mt-4"
    ></x-form.primary-button>
</div>
