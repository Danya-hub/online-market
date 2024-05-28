<?php

namespace App\Providers;

use App\Contracts\RouteRegistrar;
use App\Routing\AppRegistrar;
use App\Routing\AuthRegistrar;
use App\Routing\CatalogRegistrar;
use App\Routing\ProductRegistrar;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use RuntimeException;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/';

    protected array $registrars = [
        AppRegistrar::class,
        AuthRegistrar::class,
        CatalogRegistrar::class,
        ProductRegistrar::class,
    ];

    public function boot(): void
    {
        $this->routes(function (Registrar $router) {
            $this->mapRoutes($router, $this->registrars);
        });
    }

    protected function mapRoutes(Registrar $router, array $registrars): void
    {
        foreach ($registrars as $registrar) {
            if (! class_exists($registrar) || ! is_subclass_of($registrar, RouteRegistrar::class)) {
                throw new RuntimeException(sprintf(
                    'Cannot map routes \'%s\', it is not a valid routes class',
                    $registrar
                ));
            }

            (new $registrar)->map($router);
        }
    }
}
