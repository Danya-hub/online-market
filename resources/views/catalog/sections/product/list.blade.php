<div class="col-span-3">
    @include('catalog.sections.product.top-filter')
    <ul class="grid gap-4 @if(is_catalog_view('grid')) grid-cols-3 @else grid-cols-1 @endif">
        @each('product.shared.' . (is_catalog_view('grid') ? 'grid' : 'list'), $products, 'item')
    </ul>
    {{$products->withQueryString()->links('pagination::tailwind')}}
</div>
