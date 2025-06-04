<?php

namespace App\Livewire;

use App\Livewire\Forms\CreateDireccionForm;
use Livewire\Component;
use App\Models\Direcciones;

class CompraDirecciones extends Component
{

    public $direccion;

    public $newDireccion = false;

    public CreateDireccionForm $createDireccionForm;

    public function mount() {
        $this->direccion = Direcciones::where('user_id', auth()->id())->get();

        $this->createDireccionForm->receiver_info = [
            'name' => auth()->user()->name,
            'last_name' => auth()->user()->last_name,
            'document_type' => auth()->user()->document_type,
            'document_number' => auth()->user()->document_number,
            'phone' => auth()->user()->phone,

        ];
    }
    public function render()
    {
        return view('livewire.compra-direcciones');
    }

    public function setDefaultDireccion($id) {

        $this->direccion->each(function($direccion)use ($id) {
            $direccion->update([
                'default' => $direccion->id == $id
            ]);
        });

    }

    public function deleteDireccion($id) {

        Direcciones::find($id)->delete();
        $this->direccion = Direcciones::where('user_id', auth()->id())->get();

        if($this->direccion->where('default', true )->count () == 0) {
            $this->direccion->first()->update(['default' => true]);

    }
}

    public function store() {

        $this->createDireccionForm->save();
         $this->direccion = Direcciones::where('user_id', auth()->id())->get();
         $this->newDireccion = true;
    }
}
