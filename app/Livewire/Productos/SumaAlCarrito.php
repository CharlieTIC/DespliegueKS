<?php

namespace App\Livewire\Productos;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class SumaAlCarrito extends Component
{
    public $producto;

    public $qty = 1;

    public function suma_al_carrito() {

        Cart::instance('compra');
        
        Cart::add([
            'id'    => $this->producto->id,
            'name'  => $this->producto->nombre,
            'qty'   => $this->qty,
            'price' => $this->producto->precio,
            'options' => [
                'image' => $this->producto->image,
                'sku'   => $this->producto->sku,
            ]
        ]);

        if (auth()->check()){
        Cart::store(auth()->id());
        }

        $this->dispatch('actualizarCarrito', Cart::count());

        $this->dispatch('swal',[
            'icon' => 'success',
            'title' => 'Producto agregado al carrito',
            'text' => 'El producto ha sido agregado al carrito'
            ]);
        
        

    }
    public function render()
    {
        return view('livewire.productos.suma-al-carrito');
    }
}
