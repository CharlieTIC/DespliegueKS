<div x-data="{
    open: false,
}">
    <header class="bg-blue-900">
        <x-container class="px-4 py-5">
            <div class="flex items-center">
                {{-- Menú + Logo --}}
                <div class="flex items-center space-x-8">
                    <button class="text-3xl" x-on:click="open = true">
                        <i class="fas fa-bars text-white"></i>
                    </button>

                    <h1 class="text-white">
                        <a href="/" class="inline-flex flex-col items-end">
                            <span class="text-3xl font-semibold">
                                KodeShop
                            </span>
                            <span class="text-xs">
                                Ecommerce-cms
                            </span>
                        </a>
                    </h1>
                </div>
                <!-- Buscador productos -->
                <!-- <div class="flex-1">
                    <x-input class="w-full" placeholder="Buscar producto" />
                </div> -->

                <!-- Icono usuario y carrito alineados a la derecha -->
                <div class="flex items-center space-x-6 ml-auto">
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button class="text-2xl md:text-3xl">
                                <i class="fas fa-user text-white"></i>
                            </button> 
                        </x-slot>
                        <x-slot name="content">

                            @guest

                                <div class="px-4 py-2">
                                    <div class="flex justify-center">
                                        <a href="{{ Route('login') }}" class="btn btn-blue">
                                            Iniciar sesión
                                        </a>
                                    </div>
                                    <p class="text-sm text-center mt-2">
                                        ¿No tiene cuenta? <a href="{{ Route('register') }}"
                                            class="text-blue-900 hover:underline">Registrate</a>
                                    </p>
                                </div>
                            @else
                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    Mi perfil
                                </x-dropdown-link>

                                 {{-- Enlace al panel ADMINISTRADOR - Solo visible para usuarios admin --}}
                                @if (auth()->user()?->is_admin)
                                    <x-dropdown-link href="{{ route('dashboard') }}">
                                        Panel de administración
                                    </x-dropdown-link>
                                @endif

                                <div class="boder-t border-gray-200"></div>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            @endguest
                        </x-slot>
                    </x-dropdown>
                    <a href="{{route('cart.index')}}" class="relative">
                        <i class="fas fa-shopping-cart text-white text-3xl"></i>
                        <span 
                        id="cart-count"
                        class="absolute -top-2 -end-4 inline-flex items-center justify-center w-6 h-6 bg-red-500 rounded-full text-xs font-bold text-white">
                            {{Cart::instance('compra')->count()}}
                        </span>
                    </a>
                </div>
            </div>
        </x-container>
    </header>

    <div x-show="open" x-on:click="open = false" style="display : none" class="fixed top-0 left-0 inset-0 bg-black bg-opacity-25 z-10">  <div x-show="open" style="display: none" class="fixed top-0 left-0 z-20">

            <div class="flex">
                <div class="w-full md:w-80 h-screen bg-white">

                    <div class="bg-blue-900 px-4 py-3 text-white font-semibold">

                        <div class="flex justify-between items-center">
                            <span class="text-lg">
                                KodeShop MENÚ
                            </span>
                            <button x-on:click="open = false">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="h-[calc(100vh-53px)] overflow-auto">


                        <ul>
                            @foreach ($categorias as $categoria)
                                <li wire:mouseover="$set('categoria_id', {{ $categoria->id }})">
                                    <a href="{{ route('categorias.show', $categoria) }}" class="flex items-center justify-between px-4 py-4 text-gray-900 hover:bg-blue-600">
                                        {{ $categoria->nombre }}
                                        <i class="fas-solid fa-angle-right"></i>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                                <div class="w-80 xl:w-[57rem] pt-[53px] hidden md:block">
                    <div class="bg-white h-[calc(100vh-53px)] overflow-auto px-6 py-8">
                        <div class="mb-8 flex justify-between items-center">
                                                        <p class="border-b-[3px] border-black uppercase text-xl font-semibold pb-1">
                                {{ $this->categoriaNombre() }}</p>

                            <a href="{{ route('categorias.show', ['categoria' => $categoria_id]) }}" class="btn btn-bluedark">
                                Ver todos
                            </a>
                        </div>

                        <ul class="grid grid-cols-1 gap-8">
                            @foreach ($this->subcategorias as $subcategoria)
                                <li>
                                    <a href="" class="text-blue-900 font-semibold text-lg">
                                        {{ $subcategoria->nombre }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>

    Livewire.on('actualizarCarrito', (count) => {
       document.getElementById('cart-count').innerText = count;
    });

    </script>
    
@endpush