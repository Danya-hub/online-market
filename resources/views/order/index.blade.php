@extends("layouts.app")

@section("content")
    <x-navigation.breadcrumbs
        class="mt-6"
        :routes="[
            [localized_route('home.page'), 'Главная'],
            [localized_route('cart.page'), 'Корзина'],
            [localized_route('order.page'), 'Оформление заказа'],
        ]"
    ></x-navigation.breadcrumbs>
    @include ('order.sections.index')
@endsection
