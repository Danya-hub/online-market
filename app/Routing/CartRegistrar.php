<?php

namespace App\Routing;

use App\Contracts\RouteRegistrar;
use App\Http\Controllers\CartController;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Support\Facades\Route;

class CartRegistrar implements RouteRegistrar
{
    public function map(Registrar $registrar): void
    {
        Route::middleware('web')->group(function () {
            Route::controller(CartController::class)
                ->group(function () {
                    Route::get('/{locale?}/cart', 'index')
                        ->name('cart.page');
                    Route::post('/cart/{product}/add', 'add')
                        ->name('cart.add');
                    Route::post('/cart/{item}/quantity', 'quantity')
                        ->name('cart.quantity');
                    Route::delete('/cart/{item}/delete', 'delete')
                        ->name('cart.delete');
                    Route::delete('/cart/truncate', 'truncate')
                        ->name('cart.truncate');
                });
        });
    }
}
