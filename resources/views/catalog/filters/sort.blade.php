<div x-data>
    <form x-ref="sortForm" action="{{ route("catalog", $category) }}">
        <label class="flex items-center">
            <h4>Сортировать по</h4>
            <div x-data="{ sort: '{{ filter_url($category, ['sort' => request('sort')]) }}' }">
                <select
                    name="sort"
                    x-model="sort"
                    x-on:change="window.location = sort"
                    class="bg-gray-300 px-3 py-2 rounded ms-2"
                >
                    <option value="{{ filter_url($category, ['sort' => '']) }}">по умолчанию</option>
                    <option value="{{ filter_url($category, ['sort' => 'price.descending']) }}">по убыванию
                        цены
                    </option>
                    <option value="{{ filter_url($category, ['sort' => 'price.ascending']) }}">по повозрастанию
                        цены
                    </option>
                    <option value="{{ filter_url($category, ['sort' => 'title']) }}">наименованию</option>
                </select>
            </div>
        </label>
    </form>
</div>
