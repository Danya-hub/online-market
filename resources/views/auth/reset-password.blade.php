@extends("layouts.auth")

@section("title", "Изменить пароль")
@section("content")
    <x-form.auth-form title="Изменить пароль" :action="route('resetPassword.handle')">
        <input type="hidden" name="token" value="{{ $token }}">

        <x-form.text-input
            :hasError="$errors->has('password')"
            :value="request('email')"
            name="email"
            class="w-full mb-4"
            type="email"
            placeholder="Почта"
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
            class="w-full mb-4"
            type="password"
            placeholder="Новый пароль"
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
            class="w-full mb-4"
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
            text="Отправить"
            class="w-full p-2"
        ></x-form.primary-button>
        <div class="mt-6">
            <a class="block" href="{{ route("login.page") }}">Вспомнил пароль</a>
        </div>
    </x-form.auth-form>
@endsection
