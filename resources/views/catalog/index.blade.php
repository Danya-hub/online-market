@extends("layouts.app")

@section("content")
    <x-navigation.breadcrumbs
            class="mt-6"
            :routes="[
                [route('home'), 'Главная'],
                [route('catalog'), 'Каталог'],
                ...($category->exists ? [[route('catalog', $category), $category->title]] : [])
            ]"
    ></x-navigation.breadcrumbs>
    @include('catalog.sections.category.index')
    @include('catalog.sections.product.index')
@endsection
