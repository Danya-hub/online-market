<?php

namespace Domain\Order\Processes;

use Closure;
use Domain\Order\Contracts\OrderProcessContract;
use Domain\Order\Models\Order;
use Domain\Order\States\PendingOrderState;

class ChangeStateToPending implements OrderProcessContract //!
{
    public function handle(Order $order, Closure $next)
    {
        $order->status->transitionTo(new PendingOrderState($order));

        return $next($order);
    }
}
