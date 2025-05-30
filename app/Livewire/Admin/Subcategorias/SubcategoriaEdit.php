<?php

namespace App\Livewire\Admin\Subcategorias;

use App\Models\Categoria;
use App\Models\Subcategoria;
use Livewire\Component;

class SubcategoriaEdit extends Component
{
    public Subcategoria $subcategoria;
    public $categorias = [];

    public $subcategoriaEdit = [
        'categoria_id' => '',
        'nombre' => ''
    ];

    public function mount(Subcategoria $subcategoria)
    {
        $this->subcategoria = $subcategoria;

        $this->categorias = \App\Models\Categoria::all();

        $this->subcategoriaEdit = [
            'categoria_id' => $subcategoria->categoria_id,
            'nombre' => $subcategoria->nombre
        ];
    }

    public function save()
    {
        $this->validate([
            'subcategoriaEdit.categoria_id' => 'required|exists:categorias,id',
            'subcategoriaEdit.nombre' => 'required|string|max:255',
        ]);

        $this->subcategoria->update($this->subcategoriaEdit);

        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Cambio realizado!',
            'text' => 'Subcategoría actualizada con éxito.',
        ]);

        return redirect()->route('subcategorias.index');
    }

    public function render()
    {
        return view('livewire.admin.subcategorias.subcategoria-edit');
    }
}