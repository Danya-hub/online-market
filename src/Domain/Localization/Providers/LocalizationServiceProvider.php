<?php

namespace Domain\Localization\Providers;

use Domain\Localization\LocaleManager;
use Illuminate\Support\ServiceProvider;

class LocalizationServiceProvider extends ServiceProvider
{
    public function boot(): void
    {

    }

    public function register(): void
    {
        $this->app->register(
            ActionsServiceProvider::class
        );

        $this->app->singleton(LocaleManager::class);
    }
}
