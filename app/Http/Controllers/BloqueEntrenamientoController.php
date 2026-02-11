<?php

namespace App\Http\Controllers;

use App\Models\BloqueEntrenamiento;
use Illuminate\Http\Request;

class BloqueEntrenamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los bloques
        $bloques = BloqueEntrenamiento::all();

        // Devolver JSON
        return response()->json($bloques);
    }

    /**
     * Mostrar bloques en vista HTML
     */
    public function mostrarBloques()
    {
        $bloques = BloqueEntrenamiento::all();
        return view('menu.bloqueEntrenamiento', compact('bloques'));
    }


    public function create() {}
    public function store(Request $request) {}
    public function show(string $id) {}
    public function edit(string $id) {}
    public function update(Request $request, string $id) {}
    public function destroy(string $id) {}
}