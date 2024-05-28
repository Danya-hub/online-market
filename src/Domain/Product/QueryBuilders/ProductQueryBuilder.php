<?php

namespace Domain\Product\QueryBuilders;

use Domain\Catalog\Facades\Sorter;
use Domain\Catalog\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pipeline\Pipeline;

class ProductQueryBuilder extends Builder
{
    public function homePage(): ProductQueryBuilder
    {
        return $this->where('on_home_page', true)
            ->orderBy('sorting')
            ->limit(6);
    }

    public function filtered(): Builder
    {
        return app(Pipeline::class)
            ->send($this)
            ->through(filters())
            ->thenReturn();
    }

    public function sorted(): Builder
    {
        return Sorter::run($this);
    }

    public function withCategory(Category $category): ProductQueryBuilder
    {
        return $this->when($category->exists, function (Builder $q) use ($category) {
            $q->whereRelation(
                'categories',
                'categories.id',
                '=',
                $category->id,
            );
        });
    }

    public function search(): ProductQueryBuilder
    {
        return $this->when(request('s'), function (Builder $q) {
            $q->whereFullText(['title', 'text'], request('s'));
        });
    }
}
