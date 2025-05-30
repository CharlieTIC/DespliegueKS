<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subcategoria;
use Illuminate\Http\Request;

class SubcategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retorna vista de listado de subcategorias con su relación 'categoria'
        $subcategorias = Subcategoria::with('categoria')
                ->orderBy('id', 'desc')
                ->paginate(10);

        return view('admin.subcategorias.index', compact('subcategorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = \App\Models\Categoria::all();
        return view('admin.subcategorias.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'nombre' => 'required|string|max:255',
        ]);

        Subcategoria::create($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Cambio realizado!',
            'text' => 'Subcategoría creada con éxito.',
        ]);

        return redirect()->route('subcategorias.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(Subcategoria $subcategoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategoria $subcategoria)
    {
        //Retorna vista para editar subcategoria
        $categorias = \App\Models\Categoria::all();
        return view('admin.subcategorias.edit', compact('subcategoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subcategoria $subcategoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategoria $subcategoria)
    {
        // Verificar si la subcategoría tiene productos asociados
        if ($subcategoria->producto()->count() > 0) {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => '¡Ups!',
                'text' => 'No se puede eliminar la subcategoría porque tiene productos asociados.',
            ]);

            return redirect()->route('subcategorias.edit', $subcategoria);
        }

        // Eliminar la subcategoría
        $subcategoria->delete();

        // Mensaje de éxito
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Cambio realizado!',
            'text' => 'Subcategoría eliminada con éxito.',
        ]);

        return redirect()->route('subcategorias.index');
    }
    
}
