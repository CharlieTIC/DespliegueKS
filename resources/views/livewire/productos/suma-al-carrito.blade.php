    <x-container>

        <div class="card">

            <div class="grid md:grid-cols-2 gap-6">

                <div class="col-span-1">

                    <figure class="mb-2">
                        <img src="{{ $producto->image }}" alt=""
                            class="aspect-[5/4] w-full object-cover object-center">
                        </img>
                    </figure>

                    <div class="text-sm">
                        {{ $producto->descripcion }}
                    </div>


                </div>
                <div class="col-span-1">
                    <h1 class="text-xl text-gray-700 mb-2">{{ $producto->nombre }}</h1>
                    <div class="flex space-x-2 items-center mb-4">
                        <ul class="flex space-x-1">
                            <li>
                                <i class="fa-solid fa-star text-yellow-400"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star text-yellow-400"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star text-yellow-400"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star text-yellow-400"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star text-yellow-400"></i>
                            </li>
                        </ul>
                        <p class="text-sm text-gray-700">4.7 (55)</p>
                    </div>
                    <p class="font-semibold text-2xl text-red-600">
                        {{ $producto->precio }} €
                    </p>
                    <br>

                    <div class="flex space-x-6 mb-6" x-data="{
                        qty: @entangle('qty')
                    
                    }">

                        <button class="btn btn-gris"
                        x-on:click="qty = qty - 1"
                        x-bind:disabled="qty == 1">
                            -
                        </button>

                        <span x-text="qty" class="inline-block w-2 text-center"></span>

                        <button class="btn btn-gris"
                        x-on:click="qty = qty + 1">
                            +
                        </button>
                    </div>

                    <button class="btn btn-bluedark w-full mb-6"
                    wire:click="suma_al_carrito"
                    wire:wire:loading.att="disabled">
                        Agregar al carrito

                    </button>
                    <div class="text-gray-700 flex items-center space-x-4">
                        <i class="fa-solid fa-truck-fast text-2xl"></i>
                        <p>Envio a domicilio</p>
                    </div>
                </div>
            </div>
        </div>

    </x-container>
