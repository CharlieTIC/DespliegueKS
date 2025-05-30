<?php

namespace App\Livewire;

use Livewire\Component;
use \Gloudemans\Shoppingcart\Facades\Cart;

class ShoppingCart extends Component
{
    public function mount() {

        Cart::instance ('compra');

    }
    public function render()
    {
        return view('livewire.shopping-cart');
    }

    public function increase($rowId) {

        Cart::instance("compra");    
        Cart::update($rowId, Cart::get($rowId)->qty + 1);

        if (auth()->check()){
        Cart::store(auth()->id());
        }

        $this->dispatch('actualizarCarrito', Cart::count());

    }

        public function decrease($rowId) {

        Cart::instance("compra");   
        $item = Cart::get($rowId);
        
        if ($item->qty > 1) {
            Cart::update($rowId, $item->qty -1);
            } else {
                Cart::remove($rowId);
        }

        if (auth()->check()){
        Cart::store(auth()->id());
        }

        $this->dispatch('actualizarCarrito', Cart::count());

    }

        public function remove($rowId)
    {
                Cart::instance("compra");   
                Cart::remove($rowId);

        if (auth()->check()){
        Cart::store(auth()->id());
        }

        $this->dispatch('actualizarCarrito', Cart::count());

    }

        public function destroy()
    {
        Cart::instance("compra");   
        Cart::destroy();

        if (auth()->check()){
        Cart::store(auth()->id());
        }

        $this->dispatch('actualizarCarrito', Cart::count());

    }
}
