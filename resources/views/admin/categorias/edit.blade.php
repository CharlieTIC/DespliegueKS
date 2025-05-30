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
        'name' => $categoria->nombre,
    ],
]">

    <div class="card">
        <form action="{{ route('categorias.update', $categoria) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <x-label class="mb-2">Nombre</x-label>
                <x-input class="w-full" placeholder="Ingrese el nombre de la categoria" name="nombre"
                    value="{{ old('nombre', $categoria->nombre) }}" />
            </div>

            <div class="flex justify-end">
                <x-danger-button onclick="confirmDelete()">
                    Eliminar
                </x-danger-button>
                <x-button class="ml-2">
                    Actualizar
                </x-button>
            </div>
        </form>
    </div>

    <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" id="delete-form">

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



</x-admin-layout>
