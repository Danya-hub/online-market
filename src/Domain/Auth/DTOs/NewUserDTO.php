<?php

namespace Domain\Auth\DTOs;

use Illuminate\Http\Request;
use Support\DTOs\DTOContract;
use Support\Traits\Makeable;

class NewUserDTO implements DTOContract
{
    use Makeable;

    public static function allowedKeys(): array
    {
        return [
            'name',
            'email',
            'password',
        ];
    }

    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
    )
    {

    }

    public static function fromRequest(Request $request): NewUserDTO
    {
        return static::make(...$request
            ->only(self::allowedKeys()));
    }
}
