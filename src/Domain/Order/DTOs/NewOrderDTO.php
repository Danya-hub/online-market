<?php

namespace Domain\Order\DTOs;

use Illuminate\Http\Request;
use Support\DTOs\DTOContract;
use Support\Traits\Makeable;

class NewOrderDTO
{
    use Makeable;

    public function __construct(
        public readonly array  $customer,
        public readonly string $payment_method_id,
        public readonly string $delivery_type_id,
        public readonly bool   $create_account = false,
        public readonly string $password = '',
    )
    {
    }

    public static function fromRequest(Request $request): NewOrderDTO
    {
        return static::make(...$request->only([
            'customer',
            'create_account',
            'password',
            'payment_method_id',
            'delivery_type_id',
        ]));
    }
}
