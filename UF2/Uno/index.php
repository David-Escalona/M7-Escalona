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
    <h5 class="d-flex justify-content-center mt-5">David Escalona García</h5>

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

    function formularioMinimoMaximo() { // Creo una funcion llamada formularioMinimoMaximo que me pondra un limite de cartas y jugadores 

        let jugadores = document.querySelector('#Jugadores').value; // Creo una varialbe let llamada jugadores y la enlace con el id Jugadores mostrando su valor
        let cartas = document.querySelector('#Cartas').value; // Creo una varialbe let llamada cartas y la enlace con el id Cartas mostrando su valor

        if (jugadores < 1 || jugadores > 5) { // Creo un bucle que si hay menos de 1 jugador y mas de 5 saldra una alerta
            alert('El número de jugadores debe ser entre 1 y 5.'); // No se puede jugar por que no se cumplen los requisitos
            return; // Volvemos a empezar
        }

        if (cartas < 1 || cartas > 7) { // Creo un bucle que si hay menos de 1 carta y mas de 7 saldra una alerta
            alert('El número de cartas debe ser entre 1 y 7.'); // No se puede jugar por que no se cumplen los requisitos
            return; // Volvemos a empezar
        }

        document.getElementById('formulario').submit(); // seleciono el elementoID de ID de formulario y lo enviamos 
    }
    </script>


</body>
</html>