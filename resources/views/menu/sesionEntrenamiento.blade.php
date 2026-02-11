<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sesiones de Entrenamiento</title>
</head>
<body>

<h1>Sesiones de Entrenamiento</h1>

<div id="sesiones"></div>

<script>
fetch('/api/sesiones')
    .then(response => response.json())
    .then(data => {
        const contenedor = document.getElementById('sesiones');

        data.forEach(sesion => {
            const card = document.createElement('div');
            card.classList.add('sesion-card');

            const titulo = document.createElement('h2');
            titulo.textContent = sesion.nombre;
            card.appendChild(titulo);

            const fecha = document.createElement('p');
            fecha.textContent = "Fecha: " + sesion.fecha;
            card.appendChild(fecha);

            const descripcion = document.createElement('p');
            descripcion.textContent = "Descripción: " + sesion.descripcion;
            card.appendChild(descripcion);

            const completada = document.createElement('p');
            completada.textContent = "Completada: " + (sesion.completada ? "Sí" : "No");
            card.appendChild(completada);

            const hr = document.createElement('hr');
            card.appendChild(hr);

            contenedor.appendChild(card);
        });
    })
    .catch(error => console.error("Error:", error));
</script>

</body>
</html>
