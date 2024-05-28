<section class="mt-7">
    <h2 class="text-2xl font-medium">Категории</h2>
    <nav class="mt-4">
        <ul class="flex">
            @each('catalog.shared.category.item', $categories, 'item')
        </ul>
    </nav>
</section>
