@extends("layouts.auth")

@section("title", "Регистрация")
@section("content")
    <x-form.auth-form title="Регистрация" :action="route('store')">
        <x-form.text-input
            :hasError="$errors->has('name')"
            :value="old('name')"
            name="name"
            type="text"
            placeholder="Имя"
            required
        ></x-form.text-input>
        @error("name")
        <x-form.error>
            {{ $message }}
        </x-form.error>
        @enderror

        <x-form.text-input
            :hasError="$errors->has('email')"
            :value="old('email')"
            name="email"
            type="email"
            placeholder="Email"
            required
        ></x-form.text-input>
        @error("email")
        <x-form.error>
            {{ $message }}
        </x-form.error>
        @enderror

        <x-form.text-input
            :hasError="$errors->has('password')"
            name="password"
            class="w-full"
            type="password"
            placeholder="Пароль"
            required
        ></x-form.text-input>
        @error("password")
        <x-form.error>
            {{ $message }}
        </x-form.error>
        @enderror

        <x-form.text-input
            :hasError="$errors->has('password_confirmation')"
            name="password_confirmation"
            class="w-full"
            type="password"
            placeholder="Подтвердите пароль"
            required
        ></x-form.text-input>
        @error("password_confirmation")
        <x-form.error>
            {{ $message }}
        </x-form.error>
        @enderror

        <x-form.primary-button
            text="Зарегестрироваться"
        ></x-form.primary-button>
        <div class="mt-6">
            <x-form.signup-using></x-form.signup-using>
            <div class="mt-3">
                <a class="block" href="{{ route("login") }}">Войти</a>
            </div>
        </div>
    </x-form.auth-form>
@endsection
