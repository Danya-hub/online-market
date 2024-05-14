<?php

namespace App\Providers;

use Illuminate\Foundation\Vite;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Vite::macro("image", fn($asset) => $this->asset("resources/images/$asset"));
    }
}
