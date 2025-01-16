<?php

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="index.css">
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">
    <title>David Escalona García - UNO</title>

    <style>
        h1, h5, label{
            font-family: Bungee Spice;
        }
    </style>

</head>
<body>
    
    <header>

    <h1 class="d-flex justify-content-center mt-5">Proyecto 2 - UNO</h1>

    </header>

    <main>

    <div class="container card mt-5 formu">
    <h5 class="card-title text-center mt-3">Juega al UNO</h5>
    <form id="formulario" method="POST" action="partida.class.php">
        <div class="mb-3">
            <label for="Jugadores" class="form-label">Número de Jugadores:</label>
            <input type="number" class="form-control" id="Jugadores" name="jugadores" required min="1" max="5">
        </div>
        <div class="mb-3">
            <label for="Cartas" class="form-label">Número de Cartas:</label>
            <input type="number" class="form-control" id="Cartas" name="cartas" required min="7">
        </div>
        <button type="button" onclick="formularioMinimoMaximo()" class="btn btn-primary border border-dark mb-5 w-100 shadow fs-5">Comenzar Juego</button>
    </form>
</div>

<script>
function formularioMinimoMaximo() {
    // Obtener los valores de los campos
    let jugadores = document.querySelector('#Jugadores').value;
    let cartas = document.querySelector('#Cartas').value;

    // Validación para el número de jugadores
    if (jugadores < 1 || jugadores > 5) {
        alert('El número de jugadores debe ser entre 1 y 5.');
        return; // Detener el envío si no es válido
    }

    // Validación para el número de cartas
    if (cartas < 1 || cartas > 7) {
        alert('El número de cartas debe ser entre 1 y 7.');
        return; // Detener el envío si no es válido
    }

    // Si todo es correcto, enviar el formulario
    // Esto es lo que hace que el formulario se envíe
    document.getElementById('formulario').submit();
}
</script>


</body>
</html>