<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    // Relacion uno a muchos
    //public function subcategoria(){
      //  return $this->hasMany(Subcategoria::class);
    //}

    public function subcategorias()
{
    return $this->hasMany(\App\Models\Subcategoria::class);
}



    protected $fillable = [
        'nombre'
    ];        


}
