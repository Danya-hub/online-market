<?php

namespace Domain\Product\Actions;

use Domain\Product\Contracts\AlsoProductContract;
use Domain\Product\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

class AlsoProductAction implements AlsoProductContract
{
    public function __invoke(Product $product): Collection|array
    {
        $also = session('also', []);

        if (count($also) > 5) {
            $id = Arr::first(array_keys($also));
            session()->forget('also.' . $id);
        }

        session()->put('also.' . $product->id, $product->id);

        return Product::query()
            ->whereIn('id', array_keys(session('also')))
            ->where('id', '!=', $product->id)
            ->get();
    }
}
