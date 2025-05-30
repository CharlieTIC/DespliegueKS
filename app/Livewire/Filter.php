<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Livewire\WithPagination;

class Filter extends Component
{

    use WithPagination;
    public $categoria_id;
    public function render()
    {
        $productos = Producto::whereHas('subcategoria.categoria', function($query) {
            $query->where('categoria_id', $this->categoria_id);
        })
        ->paginate(12);

        return view('livewire.filter', compact('productos'));
    }

}
