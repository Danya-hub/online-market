@extends("layouts.app")

@section("content")
    <x-navigation.breadcrumbs
        class="mt-6"
        :routes="[
            [route('home'), 'Главная'],
            [route('cart'), 'Корзина'],
        ]"
    ></x-navigation.breadcrumbs>
    @include('cart.sections.index')
@endsection
