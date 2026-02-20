<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* ======== ESTILOS GENERALES ======== */
        body {
            font-family: "Poppins", Arial, sans-serif;
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background: #f4f6f9;
            color: #333;
        }

        /* ======== CONTENEDOR PRINCIPAL ======== */
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        /* ======== TÍTULO ======== */
        h1 {
            text-align: center;
            color: #1a73e8;
            margin-bottom: 25px;
            font-size: 1.6rem;
        }

        /* ======== FORMULARIO ======== */
        form {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        label {
            font-weight: 600;
            margin-bottom: 5px;
            color: #444;
        }

        input,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #d0d7e2;
            border-radius: 8px;
            font-size: 1rem;
            background: #fafbfc;
            transition: border 0.2s ease, box-shadow 0.2s ease;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #1a73e8;
            box-shadow: 0 0 6px rgba(26, 115, 232, 0.3);
        }

        /* ======== BOTÓN ======== */
        button {
            background: #1a73e8;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-size: 1.1rem;
            cursor: pointer;
            font-weight: 600;
            transition: background 0.2s ease, transform 0.1s ease;
        }

        button:hover {
            background: #155fc4;
            transform: scale(1.02);
        }

        /* ======== ENLACE VOLVER ======== */
        a {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #1a73e8;
            font-weight: 600;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Crear Nuevo Plan</h1>

        <form action="{{ route('plan.store') }}" method="POST">
            @csrf

            <label>Nombre:</label>
            <input type="text" name="nombre" required>

            <label>Descripción:</label>
            <input type="text" name="descripcion" required>

            <label>Fecha inicio:</label>
            <input type="date" name="fecha_inicio" required>

            <label>Fecha fin:</label>
            <input type="date" name="fecha_fin" required>

            <label>Objetivo:</label>
            <input type="text" name="objetivo" required>

            <label>Activo:</label>
            <select name="activo">
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>

            <button type="submit">Crear plan</button>
        </form>

        <a href="/plan">← Ir a Planes</a>
    </div>
</body>
<a href="/bienvenida">Volver al menu</a>
</body>

</html>