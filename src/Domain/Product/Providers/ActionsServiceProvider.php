<?php

namespace Domain\Product\Providers;

use Domain\Product\Actions\AlsoProductAction;
use Domain\Product\Contracts\AlsoProductContract;
use Illuminate\Support\ServiceProvider;

class ActionsServiceProvider extends ServiceProvider
{
    public array $bindings = [
        AlsoProductContract::class => AlsoProductAction::class,
    ];
}
