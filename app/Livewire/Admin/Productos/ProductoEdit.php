<?php

namespace App\Livewire\Admin\Productos;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Subcategoria;

class ProductoEdit extends Component
{
    use WithFileUploads;

    public $producto;
    public $productoEdit;

    public $categorias;
    public $subcategorias = [];

    public $categoria_id = '';
    public $subcategoria_id = '';
    public $image;

    public function mount(Producto $producto)
    {
        $this->producto = $producto;

        $this->productoEdit = $producto->only('sku', 'nombre', 'descripcion', 'image_path', 'precio', 'subcategoria_id');
        $this->subcategoria_id = $producto->subcategoria_id ?? '';
        $this->categoria_id = optional($producto->subcategoria)->categoria_id ?? '';

        $this->categorias = Categoria::all();
        $this->subcategorias = $this->categoria_id
            ? Subcategoria::where('categoria_id', $this->categoria_id)->get()
            : [];
    }

    public function updatedCategoriaId($value)
    {
        $this->subcategorias = Subcategoria::where('categoria_id', $value)->get();
        $this->subcategoria_id = '';
    }

    public function store()
    {
        $this->validate([
            'productoEdit.sku' => 'required',
            'productoEdit.nombre' => 'required',
            'productoEdit.descripcion' => 'nullable',
            'productoEdit.precio' => 'required|numeric',
            'subcategoria_id' => 'required|exists:subcategorias,id',
            'image' => 'nullable|image|max:2048',
        ]);

        // Guardar nueva imagen si fue actualizada
        if ($this->image) {
            if ($this->producto->image_path) {
                Storage::delete($this->producto->image_path);
            }

            $path = $this->image->store('productos');
            $this->productoEdit['image_path'] = $path;
        }

        $this->producto->update(array_merge(
            $this->productoEdit,
            ['subcategoria_id' => $this->subcategoria_id]
        ));

        session()->flash('message', 'Producto actualizado correctamente.');
        return redirect()->route('productos.index');
    }

    public function render()
    {
        return view('livewire.admin.productos.producto-edit');
    }
}