<?php

namespace App\Http\Controllers;

use App\Models\SesionEntrenamiento;
use App\Models\BloqueEntrenamiento;
use App\Models\SesionBloque;
use Illuminate\Http\Request;

class SesionEntrenamientoController extends Controller
{
    /**
 * API: devuelve SOLO las sesiones del ciclista autenticado
 */
public function index()
{
    $userId = auth()->id();

    $sesiones = SesionEntrenamiento::whereHas('plan', function ($q) use ($userId) {
        $q->where('id_ciclista', $userId);
    })->get();

    return response()->json($sesiones);
}
    /**
     * Vista: Lista de relaciones sesión-bloque
     */
    public function mostrarSesiones()
    {
        return view('menu.sesionEntrenamiento');
    }

}
