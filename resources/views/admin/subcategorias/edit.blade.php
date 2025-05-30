<x-admin-layout :breadcrums="[
    ['name' => 'Dashboard', 'route' => route('dashboard')],
    ['name' => 'Subcategorías', 'route' => route('subcategorias.index')],
    ['name' => $subcategoria->nombre],
]">

  

        @livewire('admin.subcategorias.subcategoria-edit', ['subcategoria' => $subcategoria])
    

</x-admin-layout>