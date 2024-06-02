<section>
    <h2 class="text-3xl font-medium mb-2">Просмотренные товары</h2>
    <ul class="grid grid-cols-4 gap-6 mt-5">
        @each('product.shared.grid', $also, 'item')
    </ul>
</section>
