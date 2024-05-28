<div x-data="{ open: false }" class="relative">
    <button
        type="button"
        class="flex items-center"
        @click="open = !open"
        {{ $attributes->class('flex') }}
    >
        <img class="h-10 w-10 rounded-full" src="{{ auth()->user()->avatar }}" alt={{ auth()->user()->name }} >
        <span class="mx-2 text-gray-800 font-medium">{{ auth()->user()->name }}</span>
        <svg :class="['w-5 h-5 text-gray-800 dark:text-white', open && 'rotate-180']" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
        </svg>
    </button>
    <div x-show="open" @click.away="open = false" style="display: none" class="absolute bg-white p-4 mt-1 rounded shadow">
        <h5>Мой профиль</h5>
        <div class="mt-2 flex items-center">
            <img class="rounded-full h-10 w-10" src="{{ auth()->user()->avatar }}" alt={{ auth()->user()->name }} >
            <span class="ms-2 font-medium">{{ auth()->user()->name }}</span>
        </div>
        <nav class="my-2">
            <ul>
                <li>
                    <a href="#" class="whitespace-nowrap py-1 block text-gray-800">Мои заказы</a>
                </li>
                <li>
                    <a href="#" class="whitespace-nowrap py-1 block text-gray-800">Редактировать профиль</a>
                </li>
            </ul>
        </nav>
        <div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                @method("DELETE")

                <button type="submit" class="flex items-center text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                              clip-rule="evenodd"></path>
                    </svg>
                    <span class="ms-2">Выйти</span>
                </button>
            </form>
        </div>
    </div>
</div>
