<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductController extends Controller
{
    public function show(Producto $producto)    {
    return view('product.show', compact('producto'));

    }

}
