@extends("layouts.auth")

@section("title", "Сброс пароля")
@section("content")
    <x-form.auth-form title="Сброс пароля" :action="route('forgotPassword.handle')">
        <x-form.text-input
            :hasError="$errors->has('password_confirmation')"
            name="email"
            class="w-full mb-4"
            type="email"
            placeholder="Почта"
            :value="old('email')"
            required
        ></x-form.text-input>
        @error("email")
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
