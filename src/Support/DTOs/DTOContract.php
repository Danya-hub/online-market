<?php

namespace Support\DTOs;

use Domain\Order\DTOs\NewOrderDTO;
use Illuminate\Http\Request;

interface DTOContract
{
    public static function allowedKeys(): array;
    public static function fromRequest(Request $request): DTOContract;
}
