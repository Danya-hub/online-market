<?php

namespace App\Routing;

use App\Contracts\RouteRegistrar;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\Auth\SignUpController;
use App\Http\Controllers\Auth\SocialAuthController;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Support\Facades\Route;

class AuthRegistrar implements RouteRegistrar
{
    public function map(Registrar $registrar): void
    {
        Route::middleware("web")->group(function () {
            Route::controller(SignInController::class)->group(function () {
                Route::get('/login', "page")
                    ->name("login.page");
                Route::post('/login', "handle")
                    ->middleware("throttle:auth")
                    ->name("login.handle");
                Route::delete('/logout', "logout")
                    ->name("logout");
            });

            Route::controller(SignUpController::class)->group(function () {
                Route::get('/signup', "page")
                    ->name("signup.page");
                Route::post('/signup', "handle")
                    ->middleware("throttle:auth")
                    ->name("signup.handle");
            });

            Route::controller(ForgotPasswordController::class)->group(function () {
                Route::get('/forgot-password', "page")
                    ->middleware('guest')
                    ->name("forgotPassword.page");
                Route::post('/forgot-password', "handle")
                    ->middleware('guest')
                    ->name("forgotPassword.handle");
            });

            Route::controller(ResetPasswordController::class)->group(function () {
                Route::get('/reset-password/{token}', 'page')
                    ->middleware('guest')
                    ->name('password.reset');
                Route::post('/reset-password', 'handle')
                    ->middleware('guest')
                    ->name('resetPassword.handle');
            });

            Route::controller(SocialAuthController::class)->group(function () {
                Route::get('/auth/socialite/{driver}', 'redirect')
                    ->name('socialite.redirect');

                Route::get('/auth/socialite/{driver}/callback', 'callback')
                    ->name('socialite.callback');
            });
        });
    }
}
