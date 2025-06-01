<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Producto;
use App\Models\User;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'estado',
        'total',
        'fecha_pedido'
    ];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'pedido_producto')
                    ->withPivot('cantidad', 'precio_unitario')
                    ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}