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
            ->create([
                'first_name' => $this->customer->first_name,
                'last_name' => $this->customer->last_name,
                'phone' => $this->customer->phone,
                'email' => $this->customer->email,
                'city' => $this->customer->city,
                'address' => $this->customer->address,
            ]);

        return $next($order);
    }
}
