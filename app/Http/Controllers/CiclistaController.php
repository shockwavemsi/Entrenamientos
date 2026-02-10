<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Ciclista;

class CiclistaController extends Controller
{
    // Mostrar formulario de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Procesar login
    public function login(Request $request)
    {
        // Buscar ciclista por email
        $ciclista = Ciclista::where('email', $request->email)->first();

        // Verificar contraseña
        if ($ciclista && Hash::check($request->password, $ciclista->password)) {
            Auth::login($ciclista);

            // IMPORTANTE: redirigir, NO return view()
            return redirect('/bienvenida');
        }

        return back()->with('error', 'Correo o contraseña incorrectos');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    // Vista protegida del dashboard
    public function showBienvenida()
    {
        return view('bienvenida');
    }

    // Mostrar formulario de registro
    public function registerForm()
    {
        return view('auth.register');
    }

    // Procesar registro
    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:80',
            'apellidos' => 'required|string|max:80',
            'email' => 'required|email|unique:ciclista,email',
            'password' => 'required|string|min:4|confirmed',
            'fecha_nacimiento' => 'required|date',
            'peso_base' => 'required|numeric',
            'altura_base' => 'required|integer',
        ]);

        // Crear ciclista con contraseña encriptada
        Ciclista::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'peso_base' => $request->peso_base,
            'altura_base' => $request->altura_base,
        ]);

        return redirect('/login')->with('success', 'Cuenta creada correctamente. ¡Puedes iniciar sesión!');
    }
}