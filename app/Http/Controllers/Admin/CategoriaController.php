<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $categorias = Categoria::orderBy('id','desc')
        ->paginate(10);
        return view('admin.categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.categorias.create');
    }

    /**
     * Método store para guardar un nuevo registro de categoria y retorna en la vista categoria.index
     */
    public function store(Request $request)
    {   
        $request->validate([
            'nombre' => 'required',
        ]);

        Categoria::create($request->only('nombre'));

                    session()->flash('swal',[
                'icon' => 'success',
                'title' => '¡Cambio realizado!',
                'text' => 'Categoría creada con éxito.',
            ]);

        return redirect()->route('categorias.index');
    }

    /**
     * Display the specified resource.
     */
        public function show (Categoria $categoria) {

        return view('categorias.show', compact('categoria'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        //
         return view('admin.categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
            $request->validate([
            'nombre' => 'required',
             ]);

            $categoria->update($request->only('nombre'));

            session()->flash('swal',[
                'icon' => 'success',
                'title' => '¡Cambio realizado!',
                'text' => 'Categoría actualizada con éxito.',
            ]);

            return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        //

            if ($categoria->subcategorias->count() > 0) {

                session()->flash('swal',[
                'icon' => 'error',
                'title' => '¡Ups!',
                'text' => 'No se puede eliminar categoria porque tiene subcategorias asociadas.',
            ]);

            return redirect()->route('categorias.edit', $categoria);

            }

            $categoria->delete();

            
            session()->flash('swal',[
                'icon' => 'success',
                'title' => '¡Cambio realizado!',
                'text' => 'Categoría eliminada con éxito.',
            ]);

            return redirect()->route('categorias.index')->with('success', 'Categoría eliminada correctamente.');
    }
}
