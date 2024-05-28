@extends("layouts.app")

@section("content")
    <x-navigation.breadcrumbs
        class="mt-6"
        :routes="[
            [route('home'), 'Главная'],
            [route('catalog'), 'Каталог'],
            ...($product->exists ? [[route('product', $product), $product->title]] : [])
        ]"
    ></x-navigation.breadcrumbs>
    @include('product.sections.about.index')
@endsection
