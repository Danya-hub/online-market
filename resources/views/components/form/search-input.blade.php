<x-form.simple-form
    class="flex"
    {{ $attributes }}
>
    <x-form.text-input
        placeholder="{{ $placeholder }}"
        class="h-9"
        name="s"
    >
        @if(request('s'))
            <a href="{{ url()->current() }}" class="ml-2">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                </svg>
            </a>
        @endif
    </x-form.text-input>
    <button
        type="submit"
        class="h-9 min-w-9 ml-3 rounded overflow-hidden"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full p-1.5 bg-gray-400" viewBox="0 0 20 20"
             fill="currentColor">
            <path fill-rule="evenodd"
                  d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                  clip-rule="evenodd"></path>
        </svg>
    </button>
</x-form.simple-form>
