<?php

namespace App\Livewire\Forms;

use App\Enums\TypeOfDocuments;
use App\Models\Direcciones;
use Illuminate\Validation\Rules\Enum;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateDireccionForm extends Form
{
    public $type = '1';
    public $description= '';

    public $city = '';

    public $cp = '';

    public $receiver = '1';
    
    public $receiver_info = [];

    public $default = false;


    public function rules (): array
    {
        return [
            'type' => 'required|in:1,2',
            'description' => 'required|string|min:3|max:255',
            'city' => 'required|string',
            'cp' => 'required|string',
            'receiver' => 'required|in:1,2',
            'receiver_info' => 'required|array',
            'receiver_info.name' => 'required|string',
            'receiver_info.last_name' => 'required|string',
            'receiver_info.document_type' => [
                'required',
                new Enum(TypeOfDocuments::class)
            ],
            'receiver_info.document_number' => 'required|string',
            'receiver_info.phone' => 'required|string',
            'default' => 'required|boolean',
            ];

}


public function save(){
    // Si el formulario indica que esta dirección será la por defecto,
    // primero reseteamos todas las demás direcciones para este usuario
    if ($this->default) {
        Direcciones::where('user_id', auth()->id())->update(['default' => false]);
    } else {
        // Si no es default, y no hay direcciones para el usuario, esta será la default
        if(auth()->user()->direcciones()->count() === 0) {
            $this->default = true;
        }
    }

    $this->validate();

    Direcciones::create([
        'user_id' => auth()->id(),
        'type' => $this->type,
        'description' => $this->description,
        'city' => $this->city,
        'cp' => $this->cp,
        'receiver' => $this->receiver,
        'receiver_info' => $this->receiver_info,
        'default' => $this->default,
    ]);

    $this->reset();

    $this->receiver_info = [
        'name' => auth()->user()->name,
        'last_name' => auth()->user()->last_name,
        'document_type' => auth()->user()->document_type,
        'document_number' => auth()->user()->document_number,
        'phone' => auth()->user()->phone,
    ];
}
}