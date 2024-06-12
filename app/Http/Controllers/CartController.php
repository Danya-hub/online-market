<?php

namespace App\Http\Controllers;

use Domain\Cart\Models\CartItem;
use Domain\Product\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class CartController extends Controller
{
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view("cart.index", [
            'items' => cart()->items(),
        ]);
    }

    public function add(Product $product): RedirectResponse
    {
        cart()->add(
            $product,
            request('quantity', 1),
            request('options', []),
        );
        flash()->info('Товар был добавлен в корзину');

        return redirect()
            ->intended(localized_route('cart.page'));
    }

    public function delete(CartItem $item): RedirectResponse
    {
        cart()->delete($item);
        flash()->info('Удалено из корзины');

        return redirect()
            ->intended(localized_route('cart.page'));
    }

    public function quantity(CartItem $item): RedirectResponse
    {
        cart()->quantity(
            $item,
            request('quantity', 1),
        );
        flash()->info('Кол. товаров изменено');

        return redirect()
            ->intended(localized_route('cart.page'));
    }

    public function truncate(): RedirectResponse
    {
        cart()->truncate();
        flash()->info('Корзина очищена');

        return redirect()
            ->intended(localized_route('cart.page'));
    }
}
