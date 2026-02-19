<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CiclistaController;
use App\Http\Controllers\BloqueEntrenamientoController;
use App\Http\Controllers\SesionEntrenamientoController;
use App\Http\Controllers\PlanEntrenamientoController;
use App\Http\Controllers\SesionBloqueController;

/*
|--------------------------------------------------------------------------
| PÁGINA PRINCIPAL
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    $visited = DB::select('SELECT * FROM places WHERE visited = ?', [1]);
    $togo    = DB::select('SELECT * FROM places WHERE visited = ?', [0]);

    return view('travel_list', [
        'visited' => $visited,
        'togo'    => $togo
    ]);
});

/*
|--------------------------------------------------------------------------
| AUTENTICACIÓN
|--------------------------------------------------------------------------
*/
Route::get('login', [CiclistaController::class, 'showLoginForm'])->name('login');
Route::post('login', [CiclistaController::class, 'login']);
Route::post('logout', [CiclistaController::class, 'logout'])->name('logout');

Route::get('register', [CiclistaController::class, 'registerForm'])->name('register');
Route::post('register', [CiclistaController::class, 'register']);

Route::get('/bienvenida', [CiclistaController::class, 'showBienvenida'])
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| BLOQUES DE ENTRENAMIENTO
|--------------------------------------------------------------------------
*/
// API
Route::get('/api/bloques', [BloqueEntrenamientoController::class, 'index']);

// Vistas
Route::get('/bloques', [BloqueEntrenamientoController::class, 'mostrarBloques'])
    ->middleware('auth');

Route::get('/bloques/crear', [BloqueEntrenamientoController::class, 'create'])
    ->name('bloques.crear')
    ->middleware('auth');

Route::post('/bloques', [BloqueEntrenamientoController::class, 'store'])
    ->name('bloques.store')
    ->middleware('auth');

Route::delete('/bloque/{id}/eliminar', [BloqueEntrenamientoController::class, 'destroy'])
    ->name('bloque.eliminar')
    ->middleware('auth');
Route::post('/api/bloques/crear-rapido', [BloqueEntrenamientoController::class, 'crearRapido'])
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| SESIONES DE ENTRENAMIENTO (SÓLO LO QUE USAS)
|--------------------------------------------------------------------------
*/
// API
Route::get('/api/sesiones', [SesionEntrenamientoController::class, 'index']);

// Vista
Route::get('/sesion', [SesionEntrenamientoController::class, 'mostrarSesiones'])
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| PLANES DE ENTRENAMIENTO
|--------------------------------------------------------------------------
*/
// API
Route::get('/api/planes', [PlanEntrenamientoController::class, 'index']);

// Vista
Route::get('/plan', [PlanEntrenamientoController::class, 'mostrarPlanes'])
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| RELACIONES SESIÓN ↔ BLOQUE
|--------------------------------------------------------------------------
*/
// Vistas
Route::get('/sesionbloque', [SesionBloqueController::class, 'mostrarSesionBloque'])
    ->middleware('auth');

// Vistas
Route::get('/sesionbloque/crear', [SesionBloqueController::class, 'crearSesionConBloques'])
    ->name('relaciones.crear')  // ← AÑADE ESTO
    ->middleware('auth');

// 🔥 NUEVA: Guardar relación
Route::post('/sesion-bloque/crear', [SesionBloqueController::class, 'store'])
    ->name('relaciones.store')  // ← ESTE ES EL NOMBRE QUE BUSCAS
    ->middleware('auth');

// API para obtener sesiones con bloques
Route::get('/api/sesiones-con-bloques', [SesionBloqueController::class, 'sesionesConBloques'])
    ->middleware('auth');

// Borrar la relación de sesion con bloques
Route::delete('/sesion-bloque/{id}', [SesionBloqueController::class, 'destroy'])
    ->name('relaciones.destroy')
    ->middleware('auth');