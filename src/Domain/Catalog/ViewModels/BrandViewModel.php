<?php

namespace Domain\Catalog\ViewModels;

use Domain\Catalog\Models\Brand;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class BrandViewModel
{
    use Makeable;

    public function homePage(): Collection|array
    {
        return Cache::rememberForever('brand_home_page', function () {
            return Brand::query()
                ->homePage()
                ->get();
        });
    }

    public function brands(): Collection|array
    {
        return Cache::rememberForever('brands_catalog_page', function () {
            return Brand::query()
                ->select(['id', 'title'])
                ->has('products')
                ->get();
        });
    }
}
