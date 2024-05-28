<div>
    <h4 class="font-medium mb-4">{{ $filter->title() }}</h4>
    <div class="flex justify-between mb-2">
        <label for="from-price">
            <span>От, ₴</span>
        </label>
        <label for="to-price">
            <span>До, ₴</span>
        </label>
    </div>
    <div class="flex items-center">
        <x-form.text-input
            :id="$filter->id('from')"
            :name="$filter->name('from')"
            :value="$filter->requestValue('from', 0)"
            type="number"
            id="from-price"
            placeholder="От"
            class="rounded"
        ></x-form.text-input>
        <span class="mx-3">-</span>
        <x-form.text-input
            id="{{ $filter->id('to') }}"
            name="{{ $filter->name('to') }}"
            value="{{ $filter->requestValue('to', 100000) }}"
            type="number"
            id="to-price"
            placeholder="До"
            class="rounded"
        ></x-form.text-input>
    </div>
</div>
