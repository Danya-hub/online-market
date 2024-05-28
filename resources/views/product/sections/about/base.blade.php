<section class="grid grid-cols-2 gap-10">
    <img class="w-full object-contain rounded-2xl" src="{{ $product->makeThumbnail("345x320") }}"
         alt="{{ $product->title }}">
    <div>
        <h2 class="text-4xl font-medium">{{ $product->title }}</h2>
        <div class="mt-3"></div>
        <div class="mt-3">
            <b class="text-3xl">{{ $product->price }}</b>
        </div>
        <ul class="mt-3 w-2/3">
            @if($product->json_properties)
                @foreach($product->json_properties as $property => $value)
                    <li class="flex justify-between">
                        <b>{{ $property }}:</b>
                        <span class="text-gray-800">{{ $value }}</span>
                    </li>
                @endforeach
            @endif
        </ul>
        <form>
            <div class="flex mt-3">
                @foreach($options as $option => $values)
                    <label class="me-6">
                        <span class="block">{{ $option }}</span>
                        <select class="bg-gray-300 px-3 py-2 rounded mt-2">
                            @foreach($values as $value)
                                <option value="{{ $value->id }}">
                                    {{ $value->title }}
                                </option>
                            @endforeach
                        </select>
                    </label>
                @endforeach
            </div>
        </form>
        <div class="flex mt-5">
            <div class="flex me-2">
                <button type="button" class="bg-gray-300 px-3 py-2 rounded ">-</button>
                <input type="number" value="1" name="" class="bg-gray-300 px-3 py-2 rounded w-16 mx-1 text-center">
                <button type="button" class="bg-gray-300 px-3 py-2 rounded ">+</button>
            </div>
            <button type="button" class="block bg-green-400 rounded px-3 py-2 me-2 font-medium">Добавить в корзину
            </button>
            <button type="button" class="bg-red-400 rounded p-2">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z"/>
                </svg>
            </button>
        </div>
    </div>
</section>
