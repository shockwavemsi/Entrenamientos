<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sesiones y Bloques</title>
</head>
<body>

<h1>Sesiones de Entrenamiento</h1>

<div id="sesiones"></div>

<script>
fetch('/sesion-bloques')
    .then(response => response.json())
    .then(data => {
        const contenedor = document.getElementById('sesiones');

        data.forEach(sesion => {
            // Tarjeta de la sesión
            const cardSesion = document.createElement('div');
            cardSesion.style.border = "1px solid #ccc";
            cardSesion.style.padding = "10px";
            cardSesion.style.margin = "15px 0";

            const tituloSesion = document.createElement('h2');
            tituloSesion.textContent = sesion.nombre;
            cardSesion.appendChild(tituloSesion);

            const descripcion = document.createElement('p');
            descripcion.textContent = "Descripción: " + sesion.descripcion;
            cardSesion.appendChild(descripcion);

            const fecha = document.createElement('p');
            fecha.textContent = "Fecha: " + sesion.fecha;
            cardSesion.appendChild(fecha);

            const hr = document.createElement('hr');
            cardSesion.appendChild(hr);

            // Lista de bloques
            sesion.bloques
                .sort((a, b) => a.pivot.orden - b.pivot.orden)
                .forEach(bloque => {

                const bloqueItem = document.createElement('p');
                bloqueItem.innerHTML = `
                    <strong>${bloque.pivot.orden}.</strong> 
                    ${bloque.nombre} 
                    (${bloque.pivot.repeticiones} repeticiones)
                `;
                cardSesion.appendChild(bloqueItem);
            });

            contenedor.appendChild(cardSesion);
        });
    })
    .catch(error => console.error("Error:", error));
</script>

</body>
</html>
