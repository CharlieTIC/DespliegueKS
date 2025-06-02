<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cover;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $covers = Cover::orderBy('order')->get();
        return view('admin.covers.index', compact('covers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.covers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $data = $request->validate([
        'image' => 'required|image|max:1024',
        'title' => 'required|string|max:255',
        'start_at' => 'required|date',
        'end_at' => 'nullable|date|after_or_equal:start_at',
        'is_active' => 'required|boolean',
    ]);

    // Guarda la imagen en disco 'public' dentro de la carpeta 'covers'
    $path = $request->file('image')->store('covers', 'public');

    // Asigna la ruta relativa al campo 'image' que usa tu vista
    $data['image'] = $path;

    // Crea el cover
    $cover = Cover::create($data);

    session()->flash('swal', [
        'icon' => 'success',
        'title' => 'Portada creada con éxito',
    ]);

    return redirect()->route('covers.index');
}


    /**
     * Display the specified resource.
     */
    public function show(Cover $cover)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cover $cover)
    {
        //
        return view('admin.covers.edit', compact('cover'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, Cover $cover)
{
    $data = $request->validate([
        'image' => 'nullable|image|max:1024',
        'title' => 'required|string|max:255',
        'start_at' => 'required|date',
        'end_at' => 'nullable|date|after_or_equal:start_at',
        'is_active' => 'required|boolean',
    ]);

    if ($request->hasFile('image')) {
        // Eliminar imagen anterior
        Storage::delete($cover->image_path);
        // Subir nueva
        $data['image_path'] = Storage::put('covers', $data['image']);
    }

    $cover->update($data);

    session()->flash('swal', [
        'icon' => 'success',
        'title' => 'Portada actualizada con éxito',
    ]);

    return redirect()->route('covers.index');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cover $cover)
    {
        //
    }
}
