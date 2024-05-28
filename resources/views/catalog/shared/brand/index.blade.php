<section class="my-7">
    <h2 class="text-2xl font-medium">Бренды</h2>
    <ul class="grid grid-cols-3 gap-6 mt-6">
        @each('catalog.shared.brand.item', $brands, 'item')
    </ul>
</section>
