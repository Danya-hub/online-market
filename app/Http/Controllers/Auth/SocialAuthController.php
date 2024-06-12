<?php

namespace App\Http\Controllers\Auth;

use Domain\Auth\Models\User;
use DomainException;
use Illuminate\Foundation\Application;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Support\SessionRegenerator;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Throwable;

class SocialAuthController
{
    public function redirect(string $driver): RedirectResponse|\Illuminate\Http\RedirectResponse
    {
        try {
            return Socialite::driver($driver)
                ->redirect();
        } catch (Throwable $e) {
            throw new DomainException("Произошла ошибка или не поддерживается драйвер");
        }
    }

    public function callback(string $driver): Application|Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        if ($driver !== "github") {
            throw new DomainException("Не поддерживается драйвер");
        }

        $githubUser = Socialite::driver($driver)->user();

        $user = User::query()->updateOrCreate([
            $driver . '_id' => $githubUser->getId(),
        ], [
            'name' => $githubUser->getName(),
            'email' => $githubUser->getEmail(),
            'password' => bcrypt(str()->random(20)),
        ]);

        SessionRegenerator::run(fn() => Auth::login($user));

        return redirect()
            ->intended(localized_route('home.page'));
    }
}
