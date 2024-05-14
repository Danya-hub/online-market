@extends("layouts.auth")

@section("title", "Изменить пароль")
@section("content")
    <x-form.auth-form title="Изменить пароль" :action="route('password.update')">
        <input type="hidden" name="token" value="{{ $token }}">

        <x-form.text-input
            :hasError="$errors->has('password')"
            :value="request('email')"
            name="email"
            class="w-full"
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
            text="Отправить"
        ></x-form.primary-button>
        <div class="mt-6">
            <a class="block" href="{{ route("login") }}">Вспомнил пароль</a>
        </div>
    </x-form.auth-form>
@endsection
