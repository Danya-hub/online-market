<?php

namespace App\Routing;

use App\Contracts\RouteRegistrar;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\LocalizationController;
use App\Http\Middleware\CatalogViewMiddleware;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Support\Facades\Route;

class LocalizationRegistrar implements RouteRegistrar
{
    // TODO сделать удобные ссылки для перехода по url и для проверок url
    public function map(Registrar $registrar): void
    {
        Route::middleware("web")->group(function () {
            Route::get('/lang/{locale}', [LocalizationController::class, 'handle'])
                ->name("lang.switch");
        });
    }
}
