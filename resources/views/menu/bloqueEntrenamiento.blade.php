<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login Ciclistas</title>
</head>
<body>
<h1>Bloque entrenamiento</h1>
<div id="bloques"></div>

<script>
fetch('/api/bloques')
    .then(response => response.json())
    .then(data => {
        const contenedor = document.getElementById('bloques');

        data.forEach(bloque => {
            // Crear tarjeta contenedora
            const card = document.createElement('div');
            card.classList.add('bloque-card');

            // Título
            const titulo = document.createElement('h2');
            titulo.textContent = bloque.nombre;
            card.appendChild(titulo);

            // Descripción
            const descripcion = document.createElement('p');
            descripcion.textContent = "Descripción: " + bloque.descripcion;
            card.appendChild(descripcion);

            // Tipo
            const tipo = document.createElement('p');
            tipo.textContent = "Tipo: " + bloque.tipo;
            card.appendChild(tipo);

            // Duración
            const duracion = document.createElement('p');
            duracion.textContent = "Duración: " + bloque.duracion_estimada;
            card.appendChild(duracion);

            // Potencia
            const potencia = document.createElement('p');
            potencia.textContent = `Potencia: ${bloque.potencia_pct_min}% - ${bloque.potencia_pct_max}%`;
            card.appendChild(potencia);

            // Pulso
            const pulso = document.createElement('p');
            pulso.textContent = `Pulso máximo: ${bloque.pulso_pct_max}%`;
            card.appendChild(pulso);

            // Comentario
            const comentario = document.createElement('p');
            comentario.textContent = "Comentario: " + bloque.comentario;
            card.appendChild(comentario);

            // Separador
            const hr = document.createElement('hr');
            card.appendChild(hr);

            // Añadir la tarjeta al contenedor
            contenedor.appendChild(card);
        });
    })
    .catch(error => console.error("Error:", error));
</script>




</body>
</html>