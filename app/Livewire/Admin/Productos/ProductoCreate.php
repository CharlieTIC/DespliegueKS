<?php

namespace App\Livewire\Admin\Productos;

use App\Models\Producto;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;

class ProductoCreate extends Component
{
    use WithFileUploads;

    public $categorias = [];
    public $categoria_id = '';
    public $subcategoria_id = '';
    public $image;
    public $producto = [
        'sku' => '',
        'nombre' => '',
        'descripcion' => '',
        'image_path' => '',
        'precio' => '',
        'subcategoria_id' => '',
    ];

public function mount() {
    $this->categorias = \App\Models\Categoria::all();

    // Puedes hacer un log para verificar:
    logger('Categorias:', [$this->categorias]);
}



#[Computed()]
public function subcategorias()
{
    if (!$this->categoria_id) {
        return collect(); // Colección vacía para evitar error en foreach
    }

    return \App\Models\Subcategoria::where('categoria_id', $this->categoria_id)->get();
}

public function store()
{
    $this->producto['subcategoria_id'] = $this->subcategoria_id;

    $this->validate([
        'image' => 'nullable|image|max:2048',
        'producto.sku' => ['required', Rule::unique('productos', 'sku')],
        'producto.nombre' => 'required|max:255',
        'producto.descripcion' => 'nullable',
        'producto.precio' => 'required|numeric|min:0',
        'producto.subcategoria_id' => 'required',
    ]);

    if ($this->image) {
        $this->producto['image_path'] = $this->image->store('productos', 'public');
    }

    \App\Models\Producto::create($this->producto);

    $this->reset(); // Limpia el formulario

    session()->flash('swal', [
        'icon' => 'success',
        'title' => 'Producto creado',
        'text' => 'El producto se ha creado correctamente',
    ]);

    return redirect()->route('productos.index'); 
    
}

    public function render()
    {
        return view('livewire.admin.productos.producto-create');
    }
}
