<?php

namespace Domain\Order\Providers;

use Domain\Order\Actions\PlaceOrderAction;
use Domain\Order\Contracts\PlaceOrderContract;
use Illuminate\Support\ServiceProvider;

class ActionsServiceProvider extends ServiceProvider
{
    public array $bindings = [
        PlaceOrderContract::class => PlaceOrderAction::class,
    ];
}
