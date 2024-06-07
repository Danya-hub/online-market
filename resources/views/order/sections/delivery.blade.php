<div class="order-card mt-4">
    <h3 class="order-title">Способ доставки</h3>
    <div>
        @foreach($deliveries as $delivery)
            <x-form.radio
                class="block"
                name="delivery_type_id"
                value="{{ $delivery->id }}"
                :checked="$loop->first || old('delivery_type_id') === $delivery->id"
            >{{ $delivery->title }}
            </x-form.radio>

            @if($delivery->with_address)
                <div class="mt-4">
                    <x-form.text-input
                        :hasError="$errors->has('customer.city')"
                        name="customer[city]"
                        class="w-full mb-2 rounded-md"
                        type="text"
                        value="{{ old('customer.city') }}"
                        placeholder="Город"
                    ></x-form.text-input>
                    @error("customer.city")
                    <x-form.error>
                        {{ $message }}
                    </x-form.error>
                    @enderror

                    <x-form.text-input
                        :hasError="$errors->has('customer.address')"
                        name="customer[address]"
                        class="w-full mb-2 rounded-md"
                        type="text"
                        value="{{ old('customer.address') }}"
                        placeholder="Адрес"
                    ></x-form.text-input>
                    @error("customer.address")
                    <x-form.error>
                        {{ $message }}
                    </x-form.error>
                    @enderror
                </div>
            @endif
        @endforeach
    </div>
</div>
