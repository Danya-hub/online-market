<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\SignInFormRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class SignInController
{
    public function page(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view("auth.login");
    }

    public function handle(SignInFormRequest $request): RedirectResponse
    {
        if (!auth()->attempt($request->validated())) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect()->intended(route("home"));
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()
            ->route("home");
    }
}
