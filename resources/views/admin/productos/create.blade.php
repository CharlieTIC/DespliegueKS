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
        'name' => 'Nuevo'
    ]
]">
    
    
    @livewire('admin.productos.producto-create')
    



</x-admin-layout>
