<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login Ciclistas</title>
</head>


<body>
<h1>Bloque entrenamiento</h1>
    <script>
    fetch('/api/bloques')
        .then(response => response.json())
        .then(data => {
            console.log("Bloques:", data);
            // Aquí ya puedes pintar los datos en la página
        })
        .catch(error => console.error("Error:", error));
</script>


</body>

</html>