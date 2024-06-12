<?php

namespace App\Http\Controllers;

use Domain\Product\Contracts\AlsoProductContract;
use Domain\Product\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class ProductController extends Controller
{
    public function __invoke(string $locale, Product $product, AlsoProductContract $action): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $product->load(['optionValues.option']);

        return view("product.show", [
            'product' => $product,
            'options' => $product->optionValues->keyValues(),
            'also' => $action($product),
        ]);
    }
}
