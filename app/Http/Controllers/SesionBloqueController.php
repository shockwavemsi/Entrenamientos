<?php

namespace App\Http\Controllers;

use App\Models\SesionBloque;
use Illuminate\Http\Request;

class SesionBloqueController extends Controller
{
    /**
     * API: devolver todos los registros de sesion_bloque en JSON
     */
    public function index()
    {
        $pivot = SesionBloque::all();
        return response()->json($pivot);
    }

    /**
     * Vista HTML que mostrará los bloques de sesiones
     */
    public function mostrarSesionBloque()
    {
        return view('menu.sesionBloqueEntrenamiento');
    }

    /**
     * Mostrar un registro pivot concreto
     */
    public function show(string $id)
    {
        $pivot = SesionBloque::find($id);

        if (!$pivot) {
            return response()->json(['error' => 'No encontrado'], 404);
        }

        return response()->json($pivot);
    }

    public function create() {}
    public function store(Request $request) {}
    public function edit(string $id) {}
    public function update(Request $request, string $id) {}
    public function destroy(string $id) {}
}

