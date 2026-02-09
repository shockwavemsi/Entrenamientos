<?php

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CiclistaController;

Route::get('login', [CiclistaController::class, 'showLoginForm'])->name('login');
Route::post('login', [CiclistaController::class, 'login']);
Route::post('logout', [CiclistaController::class, 'logout'])->name('logout');

// Dashboard (protegido)
Route::get('/bienvenida', [CiclistaController::class, 'showBienvenida']) -> name('bienvenida');
Route::get('/ciclista', [CiclistaController::class, 'linkCiclista'])->middleware('auth');

Route::get('register', [CiclistaController::class, 'registerForm'])->name('register');

// Procesar registro
Route::post('register', [CiclistaController::class, 'register']);