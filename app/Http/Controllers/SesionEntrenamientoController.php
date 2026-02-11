<?php

namespace App\Http\Controllers;

use App\Models\SesionEntrenamiento;
use Illuminate\Http\Request;

class SesionEntrenamientoController extends Controller
{
    /**
     * API: devolver sesiones en JSON
     */
    public function index()
    {
        $sesiones = SesionEntrenamiento::all();
        return response()->json($sesiones);
    }

    /**
     * Vista HTML que mostrará las sesiones
     */
    public function mostrarSesiones()
    {
        return view('menu.sesionEntrenamiento');
    }

    public function bloquesDeSesion($id)
{
    $sesion = SesionEntrenamiento::with('bloques')->find($id);

    if (!$sesion) {
        return response()->json(['error' => 'Sesión no encontrada'], 404);
    }

    return response()->json($sesion);
    }

public function sesionesConBloques()
{
    $sesiones = SesionEntrenamiento::whereHas('bloques')
        ->with('bloques')
        ->get();

    return response()->json($sesiones);
}




    public function create() {}
    public function store(Request $request) {}
    public function show(string $id) {}
    public function edit(string $id) {}
    public function update(Request $request, string $id) {}
    public function destroy(string $id) {}
}

