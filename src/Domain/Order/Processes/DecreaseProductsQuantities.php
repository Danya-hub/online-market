<?php

namespace Domain\Order\Processes;

use Closure;
use Domain\Order\Contracts\OrderProcessContract;
use Domain\Order\Models\Order;
use Illuminate\Support\Facades\DB;

class DecreaseProductsQuantities implements OrderProcessContract
{
    public function handle(Order $order, Closure $next)
    {
        foreach (cart()->items() as $item) {
            $item->product()->update([
                'quantity' => DB::raw('quantity - ' . $item->quantity),
            ]);
        }

        return $next($order);
    }
}
