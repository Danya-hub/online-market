@extends("layouts.app")

@section("content")
    <x-navigation.breadcrumbs
            class="mt-6"
            :routes="[
                [localized_route('home.page'), 'Главная'],
                [localized_route('catalog.page'), 'Каталог'],
                ...($category->exists ? [[localized_route('catalog.page', [
                    'category' => $category,
                ])]] : [])
            ]"
    ></x-navigation.breadcrumbs>
    @include('catalog.sections.category.index')
    @include('catalog.sections.product.index')
@endsection
