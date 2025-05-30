<?php

namespace App\Livewire;

use App\Models\Categoria;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Navigation extends Component
{   
    public $categorias;

    public $categoria_id;

    public function mount() {
        $this->categorias = \App\Models\Categoria::all();
        $this->categoria_id = $this->categorias->first()->id;
    }

    #[Computed()]
    public function subcategorias() {
        return \App\Models\Subcategoria::where('categoria_id', $this->categoria_id)
        
        ->get();
    }

    #[Computed]
    public function categoriaNombre() {
        return Categoria::find($this->categoria_id)?->nombre;
    }


    public function render()
    {
        return view('livewire.navigation');
    }
}
