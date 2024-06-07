<?php

namespace Domain\Order\Contracts;

use Closure;
use Domain\Order\Models\Order;

interface OrderProcessContract
{
    public function handle(Order $order, Closure $next);
}
