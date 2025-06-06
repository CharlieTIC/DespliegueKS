<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;
class Producto extends Model
{
    use HasFactory;
    public $timestamps = false;

    // Relacion uno a muchos inversa

    public function subcategoria(){
        return $this->belongsTo(Subcategoria::class);
    }

    public function pedidos()
    {
    return $this->belongsToMany(Pedido::class, 'pedido_producto')
                ->withPivot('cantidad', 'precio_unitario')
                ->withTimestamps();
    }

        protected $fillable = [
        'sku',
        'nombre',
        'descripcion',
        'image_path',
        'precio',        
        'subcategoria_id'
    ];      

         protected function image (): Attribute {

        return Attribute::make(
            get: fn() => Storage::url($this->image_path),
        );

     }

          public function getImageAttribute()
    {
        return asset('storage/' . $this->image_path);
    }
    
}
