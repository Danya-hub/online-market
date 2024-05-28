<section class="mt-5">
    <h2 class="text-3xl font-medium">Категории</h2>
    <ul class="flex flex-wrap mt-6">
        @each('catalog.sections.category.item', $categories, 'item')
    </ul>
</section>
