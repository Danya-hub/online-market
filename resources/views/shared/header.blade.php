<header class="flex p-3 justify-between">
    <div class="flex items-center mx-3">
        <x-shared.logo></x-shared.logo>
        <x-form.search-input
            method="GET"
            :action="route('catalog')"
            placeholder="Поиск..."
            class="ml-5"
            requestName="s"
        ></x-form.search-input>
    </div>
    <x-partials.header.navigation></x-partials.header.navigation>
    <div class="flex mx-3">
        @auth
            <x-shared.profile
                class="mx-2"
            ></x-shared.profile>
        @elseguest
            <x-auth.login-button
                class="mx-2"
            ></x-auth.login-button>
        @endauth
        <x-partials.header.cart
            class="mx-2"
        ></x-partials.header.cart>
        <x-partials.header.menu
            class="mx-2"
        ></x-partials.header.menu>
    </div>
</header>
