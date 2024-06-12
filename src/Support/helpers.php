<?php

use Domain\Cart\CartManager;
use Domain\Catalog\Filters\FilterManager;
use Domain\Catalog\Models\Category;
use Domain\Catalog\Sorters\Sorter;
use Domain\Localization\LocaleManager;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Support\Flash\Flash;
use Domain\Localization\Models\Locale;

if (!function_exists("cart")) {
    function cart(): CartManager
    {
        return app(CartManager::class);
    }
}

if (!function_exists("flash")) {
    function flash(): Flash
    {
        return app(Flash::class);
    }
}

if (!function_exists("sorter")) {
    function sorter(): Sorter
    {
        return app(Sorter::class);
    }
}

if (!function_exists("filters")) {
    function filters(): array
    {
        return app(FilterManager::class)->items();
    }
}

if (!function_exists("is_catalog_view")) {
    function is_catalog_view(string $type, string $default = 'grid'): bool
    {
        return session('view', $default) === $type;
    }
}

if (!function_exists("custom_trans")) {
    /**
     * @param string $key
     * @return Locale
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    function custom_trans(string $key): Locale
    {
        return app(LocaleManager::class)->getTranslation(
            $key,
            session()->get('locale'),
        );
    }
}

if (!function_exists("filter_url")) {
    function filter_url(?Category $category, array $params = []): string
    {
        return route('catalog.page', [
            ...request()->only(['sort', 'filters']),
            ...$params,
            'category' => $category,
            'locale' => session()->get('locale'),
        ]);
    }
}

if (!function_exists("localized_route")) {
    function localized_route(string $pageName, array $params = []): string
    {
        return route($pageName, [
            'locale' => session()->get('locale'),
            ...$params,
        ]);
    }
}
