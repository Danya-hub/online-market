<?php

namespace App\View\ViewModels;

use Domain\Catalog\Models\Category;
use Domain\Catalog\ViewModels\CategoryViewModel;
use Domain\Catalog\ViewModels\ProductViewModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Spatie\ViewModels\ViewModel;

class CatalogViewModel extends ViewModel
{
    public function __construct(
        public Category $category,
    )
    {
    }

    public function products(): LengthAwarePaginator
    {
        return ProductViewModel::make()
            ->products($this->category)
            ->paginate(6);
    }

    public function categories(): Collection|array
    {
        return CategoryViewModel::make()
            ->categories();
    }
}
