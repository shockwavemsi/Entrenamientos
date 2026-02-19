<?php

namespace App\Http\Controllers;

use App\Models\PlanEntrenamiento;
use Illuminate\Http\Request;

class PlanEntrenamientoController extends Controller
{
    /**
     * API: devolver planes en JSON
     */
    public function index()
{
    $userId = auth()->id(); // ID del ciclista autenticado

    $planes = PlanEntrenamiento::where('id_ciclista', $userId)->get();

    return response()->json($planes);
}

    /**
     * Vista HTML que mostrará los planes
     */
    public function mostrarPlanes()
    {
        return view('menu.planEntrenamiento');
    }

    public function create() {}
    public function store(Request $request) {}
    public function show(string $id) {}
    public function edit(string $id) {}
    public function update(Request $request, string $id) {}
    public function destroy(string $id) {}
}

