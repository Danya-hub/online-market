<?php

namespace Domain\Order\Actions;

use Domain\Auth\Contracts\RegisterNewUserContract;
use Domain\Auth\DTOs\NewUserDTO;
use Domain\Order\Contracts\PlaceOrderContract;
use Domain\Order\DTOs\NewOrderDTO;
use Domain\Order\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class PlaceOrderAction implements PlaceOrderContract
{
    public function __invoke(NewOrderDTO $data): Order
    {
        $registerUserAction = app(RegisterNewUserContract::class);

        if ($data->create_account) {
            $registerUserAction(NewUserDTO::make(
                "{$data->customer['first_name']} {$data->customer['last_name']}",
                $data->customer['email'],
                $data->password,
            ));
        }

        return Order::query()
            ->create([
                'payment_method_id' => $data->payment_method_id,
                'delivery_type_id' => $data->delivery_type_id,
            ]);
    }
}
