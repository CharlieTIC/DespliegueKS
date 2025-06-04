<div>

    <section class="bg-white rounded-lg shadow overflow-hidden">

        <header class="bg-gray-900 px-4 py-2">
            <h2 class="text-white text-lg">
                Direcciones de envío
            </h2>
        </header>

        <div class="p-4">

            @if ($newDireccion)



                <div class="grid grid-cols-4 gap-4">

                    <div class="col-span-1">
                        <x-select wire:model="createDireccionForm.type">

                            <option value="">
                                Tipo de dirección
                            </option>

                            <option value="1">
                                Domicilio
                            </option>

                            <option value="2">
                                Oficina
                            </option>

                        </x-select>

                    </div>
                    {{-- Descripción de la direccion --}}
                    <div class="col-span-3 ">
                        <x-input wire:model="createDireccionForm.description" class="w-full" type="text"
                            placeholder="Nombre de la calle, número, portal" />

                    </div>

                    {{-- Ciudad --}}
                    <div class="col-span-3 ">
                        <x-input wire:model="createDireccionForm.city" class="w-full" type="text"
                            placeholder="Población" />
                    </div>

                    {{-- Codigo postal --}}
                    <div class="col-span-3 ">
                        <x-input wire:model="createDireccionForm.cp" class="w-full" type="text" placeholder="CP" />
                    </div>

                </div>

                <hr class="my-4">
                <div x-data="{
                    receiver: @entangle('createDireccionForm.receiver'),
                    receiver_info: @entangle('createDireccionForm.receiver_info'),
                }" x-init="$watch('receiver', value => {
                    if (value == 1) {
                        receiver_info.name = '{{ auth()->user()->name }}';
                        receiver_info.last_name = '{{ auth()->user()->last_name }}';
                        receiver_info.document_type = '{{ auth()->user()->document_type }}';
                        receiver_info.document_number = '{{ auth()->user()->document_number }}';
                        receiver_info.phone = '{{ auth()->user()->phone }}';
                    } else {
                        receiver_info.name = '';
                        receiver_info.last_name = '';
                        receiver_info.document_number = '';
                        receiver_info.phone = '';
                    }
                })">

                    <div>
                        <p class="font-semibold mb-2">
                            ¿Quien recibe el pedido?
                        </p>
                        <div class="flex space-x-2">
                            <label class="flex items-center">
                                <input x-model="receiver" type="radio" value="1" class="mr-1">
                                Yo recibiré el pedido</label>
                            <label class="flex items-center">
                                <input x-model="receiver" type="radio" value="2" class="mr-1">
                                Otra persona</label>

                        </div>

                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <x-input x-model="receiver_info.name" class="w-full" placeholder="Nombre" />
                            </div>
                            <div>
                                <x-input x-model="receiver_info.last_name" class="w-full" placeholder="Apellidos" />
                            </div>
                            <div>
                                <div class="flex space-x-2">
                                    <x-select x-model="receiver_info.document_type">
                                        @foreach (\App\Enums\TypeOfDocuments::cases() as $item)
                                            <option value="{{ $item->value }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </x-select>
                                    <x-input x-model="receiver_info.document_number" class="w-full"
                                        placeholder="Número documento" />
                                </div>

                            </div>
                            <div><x-input x-model="receiver_info.phone" class="w-full" placeholder="Teéfono" /> </div>
                            <div>
                                <button class="btn btn-outline-gray w-full" wire:click="$set('newDireccion', false)">
                                    Cancelar
                                </button>
                            </div>
                            <div><button wire:click="store" class="btn btn-blue w-full">Guardar</button> </div>
                        </div>
                    </div>
                </div>
            @else
                @if ($direccion->count())
                    <ul class="grid grid-cols-3 gap-4">
                        @foreach ($direccion as $item)
                            <li class="{{ $item->default ? 'bg-slate-200' : 'bg-white' }} rounded-lg shadow"
                                wire:key="direccion-{{ $item->id }}">
                                <div class="p-4 flex items-center">
                                    <div>
                                        <i class="fa-solid fa-house text-xl text-blue-900"></i>
                                    </div>
                                    <div class="flex-1 mx-4 text-xs">
                                        <p class="text-blue-600">
                                            {{ $item->type == 1 ? 'Domicilio' : 'Oficina' }}
                                        </p>
                                        <p class="text-gray-700 font-semibold">
                                            {{ $item->city }}
                                        </p>
                                        <p class="text-gray-700 font-semibold">
                                            {{ $item->description }}
                                        </p>
                                        <p class="text-gray-700 font-semibold">
                                            {{ $item->receiver_info['name'] ?? '—' }}
                                        </p>
                                    </div>

                                    <div class="text-xs text-gray-800 flex flex-col">
                                        <button wire:click="setDefaultDireccion({{ $item->id }})">
                                            <i class="fa-solid fa-star"></i>
                                        </button>

                                        <button>
                                            <i class="fa-solid fa-pencil"></i>
                                        </button>

                                        <button wire:click="deleteDireccion({{ $item->id }})">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-center">No se ha encontrado direcciones para el envío</p>
                @endif
                <button class="btn-outline-gray w-full flex items-center justify-center mt-4"
                    wire:click="$set('newDireccion', true)">
                    Agregar <i class="fa-solid fa-plus ml-2"></i>
                </button>
            @endif
        </div>

    </section>

</div>
