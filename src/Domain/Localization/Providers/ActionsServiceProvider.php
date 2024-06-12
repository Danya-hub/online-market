<?php

namespace Domain\Localization\Providers;

use Domain\Localization\Actions\ChangeLocaleAction;
use Domain\Localization\Contracts\ChangeLocaleContract;
use Illuminate\Support\ServiceProvider;

class ActionsServiceProvider extends ServiceProvider
{
    public array $bindings = [
        ChangeLocaleContract::class => ChangeLocaleAction::class,
    ];
}
