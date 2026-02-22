<?php

namespace App\Http\Controllers;

use App\Models\SesionEntrenamiento;
use App\Models\PlanEntrenamiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesionEntrenamientoController extends Controller
{
    /**
     * API: devolver sesiones en JSON
     */
    public function index(Request $request)
    {
        $idCiclista = Auth::id();

        // Leer offset y limit de la URL
        $offset = $request->query('offset', 0);
        $limit = $request->query('limit', 2);

        // Obtener los planes del ciclista
        $planes = PlanEntrenamiento::where('id_ciclista', $idCiclista)->pluck('id');

        // Obtener sesiones paginadas
        $sesiones = SesionEntrenamiento::whereIn('id_plan', $planes)
            ->orderBy('fecha', 'desc')
            ->offset($offset)
            ->limit($limit)
            ->get();

        return response()->json($sesiones);
    }

    public function destroySesionEntrenamiento($id)
    {
        $sesion = SesionEntrenamiento::findOrFail($id);
        $sesion->delete();

        return response()->json(['message' => 'Sesión eliminada correctamente']);
    }


    /**
     * Vista HTML que mostrará las sesiones
     */
    public function mostrarSesiones()
    {
        return view('menu.sesionEntrenamiento');
    }

    public function create()
    {
        // Obtener los planes del ciclista logueado
        $planes = PlanEntrenamiento::where('id_ciclista', Auth::id())->get();

        return view('menu.sesionCrear', compact('planes')); //['planes' => $planes]
    }

    /**
     * Guardar sesión
     */
    public function store(Request $request)
    {
        SesionEntrenamiento::create([
            'id_ciclista' => Auth::id(),
            'id_plan' => $request->id_plan,   // ← IMPORTANTE
            'nombre' => $request->nombre,
            'fecha' => $request->fecha,
            'descripcion' => $request->descripcion,
            'completada' => $request->completada
        ]);
        return redirect('/bienvenida'); // o /bienvenida
    }

    public function show(string $id)
    {
    }
    public function edit(string $id)
    {
    }
    public function update(Request $request, string $id)
    {
    }
}