<x-app-layout>

    <x-container class="mt-12">

        <div class="grid grid-cols-3 gap-6">

            <div class="col-span-2">

                @livewire('compra-direcciones')

            </div>

            <div class="col-span-1">


                <div class="bg-white rounded-lg shadow overflow-hidden mb-4">
                    <div class="bg-blue-900 text-white p-4 flex justify-between items-center">
                        <p class="font-semibold">
                            Resumen de compra ({{ Cart::instance('compra')->count() }})
                        </p>

                        <a href="{{ route('cart.index') }}" class="fa-solid fa-cart-shopping" title="Ver carrito"></a>
                    </div>

                    <div class="p-4 text-gray-600">


                        <ul>

                            @foreach (Cart::content() as $item)
                                <li class="flex items-center space-x-4">
                                    <figure class="shrink-0">
                                        <img class="h-12 aspect-square" src="{{ $item->options->image }}" />
                                    </figure>
                                    <div class="flex-1">
                                        <p class="text-sm">
                                            {{ $item->name }}
                                        </p>


                                        <p>
                                            {{ $item->price }} €
                                        </p>
                                    </div>
                                    <div>
                                        <p>
                                            {{ $item->qty }}
                                        </p>
                                    </div>
                    </div>
                    </li>
                    @endforeach


                    </ul>

                    <hr class="my-4">

                    <div class="flex justify-between">
                        <p class="text-lg">
                            Total
                        </p>
                        <p>
                            {{ Cart::subtotal() }} €
                        </p>
                    </div>
                </div>

                <a href="" class="btn btn-bluedark block w-full text-center">Realizar compra </a>
            </div>


        </div>


        </div>


    </x-container>
</x-app-layout>
