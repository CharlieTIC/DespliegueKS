<?php

namespace App\Http\Controllers;


use App\Models\Cover;
use Illuminate\Http\Request;
use App\Models\Producto;

class WelcomeController extends Controller
{
    public function index() {

        $covers = Cover::where('is_active', true)
        ->whereDate('start_at', '<=', now())
        ->get();

        $ultimosProductos = Producto::orderBy('id', 'desc')->take(12)->get();

        
        return view('welcome', compact('covers', 'ultimosProductos'));
    }
}
