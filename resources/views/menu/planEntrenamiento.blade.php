<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Planes de Entrenamiento</title>
</head>
<body>

<h1>Planes de Entrenamiento</h1>

<div id="planes"></div>

<script>
fetch('/api/planes')
    .then(response => response.json())
    .then(data => {
        const contenedor = document.getElementById('planes');

        data.forEach(plan => {
            const card = document.createElement('div');
            card.classList.add('plan-card');

            const titulo = document.createElement('h2');
            titulo.textContent = plan.nombre;
            card.appendChild(titulo);

            const descripcion = document.createElement('p');
            descripcion.textContent = "Descripción: " + plan.descripcion;
            card.appendChild(descripcion);

            const fechaInicio = document.createElement('p');
            fechaInicio.textContent = "Fecha inicio: " + plan.fecha_inicio;
            card.appendChild(fechaInicio);

            const fechaFin = document.createElement('p');
            fechaFin.textContent = "Fecha fin: " + plan.fecha_fin;
            card.appendChild(fechaFin);

            const objetivo = document.createElement('p');
            objetivo.textContent = "Objetivo: " + plan.objetivo;
            card.appendChild(objetivo);

            const activo = document.createElement('p');
            activo.textContent = "Activo: " + (plan.activo ? "Sí" : "No");
            card.appendChild(activo);

            const hr = document.createElement('hr');
            card.appendChild(hr);

            contenedor.appendChild(card);
        });
    })
    .catch(error => console.error("Error:", error));
</script>

</body>
</html>
