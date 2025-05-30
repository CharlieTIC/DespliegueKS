<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Listamos todos los producto
        $productos = Producto::orderBy('id', 'desc')
        ->paginate();

        return view('admin.productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
        return view('admin.productos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
        return view('admin.productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //Retornamos mensaje eliminar el producto
       Storage::delete($producto->image_path);

        $producto->delete();

        session()->flash('swal',[
            'icon' => 'success',
            'title' => 'Eliminado',
            'text' => 'El producto se ha eliminado correctamente'
            
        ]);
       return redirect()->route('productos.index');
    }
}
