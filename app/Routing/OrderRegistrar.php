<?php

namespace App\Routing;

use App\Contracts\RouteRegistrar;
use App\Http\Controllers\OrderController;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Support\Facades\Route;

class OrderRegistrar implements RouteRegistrar
{
    public function map(Registrar $registrar): void
    {
        Route::middleware('web')->group(function () {
            Route::get('/{locale?}/order', [OrderController::class, 'page'])
                ->name('order.page');
            Route::post('/order', [OrderController::class, 'handle'])
                ->name('order.handle');
        });
    }
}
