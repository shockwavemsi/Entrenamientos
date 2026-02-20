<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Bloques del Ciclista</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bloqueEntrenamiento.css') }}">
</head>

<body>
    <script src="{{ asset('js/menu.js') }}"></script>
    <div id="menu"></div>


    <h1>Bloques de entrenamiento</h1>  <!-- Cambié el título para que sea más preciso -->
    <script src="{{ asset('js/bloqueEntrenamiento.js') }}"></script>
    <div id="bloques"></div>

</body>

</html>