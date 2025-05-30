<x-admin-layout :breadcrums="[
    [
        'name' => 'Dashboard',
        'route' => route('dashboard'),
    ],
    [
        'name' => 'Subcategorias',
        'route' => route('subcategorias.index'),
    ],
    [
        'name' => 'Nuevo', 
    ],
]">

    <div class="card">
        <form action="{{ route('subcategorias.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <x-label class="mb-2">
                    Subcategoría
                </x-label>

                <x-select name="categoria_id" class="w-full">
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" @selected(old('categoria_id') == $categoria->id)>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </x-select>
            </div>

            <div class="mb-4">
                <x-label class="mb-2">
                    Nombre de la subcategoría
                </x-label>

                <x-input 
                    class="w-full"
                    placeholder="Ingrese el nombre de la subcategoría"
                    name="nombre"
                    value="{{ old('nombre') }}" 
                />
            </div>

            <div class="flex justify-end">
                <x-button>
                    Guardar
                </x-button>
            </div>
        </form>
    </div>

</x-admin-layout>
