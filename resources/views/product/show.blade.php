@extends("layouts.app")

@section("content")
    <x-navigation.breadcrumbs
        class="mt-6"
        :routes="[
            [localized_route('home.page'), 'Главная'],
            [localized_route('catalog.page'), 'Каталог'],
            ...($product->exists ? [[localized_route('product.page', [
                'product' => $product,
            ]), $product->title]] : [])
        ]"
    ></x-navigation.breadcrumbs>
    @include('product.sections.about.index')
@endsection
