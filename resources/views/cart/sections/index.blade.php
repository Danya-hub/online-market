<section class="mt-2">
    <h2 class="font-medium text-3xl mb-4">Корзина покупок</h2>
    @if($items->isEmpty())
        @include('cart.sections.empty')
    @else
        @include('cart.sections.table')
        @include('cart.sections.total')
    @endif
</section>
