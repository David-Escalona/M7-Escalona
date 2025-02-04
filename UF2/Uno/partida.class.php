<?php

require_once('baraja.class.php');
require_once('jugador.class.php');
require_once('carta.class.php');

// Recuperar los datos enviados desde el formulario
$jugadores = isset($_POST['jugadores']) ? (int)$_POST['jugadores'] : 1;
$cartas = isset($_POST['cartas']) ? (int)$_POST['cartas'] : 1;

// Crear la baraja
$baraja = new Baraja();
$baraja->barajar();

// Crear los jugadores
$jugadores_obj = [];
for ($i = 1; $i <= $jugadores; $i++) {
    $jugadores_obj[$i] = new Jugador($i);
    // Distribuir las cartas a cada jugador
    for ($j = 0; $j < $cartas; $j++) {
        $jugadores_obj[$i]->añadir_carta($baraja->robar_carta());
    }
}

// Robar una carta para la mesa
$carta_mesa = $baraja->robar_carta();

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
        h1, h5 {
            font-family: Bungee Spice;
        }
        .card {
            margin-top: 20px;
        }
        .carta {
            display: inline-block;
            margin: 5px;
            cursor: pointer;
        }
        .mesa-carta {
            margin: 10px;
        }
    </style>
</head>
<body>

    <header>
        <h1 class="text-center mt-5">Partida de UNO</h1>
    </header>

    <main class="container card p-4">
        <h5 class="text-center">Información de la Partida</h5>
        
        <div class="mt-4">
            <?php
            foreach ($jugadores_obj as $jugador) {
                echo "<h6>Jugador {$jugador->id} - Cartas: </h6>";
                foreach ($jugador->mano as $index => $carta) {
                    // Mostrar carta con un ID único para cada carta
                    echo "<div class='carta' id='carta-{$jugador->id}-{$index}' onclick='moverCarta({$jugador->id}, {$index})'>";
                    echo $carta->pinta_carta();
                    echo "</div>";
                }
            }
            ?>
        </div>

        <div class="text-center mt-5">
            <p><strong>Carta sobre la mesa:</strong></p>
            <div id="mesa" class="mesa-carta">
                <!-- La carta sobre la mesa se mostrará aquí -->
            </div>
        </div>

        <div class="d-flex justify-content-center mt-5 btn-group">
            <!-- Botón para iniciar la partida -->
            <form method="POST" action="index.php">
                <button type="submit" class="btn btn-primary">Volver al inicio</button>
            </form>
        </div>
    </main>

    <script>
        let cartaEnMesa = null; // Variable para almacenar la carta que está sobre la mesa

        function moverCarta(jugadorId, cartaIndex) {
            const cartaElemento = document.getElementById(`carta-${jugadorId}-${cartaIndex}`);
            const mesaElemento = document.getElementById('mesa');
            
            // Si ya hay una carta en la mesa, eliminarla
            if (cartaEnMesa) {
                mesaElemento.removeChild(cartaEnMesa);
            }
            
            // Mover la carta a la mesa
            mesaElemento.appendChild(cartaElemento);
            
            // Actualizar la carta que está sobre la mesa
            cartaEnMesa = cartaElemento;
        }
    </script>

</body>
</html>