<div class="mt-6 overflow-y-scroll">
    <h4 class="font-medium mb-4">{{ $filter->title() }}</h4>
    <ul>
        @foreach($filter->values() as $id => $label)
            <li>
                <label class="flex items-center">
                    <input
                        type="checkbox"
                        name="{{ $filter->name($id) }}"
                        value="{{ $id }}"
                        @checked($filter->requestValue($id))
                        id="{{ $filter->id($id) }}"
                    >
                    <span class="ms-2">{{ $label }}</span>
                </label>
            </li>
        @endforeach
    </ul>
</div>
