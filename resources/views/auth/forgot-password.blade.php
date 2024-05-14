@extends("layouts.auth")

@section("title", "Сброс пароля")
@section("content")
    <x-form.auth-form title="Сброс пароля" :action="route('password.email')">
        <x-form.text-input
            :hasError="$errors->has('password_confirmation')"
            name="email"
            class="w-full"
            type="email"
            placeholder="Email"
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
        ></x-form.primary-button>
        <div class="mt-6">
            <a class="block" href="{{ route("login") }}">Вспомнил пароль</a>
        </div>
    </x-form.auth-form>
@endsection
