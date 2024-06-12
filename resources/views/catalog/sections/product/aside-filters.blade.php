<aside class="p-2">
    <div class="sticky top-4 left-0">
        <form action="{{ route("catalog.page", [
            "locale" => session()->get('locale'),
            "category" => $category,
        ]) }}">
            <input type="hidden" name="sort" value="{{ request("sort") }}">
            @foreach(filters() as $filter)
                {!! $filter !!}
            @endforeach
            <div class="mt-6">
                <button
                    type="submit"
                    class="bg-gray-300 w-full py-3 rounded font-medium"
                >Поиск
                </button>
                @if(request('filters'))
                    <a
                        href="{{ route("catalog", [
                            "category" => $category,
                            'locale' => session()->get('locale'),
                        ]) }}"
                        class="block border-2 w-full py-3 mt-4 rounded font-medium text-center"
                    >Сбросить фильтры
                    </a>
                @endif
            </div>
        </form>
    </div>
</aside>
