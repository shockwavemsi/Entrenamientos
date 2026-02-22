<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Crear Sesión</title>
    <link rel="stylesheet" href="{{ asset('css/formularios/crearSesion.css') }}">
</head>

<body>

    <h1>Crear nueva sesión</h1>

    <form action="{{ route('sesion.store') }}" method="POST">
        @csrf

        <label>Plan asociado:</label>
        <select name="id_plan" required>
            @foreach($planes as $plan)
                <option value="{{ $plan->id }}">{{ $plan->nombre }}</option>
            @endforeach
        </select>

        <label>Nombre:</label>
        <input type="text" name="nombre" required>

        <label>Fecha:</label>
        <input type="date" name="fecha" required>

        <label>Descripción:</label>
        <input type="text" name="descripcion" required>

        <label>Completada:</label>
        <select name="completada">
            <option value="0">No</option>
            <option value="1">Sí</option>
        </select>

        <button type="submit">Crear sesión</button>
        <a href="/sesion">Ir a Sesiones →</a>
    </form>
    <a href="/bienvenida">← Volver al menú</a>

</body>

</html>