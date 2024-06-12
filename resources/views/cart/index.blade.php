@extends("layouts.app")

@section("content")
    <x-navigation.breadcrumbs
        class="mt-6"
        :routes="[
            [localized_route('home.page'), 'Главная'],
            [localized_route('cart.page'), 'Корзина'],
        ]"
    ></x-navigation.breadcrumbs>
    @include('cart.sections.index')
@endsection
