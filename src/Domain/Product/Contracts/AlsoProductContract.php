<?php

namespace Domain\Product\Contracts;

use Domain\Product\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface AlsoProductContract
{
    public function __invoke(Product $product): Collection|array;
}
