<div>
    <div class="grid grid-cols-1 lg:grid-cols-7 gap-6">
        {{-- Columna izquierda: Carrito --}}
        <div class="lg: col-span-5">
            <div class="flex justify-between mb-2">
                <h1 class="text-md">
                    Carrito de compras ({{ Cart::count() }} productos)
                </h1>

                <button class="font-semibold text-gray-700 underline hover:text-blue-600 hover:no-underline"
                wire:click="destroy()">
                    Limpiar carrito
                </button>
            </div>

            <div class="card">
                <ul class="space-y-4">
                    @forelse (Cart::instance('compra')->content() as $item)
                        <li class="lg:flex">
                            <img alt="imagenCarrito" class="w-full lg:w-36 aspect-[16/9] object-cover object-center mr-2" src="{{ $item->options->image }}">
                        
                            <div class="w-80">
                                <p class="text-sm">
                                    <a href="{{ route('producto.show', $item->id) }}">
                                        {{ $item->name }}
                                    </a>
                                </p>

                                <button class="bg-red-100 hover:bg-red-400 text-red-800 text-xs font-semibold rounded px-2.5 py-0.5"
                                wire:click="remove('{{$item->rowId}}')">
                                    <i class="fa-solid fa-xmark"></i>
                                    Eliminar
                                </button>
                            </div>

                            <p class="ml-4">
                                {{ $item->price }} €
                            </p>

                            <div class="ml-auto space-x-2">
                                <button class="btn btn-gris"
                                wire:click="decrease('{{$item->rowId}}')"
                                >-</button>
                                <span class="inline-block w-2 text-center">{{ $item->qty }}</span>
                                <button class="btn btn-gris"
                                wire:click="increase('{{$item->rowId}}')"
                                >+</button>
                            </div>
                        </li>
                    @empty
                        <p class="text-center">
                            No hay productos en el carrito
                        </p>
                    @endforelse
                </ul>
            </div>
        </div>

        {{-- Columna derecha: Total y botón --}}
        <div class="lg:col-span-2">
            <div class="card">
                <div class="flex justify-between font-semibold mb-2">
                    <p>Total:</p>
                    <p>{{ Cart::subtotal() }} €</p>
                </div>

                <a href="" class="btn btn-gray block w-full text-center">
                    Continuar compra
                </a>
            </div>
        </div>
    </div>
</div>
