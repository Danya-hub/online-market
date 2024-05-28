<?php

namespace Domain\Catalog\Sorters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Stringable;

class Sorter
{
    public const SORT_KEY = "sort";

    public function __construct(
        protected array $columns = [],
    )
    {
    }

    public function run(Builder $query): Builder
    {
        $sortData = $this->sortData();

        return $query->when($sortData->contains($this->columns()), function (Builder $q) use ($sortData) {
            $direction = $sortData->contains('descending') ? 'DESC' : 'ASC';

            $q->orderBy(
                (string)$sortData->remove(['.descending', '.ascending']),
                $direction,
            );
        });
    }

    public function key(): string
    {
        return self::SORT_KEY;
    }

    public function columns(): array
    {
        return $this->columns;
    }

    public function sortData(): Stringable
    {
        return request()->str($this->key());
    }

    public function isActive(string $column, string $direction = 'ASC'): bool
    {
        $column = (string)str($column)->remove(['.descending', '.ascending']);

        if (strtoupper($direction) === 'DESC') {
            $column .= '.descending';
        }

        return request($this->key()) === $column;
    }
}
