<section class="mt-7">
    <h2 class="text-2xl font-medium">Продукты</h2>
    <ul class="grid grid-cols-3 gap-10 mt-4">
        @each('product.shared.grid', $products, 'item')
    </ul>
</section>
