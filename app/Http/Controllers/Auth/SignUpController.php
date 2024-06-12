<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\SignUpFormRequest;
use Domain\Auth\Contracts\RegisterNewUserContract;
use Domain\Auth\DTOs\NewUserDTO;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SignUpController
{
    public function page(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view("auth.signup");
    }

    public function handle(SignUpFormRequest $request, RegisterNewUserContract $action): RedirectResponse
    {
        $action(NewUserDTO::fromRequest($request));

        return redirect()->intended(localized_route('home.page'));
    }
}
