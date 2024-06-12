<?php

namespace Domain\Localization\Actions;

use Domain\Localization\Contracts\ChangeLocaleContract;
use Illuminate\Support\Facades\App;

class ChangeLocaleAction implements ChangeLocaleContract
{
    public function __invoke(string $locale): void
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
    }
}
