<?php

namespace App\View\ViewModels;

use Domain\Catalog\Models\Category;
use Domain\Catalog\ViewModels\BrandViewModel;
use Domain\Catalog\ViewModels\CategoryViewModel;
use Domain\Catalog\ViewModels\ProductViewModel;
use Domain\Product\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Spatie\ViewModels\ViewModel;

class HomeViewModel extends ViewModel
{
    public function __construct()
    {
    }

    public function products(): Collection|array
    {
        return Product::query()
            ->homePage()
            ->get();
    }

    public function brands(): Collection|array
    {
        return BrandViewModel::make()->homePage();
    }

    public function categories(): Collection|array
    {
        return CategoryViewModel::make()->homePage();
    }
}
