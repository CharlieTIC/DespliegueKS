<div class="card p-6">
    <form wire:submit.prevent="save" class="space-y-6">
        {{-- Select de Categorías --}}
        <div>
            <x-label for="categoria_id">Categoría</x-label>
            <select
                wire:model="subcategoriaEdit.categoria_id"
                id="categoria_id"
                class="w-full mt-1 border-gray-300 rounded-md shadow-sm"
            >
                <option value="">Seleccione una categoría</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
            @error('subcategoriaEdit.categoria_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Campo Nombre --}}
        <div>
            <x-label for="nombre">Nombre de la Subcategoría</x-label>
            <x-input
                wire:model="subcategoriaEdit.nombre"
                id="nombre"
                type="text"
                class="w-full mt-1"
                placeholder="Ej: Teléfonos inteligentes"
            />
            @error('subcategoriaEdit.nombre')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Botones --}}       
                <div class="flex justify-end">
                <x-danger-button onclick="confirmDelete()">
                    Eliminar
                </x-danger-button>
                <x-button class="ml-2">
                    Actualizar
                </x-button>
            </div>
        
    </form>

        <form action="{{ route('subcategorias.destroy', $subcategoria) }}" method="POST" id="delete-form">

        @csrf

        @method('DELETE')

    </form>

        @push('js')
        <script>
            function confirmDelete() {
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "¡Sí, eliminar!",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                       document.getElementById('delete-form').submit(); 
                    }
                        });
                        
                    }
              
        </script>
    @endpush
</div>