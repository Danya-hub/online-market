<?php

namespace Domain\Catalog\ViewModels;

use Domain\Catalog\Models\Category;
use Domain\Product\Models\Product;
use Domain\Product\QueryBuilders\ProductQueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Support\Traits\Makeable;

class ProductViewModel
{
    use Makeable;

    public function products(Category $category): ProductQueryBuilder
    {
        return Product::query()
            ->select(['id', 'slug', 'title', 'price', 'thumbnail', 'json_properties'])
            ->search()
            ->withCategory($category)
            ->filtered()
            ->sorted();
    }
}
