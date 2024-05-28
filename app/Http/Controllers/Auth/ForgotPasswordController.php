<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\ForgotPasswordFormRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Password;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ForgotPasswordController
{
    public function page(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view("auth.forgot-password");
    }

    public function handle(ForgotPasswordFormRequest $request): RedirectResponse
    {
        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            flash()
                ->info(__($status));

            return back();
        }

        return back()->withErrors(['email' => __($status)]);
    }
}
