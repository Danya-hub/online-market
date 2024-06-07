<div class="order-card">
    <h3 class="order-title">Контактная информация</h3>
    <div>
        <x-form.text-input
            :hasError="$errors->has('first_name')"
            name="customer[first_name]"
            class="w-full mb-2 rounded-md"
            type="text"
            placeholder="Имя"
            required
        ></x-form.text-input>
        @error("customer.first_name")
        <x-form.error>
            {{ $message }}
        </x-form.error>
        @enderror

        <x-form.text-input
            :hasError="$errors->has('last_name')"
            name="customer[last_name]"
            class="w-full mb-2 rounded-md"
            type="text"
            placeholder="Фамилия"
            required
        ></x-form.text-input>
        @error("customer.last_name")
        <x-form.error>
            {{ $message }}
        </x-form.error>
        @enderror

        <x-form.text-input
            :hasError="$errors->has('email')"
            name="customer[email]"
            class="w-full mb-2 rounded-md"
            type="email"
            placeholder="Почта"
            required
        ></x-form.text-input>
        @error("customer.email")
        <x-form.error>
            {{ $message }}
        </x-form.error>
        @enderror

        <x-form.text-input
            :hasError="$errors->has('phone')"
            name="customer[phone]"
            class="w-full mb-2 rounded-md"
            type="tel"
            placeholder="Телефон"
            required
        ></x-form.text-input>
        @error("customer.phone")
        <x-form.error>
            {{ $message }}
        </x-form.error>
        @enderror
    </div>
    <div class="mt-2" x-data="{ open: false }">
        <h4>Вы можете создать аккаунт после оформления заказа</h4>
        <x-form.checkbox
            class="mt-2 block"
            @change="open = !open"
            name="create_account"
        >Зарегестрировать аккаунт</x-form.checkbox>
        <div x-show="open" class="mt-2" style="display: none">
            <x-form.text-input
                :hasError="$errors->has('password')"
                name="customer[password]"
                class="w-full mb-2 rounded-md"
                type="text"
                placeholder="Пароль"
                x-bind:required="open"
            ></x-form.text-input>
            @error("customer.password")
            <x-form.error>
                {{ $message }}
            </x-form.error>
            @enderror

            <x-form.text-input
                :hasError="$errors->has('password_confirmation')"
                name="customer[password_confirmation]"
                class="w-full mb-2 rounded-md"
                type="password"
                placeholder="Подтвердите пароль"
                x-bind:required="open"
            ></x-form.text-input>
            @error("customer.password_confirmation")
            <x-form.error>
                {{ $message }}
            </x-form.error>
            @enderror
        </div>
    </div>
</div>
