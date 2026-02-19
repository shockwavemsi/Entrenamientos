<?php

namespace App\Http\Controllers;

use App\Models\BloqueEntrenamiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BloqueEntrenamientoController extends Controller
{
    /**
     * API: devuelve TODOS los bloques
     */
    public function index()
    {
        return response()->json(BloqueEntrenamiento::all());
    }

    /**
     * Vista HTML que mostrará los bloques
     */
    public function mostrarBloques()
    {
        $bloques = BloqueEntrenamiento::all();
        return view('menu.bloqueEntrenamiento', compact('bloques'));
    }

    /**
     * API: devuelve SOLO los bloques que usa el ciclista autenticado
     */
   public function bloquesDelCiclista()
{
    $userId = auth()->id();

    $bloques = BloqueEntrenamiento::select(
            'bloque_entrenamiento.*',
            'sesion_bloque.orden',
            'sesion_bloque.repeticiones',
            'sesion_bloque.id_sesion_entrenamiento'
        )
        ->join('sesion_bloque', 'sesion_bloque.id_bloque_entrenamiento', '=', 'bloque_entrenamiento.id')
        ->join('sesion_entrenamientos', 'sesion_entrenamientos.id', '=', 'sesion_bloque.id_sesion_entrenamiento')
        ->join('plan_entrenamiento', 'plan_entrenamiento.id', '=', 'sesion_entrenamientos.id_plan')
        ->where('plan_entrenamiento.id_ciclista', $userId)   // ⭐ FILTRO POR USUARIO
        ->orderBy('sesion_bloque.orden')
        ->get();

    return response()->json($bloques);
}

    /**
     * API: elimina un bloque por ID
     */
    public function destroy($id)
    {
        $bloque = BloqueEntrenamiento::find($id);

        if (!$bloque) {
            return response()->json(['error' => 'Bloque no encontrado'], 404);
        }

        $bloque->delete();

        return response()->json(['mensaje' => 'Bloque eliminado correctamente']);
    }


     /**
     * Muestra el formulario para crear un nuevo bloque
     */
    public function create()
    {
        return view('form.crearBloqueEntrenamiento');
    }

    /**
     * Guarda un nuevo bloque en la base de datos
     */
    public function store(Request $request)
    {
        // Validaciones
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'tipo' => 'required|string',
            'duracion_estimada' => 'required|date_format:H:i:s',
            'potencia_pct_min' => 'required|numeric|min:0|max:100',
            'potencia_pct_max' => 'required|numeric|min:0|max:100',
            'pulso_reserva_pct' => 'required|numeric|min:0|max:100',
            'comentario' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Crear el bloque
        BloqueEntrenamiento::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'tipo' => $request->tipo,
            'duracion_estimada' => $request->duracion_estimada,
            'potencia_pct_min' => $request->potencia_pct_min,
            'potencia_pct_max' => $request->potencia_pct_max,
            'pulso_reserva_pct' => $request->pulso_reserva_pct,
            'comentario' => $request->comentario
        ]);

        return redirect()->route('bloques.crear')
            ->with('success', 'Bloque creado correctamente');
    }

    public function crearRapido(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'tipo' => 'required|string',
        'duracion_estimada' => 'required|date_format:H:i:s',
        'potencia_pct_min' => 'required|numeric|min:0|max:100',
        'potencia_pct_max' => 'required|numeric|min:0|max:100',
        'pulso_reserva_pct' => 'required|numeric|min:0|max:100',
        'comentario' => 'nullable|string'
    ]);

    $bloque = BloqueEntrenamiento::create([
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
        'tipo' => $request->tipo,
        'duracion_estimada' => $request->duracion_estimada,
        'potencia_pct_min' => $request->potencia_pct_min,
        'potencia_pct_max' => $request->potencia_pct_max,
        'pulso_reserva_pct' => $request->pulso_reserva_pct,
        'comentario' => $request->comentario
    ]);

    return response()->json([
        'id' => $bloque->id,
        'nombre' => $bloque->nombre,
        'tipo' => $bloque->tipo,
        'mensaje' => 'Bloque creado correctamente'
    ]);
}

}

