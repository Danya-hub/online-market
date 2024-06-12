<?php

namespace Domain\Order\Contracts;

use Domain\Order\DTOs\NewOrderCustomerDTO;
use Domain\Order\DTOs\NewOrderDTO;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface PlaceOrderContract
{
    public function __invoke(
        NewOrderDTO $order,
        NewOrderCustomerDTO $user,
        bool $create_account,
    ): Builder|Model;
}
