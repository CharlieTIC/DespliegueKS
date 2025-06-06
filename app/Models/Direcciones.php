<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direcciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'description',
        'city',
        'cp',
        'receiver',
        'receiver_info',
        'default',
        ];


    protected $casts = [
        'receiver_info' => 'array',
        'default' => 'boolean',
    ];
                 
}
