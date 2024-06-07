<div class="order-card mt-4">
    <h3 class="order-title">Метод оплаты</h3>
    <div>
        @foreach($payments as $payment)
            <x-form.radio
                class="block"
                name="payment_method_id"
                value="{{ $payment->id }}"
                :checked="$loop->first || old('payment_method_id') === $payment->id"
            >{{ $payment->title }}
            </x-form.radio>
        @endforeach
    </div>
</div>
