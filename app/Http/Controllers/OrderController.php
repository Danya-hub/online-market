<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderFormRequest;
use Domain\Auth\DTOs\NewUserDTO;
use Domain\Order\Contracts\PlaceOrderContract;
use Domain\Order\DTOs\NewOrderCustomerDTO;
use Domain\Order\DTOs\NewOrderDTO;
use Domain\Order\Models\DeliveryType;
use Domain\Order\Models\PaymentMethod;
use Domain\Order\Processes\AssignCustomer;
use Domain\Order\Processes\AssignProducts;
use Domain\Order\Processes\ChangeStateToPending;
use Domain\Order\Processes\CheckProductQuantities;
use Domain\Order\Processes\ClearCart;
use Domain\Order\Processes\DecreaseProductsQuantities;
use Domain\Order\Processes\OrderProcess;
use Domain\Order\States\PendingOrderState;
use DomainException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Throwable;

class OrderController extends Controller
{
    public function page(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $items = cart()->items();

        if ($items->isEmpty()) {
            throw new DomainException('Корзина пуста');
        }

        return view("order.index", [
            'items' => $items,
            'payments' => PaymentMethod::query()->get(),
            'deliveries' => DeliveryType::query()->get(),
        ]);
    }

    /**
     * @throws Throwable
     */
    public function handle(OrderFormRequest $request, PlaceOrderContract $action): RedirectResponse
    {
        $order = $action(NewOrderDTO::fromRequest($request));

        (new OrderProcess($order))
            ->processes([
                new CheckProductQuantities(),
                new AssignCustomer(
                    NewOrderCustomerDTO::fromArray(request('customer')),
                ),
                new AssignProducts(),
                new ChangeStateToPending(),
                new DecreaseProductsQuantities(),
                new ClearCart(),
            ])
            ->run();

        return redirect()
            ->route('home');
    }
}
