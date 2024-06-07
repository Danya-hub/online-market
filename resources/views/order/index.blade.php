@extends("layouts.app")

@section("content")
    <x-navigation.breadcrumbs
        class="mt-6"
        :routes="[
            [route('home'), 'Главная'],
            [route('cart'), 'Корзина'],
            [route('order.page'), 'Оформление заказа'],
        ]"
    ></x-navigation.breadcrumbs>
    @include ('order.sections.index')
@endsection
