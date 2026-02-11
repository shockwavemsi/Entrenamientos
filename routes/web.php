<?php

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CiclistaController;
use App\Http\Controllers\BloqueEntrenamientoController;
use App\Http\Controllers\SesionEntrenamientoController;
use App\Http\Controllers\PlanEntrenamientoController;


Route::get('/', function () {
  $visited = DB::select('select * from places where visited = ?', [1]); 
  $togo = DB::select('select * from places where visited = ?', [0]);

  return view('travel_list', ['visited' => $visited, 'togo' => $togo ] );
  
});
Route::get('login', [CiclistaController::class, 'showLoginForm'])->name('login');
Route::post('login', [CiclistaController::class, 'login']);
Route::post('logout', [CiclistaController::class, 'logout'])->name('logout');

// Dashboard (protegido)
Route::get('/bienvenida', [CiclistaController::class, 'showBienvenida'])->middleware('auth');

Route::get('register', [CiclistaController::class, 'registerForm'])->name('register');

// Procesar registro
Route::post('register', [CiclistaController::class, 'register']);

Route::get('/api/bloques', [BloqueEntrenamientoController::class, 'index']);
Route::get('/bloques', [BloqueEntrenamientoController::class, 'mostrarBloques'])->middleware('auth');

// Procesar Sesiones Entrenamientos
Route::get('/api/sesiones', [SesionEntrenamientoController::class, 'index']);
Route::get('/sesion', [SesionEntrenamientoController::class, 'mostrarSesiones'])->middleware('auth');

// Procesar Plan Entrenamientos
Route::get('/api/planes', [PlanEntrenamientoController::class, 'index']); Route::get('/plan', [PlanEntrenamientoController::class, 'mostrarPlanes'])->middleware('auth');

// Procesa Sesion Bloque
use App\Http\Controllers\SesionBloqueController;

Route::get('/api/sesion-bloque', [SesionBloqueController::class, 'index']);
Route::get('/sesionbloque', [SesionBloqueController::class, 'mostrarSesionBloque'])->middleware('auth');
Route::get('/sesiones/{id}/bloques', [SesionEntrenamientoController::class, 'bloquesDeSesion']);


Route::get('/sesion-bloques', [SesionEntrenamientoController::class, 'sesionesConBloques']);



