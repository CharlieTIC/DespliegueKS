<x-admin-layout :breadcrums="[
    [
        'name' => 'Dashboard',
        'route' => route('dashboard'),
    ],
    [
        'name' => 'Categorias',
        'route' => route('categorias.index'),
    ],
    [
        'name' => 'Nuevo',
    ],
]">

    <div class="card">
        <form action="{{ route('categorias.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <x-label class="mb-2">
                    Categoria
                </x-label>                            
                
                <x-input class="w-full" placeholder="Ingrese el nombre de la categoria" name="nombre"
                    value="{{ old('nombre') }}" />
            </div>

            <div class="flex justify-end">
                <x-button>
                    Guardar
                </x-button>
            </div>
        </form>

    </div>

</x-admin-layout>
