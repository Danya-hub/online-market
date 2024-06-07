<section class="mt-4">
    <h1 class="text-4xl font-medium">Оформление заказа</h1>
    <x-form.simple-form
        :action="route('order.handle')"
        method="POST"
        class="columns-2 gap-4 mt-4"
    >
        <div class="columns-2 gap-4">
            @include ('order.sections.contact')
            @include ('order.sections.delivery')
            @include ('order.sections.payment')
        </div>
        @include ('order.sections.total')
    </x-form.simple-form>
</section>
