<?php

namespace App\Routing;

use App\Contracts\RouteRegistrar;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ThumbnailController;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Support\Facades\Route;

class AppRegistrar implements RouteRegistrar
{
    public function map(Registrar $registrar): void
    {
        Route::middleware("web")->group(function () {
            Route::get('/{locale?}', HomeController::class)
                ->name("home.page");

            Route::get('/storage/images/{dir}/{method}/{size}/{file}', ThumbnailController::class)
                ->where('method', 'resize|crop')
                ->where('size', '\d+x\d+')
                ->where('file', '.+\.(png|jpg|jpeg|gif)$')
                ->name('thumbnail');
        });
    }
}
