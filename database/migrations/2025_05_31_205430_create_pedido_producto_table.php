<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoProductoTable extends Migration
{
    public function up()
    {
        Schema::create('pedido_producto', function (Blueprint $table) {
            $table->id();

            // Foreign keys
            $table->foreignId('pedido_id')->constrained()->onDelete('cascade');
            $table->foreignId('producto_id')->constrained()->onDelete('cascade');

            // Datos adicionales en la relación
            $table->integer('cantidad');
            $table->decimal('precio_unitario', 8, 2);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pedido_producto');
    }
}