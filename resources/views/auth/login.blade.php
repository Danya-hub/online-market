@extends("layouts.auth")

@section("title", "Вход в аккаунт")

@section("content")
    <x-form.auth-form title="Вход в аккаунт" :action="route('login.handle')">
        <x-form.text-input
            :hasError="$errors->has('email')"
            :value="old('email')"
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
            placeholder="Пароль"
            required
        ></x-form.text-input>
        @error("password")
        <x-form.error>
            {{ $message }}
        </x-form.error>
        @enderror

        <x-form.primary-button
            text="Войти"
            class="w-full p-2"
        ></x-form.primary-button>
        <div class="mt-6">
            <x-form.signup-using></x-form.signup-using>
            <div class="mt-3">
                <a class="block" href="{{ route("forgotPassword.page", ['locale' => session()->get('locale')]) }}">Забыли пароль</a>
                <a class="block mt-2" href="{{ route("signup.page", ['locale' => session()->get('locale')]) }}">Регистрация</a>
            </div>
        </div>
    </x-form.auth-form>
@endsection
