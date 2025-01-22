<?php
    include 'baraja.class.php';

    // Obtener datos enviados desde el formulario
    $jugadores = isset($_POST['jugadores']) ? (int)$_POST['jugadores'] : 1;
    $cartasPorJugador = isset($_POST['cartas']) ? (int)$_POST['cartas'] : 1;

    // Crear una instancia de la clase Baraja
    $baraja = new Baraja();
    
    // Función para repartir las cartas a los jugadores
    function repartirCartas($baraja, $jugadores, $cartasPorJugador) {
        $manos = [];
        for ($i = 0; $i < $jugadores; $i++) {
            $mano = [];
            for ($j = 0; $j < $cartasPorJugador; $j++) {
                $mano[] = $baraja->obtenerCartaAleatoria();
            }
            $manos[] = $mano;
        }
        return $manos;
    }

    // Obtener las manos de los jugadores
    $manos = repartirCartas($baraja, $jugadores, $cartasPorJugador);
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
    <title>Partida - UNO</title>

    <style>
        h1, h5, label {
            font-family: Bungee Spice;
        }

        .carta {
            width: 150px;
            height: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px;
            background-size: cover;
            background-position: center;
            border: 2px solid black;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .container {
            margin-top: 40px;
        }

        footer {
            margin-top: 50px;
            text-align: center;
        }

        footer a {
            font-size: 18px;
            font-family: 'Bungee Spice', cursive;
            text-decoration: none;
            color: #000;
        }

        footer a:hover {
            color: #ff5733;
        }

        .mano {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    
    <header>
        <h1 class="d-flex justify-content-center mt-5">Partida</h1>
    </header>

    <div class="text-center d-flex justify-content-center">
        <main class="d-flex justify-content-center container card mb-4 flex-row flex-wrap">
            <?php foreach ($manos as $index => $mano): ?>
                <div class="col-12 mano">
                    <h5 class="ms-4 text-start">Jugador <?php echo $index + 1; ?></h5>
                    <div class="d-flex justify-content-start flex-nowrap overflow-auto">
                        <?php foreach ($mano as $cartaIndex => $carta): ?>
                            <div class="carta shadow mb-2">
                                <?php if ($cartaIndex === 0): ?>
                                    <!-- La primera carta se muestra normalmente -->
                                    <img src="img/<?php echo $carta; ?>" alt="Carta" class="img-fluid" style="max-width: 100px; max-height: 150px; object-fit: contain;">
                                <?php else: ?>
                                    <!-- Las demás cartas estarán giradas -->
                                    <img src="img/<?php echo $carta; ?>" alt="Carta Girada" class="img-fluid" style="max-width: 100px; max-height: 150px; object-fit: contain;">
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </main>
    </div>

    <footer>
        <div class="container card color p-2 mb-5">
            <a href="index.php" class="d-flex justify-content-center text-decoration-none fs-5 w-100">Volver al inicio</a>   
        </div>
    </footer>

</body>
</html>
