<?php

namespace Domain\Order\Processes;

use Closure;
use Domain\Order\Contracts\OrderProcessContract;
use Domain\Order\Exceptions\OrderProcessException;
use Domain\Order\Models\Order;

class CheckProductQuantities implements OrderProcessContract
{
    /**
     * @throws OrderProcessException
     */
    public function handle(Order $order, Closure $next): Order
    {
        foreach (cart()->items() as $item) {
            if ($item->product->quantity < $item->quantity) {
                throw new OrderProcessException('Не осталось товаров');
            }
        }

        return $next($order);
    }
}
