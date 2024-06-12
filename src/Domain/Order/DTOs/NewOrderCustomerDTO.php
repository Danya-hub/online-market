<?php

namespace Domain\Order\DTOs;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Support\DTOs\DTOContract;
use Support\Traits\Makeable;

class NewOrderCustomerDTO
{
    use Makeable;

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

    public function fullName(): string
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }

    public static function fromArray(array $data): NewOrderCustomerDTO
    {
        return static::make([
            $data['first_name'],
            $data['last_name'],
            $data['phone'],
            $data['email'],
            $data['city'],
            $data['address'],
        ]);
    }

    public function toArray(): array
    {
        return [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'city' => $this->city,
            'address' => $this->address,
        ];
    }
}
