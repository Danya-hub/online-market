<?php

namespace App\View\Composers;

use App\Menu\Menu;
use App\Menu\MenuItem;
use Illuminate\View\View;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class NavigationComposer
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function compose(View $view): void
    {
        $menu = Menu::make()
            ->add(MenuItem::make(localized_route('home.page'), custom_trans('shared.main')->value))
            ->add(MenuItem::make(localized_route('catalog.page'), 'Каталог'));

        $view->with('menu', $menu);
    }
}
