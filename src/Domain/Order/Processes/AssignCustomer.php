<?php

namespace Domain\Order\Processes;

use Closure;
use Domain\Auth\DTOs\NewUserDTO;
use Domain\Order\Contracts\OrderProcessContract;
use Domain\Order\DTOs\NewOrderCustomerDTO;
use Domain\Order\Models\Order;

class AssignCustomer implements OrderProcessContract
{
    public function __construct(
        protected NewOrderCustomerDTO $customer
    )
    {
    }

    public function handle(Order $order, Closure $next)
    {
        $order->orderCustomer()
            ->create($this->customer->toArray());

        return $next($order);
    }
}
