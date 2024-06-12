<?php

namespace Domain\Order\Actions;

use Domain\Auth\Contracts\RegisterNewUserContract;
use Domain\Auth\DTOs\NewUserDTO;
use Domain\Order\Contracts\PlaceOrderContract;
use Domain\Order\DTOs\NewOrderCustomerDTO;
use Domain\Order\DTOs\NewOrderDTO;
use Domain\Order\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class PlaceOrderAction implements PlaceOrderContract
{
    public function __invoke(
        NewOrderDTO $order,
        NewOrderCustomerDTO $user,
        bool $create_account,
    ): Order
    {
        $registerUserAction = app(RegisterNewUserContract::class);

        if ($create_account) {
            $registerUserAction(NewUserDTO::make(
                $user->fullName(),
                $user->email,
                $order->password,
            ));
        }

        return Order::query()
            ->create([
                'payment_method_id' => $order->payment_method_id,
                'delivery_type_id' => $order->delivery_type_id,
            ]);
    }
}
