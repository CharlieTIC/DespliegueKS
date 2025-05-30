<x-admin-layout :breadcrums="[
    [
        'name' => 'Dashboard',
        'route' => route('dashboard'),
    ],
    [
        'name' => 'Productos',
        'route' => route('productos.index'),
    ],
    [
        'name' => $producto->nombre,
    ]
]">
    
    
    @livewire('admin.productos.producto-edit', ['producto' => $producto])
    



</x-admin-layout>