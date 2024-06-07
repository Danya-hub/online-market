<?php

namespace Domain\Order\DTOs;

use Illuminate\Http\Request;
use Support\DTOs\DTOContract;
use Support\Traits\Makeable;

class NewOrderCustomerDTO implements DTOContract
{
    use Makeable;

    public static function allowedKeys(): array
    {
        return [
            'first_name',
            'last_name',
            'phone',
            'email',
            'city',
            'address',
        ];
    }

    public function __construct(
        public readonly string|null $first_name,
        public readonly string|null $last_name,
        public readonly string|null $phone,
        public readonly string|null $email,
        public readonly string|null $city,
        public readonly string|null $address,
    )
    {
    }

    public static function fromRequest(Request $request): NewOrderCustomerDTO
    {
        return static::make(...$request->only(self::allowedKeys()));
    }

    public static function fromArray(array $data): NewOrderCustomerDTO
    {
        return static::make(...collect($data)
            ->only(self::allowedKeys())
            ->toArray());
    }
}
