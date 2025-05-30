<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    // Relacion uno a mucho inversa
   // public function categoria(){
     //   return $this->belongsTo(Categoria::class);
    //}

    public function categoria()
{
    return $this->belongsTo(\App\Models\Categoria::class);
}

    // Relacion uno a muchos con Producto
    public function producto(){
        return $this->hasMany(Producto::class);
    }

        protected $fillable = [
        'nombre',
        'categoria_id'
    ];      
}
